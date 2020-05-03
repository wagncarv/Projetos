<?php


namespace Source\Models;

use \Exception;
/**
 * A classe ResizeImage te permite redimensionar uma imagem
 *
 * Permite redimensionar para o tamanho exato
 * Largura máxima enquanto mantém a proporção
 * Altura máxima enquanto mantém a proporção
 * Automático enquanto mantém a proporção
 */
class ResizeImage
{
    private $ext;
    private $image;
    private $newImage;
    private $origWidth;
    private $origHeight;
    private $resizeWidth;
    private $resizeHeight;
    /**
     * O contrutor da classe requer o nome do arquivo
     *
     * @param string $filename - Nome do arquivo que você pretende redimensionar
     */
    public function __construct( $filename )
    {
        if(file_exists($filename))
        {
            $this->setImage( $filename );
        } else {
            throw new Exception('Imagem ' . $filename . ' não pôde ser encontrada, tente outra imagem.');
        }
    }
    /**
     * Inicia a variável image usando image create
     *
     * @param string $filename - O nome do arquivo da imagem
     */
    private function setImage( $filename )
    {
        $size = getimagesize($filename);
        $this->ext = $size['mime'];
        switch($this->ext)
        {
            // Image is a JPG
            case 'image/jpg':
            case 'image/jpeg':
                // cria uma extensão JPEG
                $this->image = imagecreatefromjpeg($filename);
                break;
            // Imagem GIF
            case 'image/gif':
                $this->image = @imagecreatefromgif($filename);
                break;
            // Imagem PNG
            case 'image/png':
                $this->image = @imagecreatefrompng($filename);
                break;
            // Mime type não encontrado
            default:
                throw new Exception("O arquivo não é uma imagem, use outro tipo de arquivo.", 1);
        }
        $this->origWidth = imagesx($this->image);
        $this->origHeight = imagesy($this->image);
    }
    /**
     * Grava a imagem como o tipo de imagem original.
     *
     * @param  String[type] $savePath     - O caminho para armazenar a nova imagem
     * @param  string $imageQuality 	  - O nível de qualidade da imagem a ser criada

     *
     * @return Grava a imagem
     */
    public function saveImage($savePath, $imageQuality="100", $download = false)
    {
        switch($this->ext)
        {
            case 'image/jpg':
            case 'image/jpeg':
                // Verifica se o PHP suporta este tipo de arquivo
                if (imagetypes() & IMG_JPG) {
                    imagejpeg($this->newImage, $savePath, $imageQuality);
                }
                break;
            case 'image/gif':
                // Verifica se o PHP suporta este tipo de arquivo
                if (imagetypes() & IMG_GIF) {
                    imagegif($this->newImage, $savePath);
                }
                break;
            case 'image/png':
                $invertScaleQuality = 9 - round(($imageQuality/100) * 9);
                // Verifica se o PHP suporta este tipo de arquivo
                if (imagetypes() & IMG_PNG) {
                    imagepng($this->newImage, $savePath, $invertScaleQuality);
                }
                break;
        }
        if($download)
        {
            header('Content-Description: File Transfer');
            header("Content-type: application/octet-stream");
            header("Content-disposition: attachment; filename= ".$savePath."");
            readfile($savePath);
        }
        imagedestroy($this->newImage);
    }
    /**
     * Redimensiona a imagem para essas dimensões definidas
     *
     * @param  int $width        	- Largura máxima da imagem
     * @param  int $height       	- Altura máxima da imagem
     * @param  string $resizeOption - Opção de escala para a imagem
     *
     * @return Grava nova imagem
     */
    public function resizeTo( $width, $height, $resizeOption = 'default' )
    {
        switch(strtolower($resizeOption))
        {
            case 'exact':
                $this->resizeWidth = $width;
                $this->resizeHeight = $height;
                break;
            case 'maxwidth':
                $this->resizeWidth  = $width;
                $this->resizeHeight = $this->resizeHeightByWidth($width);
                break;
            case 'maxheight':
                $this->resizeWidth  = $this->resizeWidthByHeight($height);
                $this->resizeHeight = $height;
                break;
            default:
                if($this->origWidth > $width || $this->origHeight > $height)
                {
                    if ( $this->origWidth > $this->origHeight ) {
                        $this->resizeHeight = $this->resizeHeightByWidth($width);
                        $this->resizeWidth  = $width;
                    } else if( $this->origWidth < $this->origHeight ) {
                        $this->resizeWidth  = $this->resizeWidthByHeight($height);
                        $this->resizeHeight = $height;
                    }
                } else {
                    $this->resizeWidth = $width;
                    $this->resizeHeight = $height;
                }
                break;
        }
        $this->newImage = imagecreatetruecolor($this->resizeWidth, $this->resizeHeight);
        imagecopyresampled($this->newImage, $this->image, 0, 0, 0, 0, $this->resizeWidth, $this->resizeHeight, $this->origWidth, $this->origHeight);
    }
    /**
     * Obtém a altura redimensionada da largura mantendo a proporção
     *
     * @param  int $width - largura máxima da imagem
     *
     * @return Height manter proporção
     */
    private function resizeHeightByWidth($width)
    {
        return floor(($this->origHeight/$this->origWidth)*$width);
    }
    /**
     * Obtém a largura redimensionada da altura mantida a proporção
     *
     * @param  int $height - Altura máxima da imagem
     *
     * @return Width manter proporção
     */
    private function resizeWidthByHeight($height)
    {
        return floor(($this->origWidth/$this->origHeight)*$height);
    }
}
