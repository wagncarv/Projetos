<?php

namespace Source\Models;

class Spritify
{
	//tipo de imagem para salvar como (para possíveis modificações futuras)
	private $image_type = "png";
	//array para conter imagens e informações de imagem
	private $images = array();
	//array de erros
	private $errors = array();
	
	//obter erros
	public function get_errors(){
		return $this->errors;
	}

    /**
     * @param $image_path 
     * @param string $id (opcional) ID do elemento para geração de código css
     */
	public function add_image($image_path, $id="elem"){
		if(file_exists($image_path))
		{
			$info = getimagesize($image_path);
			if(is_array($info))
			{
				$new = sizeof($this->images);
				$this->images[$new]["path"] = $image_path;
				$this->images[$new]["width"] = $info[0];
				$this->images[$new]["height"] = $info[1];
				$this->images[$new]["mime"] = $info["mime"];
				$type = explode("/", $info['mime']);
				$this->images[$new]["type"] = $type[1];
				$this->images[$new]["id"] = $id;
			}
			else
			{
				$this->errors[] = "Arquivo fornecido \"".$image_path."\" não está no formato correto da imagem";
			}
		}
		else
		{
			$this->errors[] = "Arquivo fornecido \"".$image_path."\" não existe";
		}
	}
	
	//calcula a largura e a altura necessárias para a imagem do sprite
	private function total_size(){
		$arr = array("width" => 0, "height" => 0);
		foreach($this->images as $image)
		{
			if($arr["width"] < $image["width"])
			{
				$arr["width"] = $image["width"];
			}
			$arr["height"] += $image["height"];
		}
		return $arr;
	}
	
	// cria imagem de sprite
	private function create_image(){
		$total = $this->total_size();
		$sprite = imagecreatetruecolor($total["width"], $total["height"]);
		imagesavealpha($sprite, true);
		$transparent = imagecolorallocatealpha($sprite, 0, 0, 0, 127);
		imagefill($sprite, 0, 0, $transparent);
		$top = 0;
		foreach($this->images as $image)
		{
			$func = "imagecreatefrom".$image['type'];
			$img = $func($image["path"]);
			imagecopy( $sprite, $img, ($total["width"] - $image["width"]), $top, 0, 0,  $image["width"], $image["height"]);
			$top += $image["height"];
		}
		return $sprite;
	}
	
	// gera a imagem no navegador (faz com que o arquivo php se comporte como a imagem)
	public function output_image(){
		$sprite = $this->create_image();
		header('Content-Type: image/'.$this->image_type);
		$func = "image".$this->image_type;
		$func($sprite); 
		ImageDestroy($sprite);
	}
	
	/*
	* gera código css usando o ID fornecido ao adicionar imagens ou o pseudo ID do "elem"
	* @param $path (opcional) - pega o caminho para o arquivo css_sprite já gerado ou usa o arquivo padrão para geração de pseudo-código
	 */
	public function generate_css($path = "storage/images/others/00a9.png"){
		$total = $this->total_size();
		$top = $total["height"];
		$css = "";
		foreach($this->images as $image)
		{
			if(strpos($image["id"],"#") === false)
			{
				$css .= "#".$image["id"]." { ";
			}
			else
			{
				$css .= $image["id"]." { ";
			}
			$css .= "background-image: url(".$path."); ";
			$css .= "background-position: ".($image["width"] - $total["width"])."px ".($top - $total["height"])."px; ";
			$css .= "width: ".$image['width']."px; ";
			$css .= "height: ".$image['height']."px; ";
			$css .= "}\n";
			$top -= $image["height"];
		}
		return $css;
	}
	
	/*
	 * se $path for fornecido, ele salva a imagem no caminho
	 * else força o download da imagem
	 */
	public function safe_image($path = ""){
		$sprite = $this->create_image();
		$func = "image".$this->image_type;
		if(trim($path) == "")
		{
			header('Content-Description: File Transfer');
			header('Content-Type: image/'.$this->image_type);
			header('Content-Disposition: attachment; filename=css_sprite.'.$this->image_type);
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($sprite));
			ob_clean();
			flush();
			$func($sprite); 
		}
		else
		{
			$func($sprite, $path); 
		}
		ImageDestroy($sprite);
	}
	
	//retorna imagem
	public function get_resource(){
		$sprite = $this->create_image();
		return $sprite;
	}
}
?>