<?php
/**
 * Cria estilo Css e sprite das imagens
 * 
 * @version 1.1
 */
 
 class SpriteGen {
 
	/**
     * @var string Origem da imagem
     */
    private $im;
	
	/**
     * @var int imagem W 
     */
	private $im_w = 0;
	
	/**
     * @var int imagem H
     */
	private $im_h = 0;
	
	/**
     * @var int imagem X
     */
	private $im_x = 0;
	
	/**
     * @var int imagem Y
     */
	private $im_y = 0;
	
	/**
     * @var string Origem da imagem tmp
     */
    private $temp;
	
	/**
     * @var int W tmp
     */
	private $temp_w = 0;
	
	/**
     * @var int H tmp
     */
	private $temp_h = 0;
	
	/**
     * @var int temp separação em px
     */
	private $temp_sep = 2;
	
	/**
     * @var string temp_css
     */
	private $temp_css = '';
	
	/**
     * @var string temp_css
     */
	private $temp_min_sep = "\n";

	/**
     * @var string temp_html
     */
	private $temp_html = '';
	
	/**
     * @var string version
     */
	private $version = '1.1';
	
	/**
     * @var array folders_config folder
     */
	private $folders_config = array(
								"origin" => array(
									"images" => "origin/images"
								),
								"destiny" => array(
									"styles" => "destiny/css/sprites.css",
									"sprites" => "destiny/sprites/sprites.png",
									"example" => "destiny/example/sprites.html",
									"ini_path" => "../../"
								)
							);
	/*
	* @var string define css padrão
	*/
	private $css_init = '';
	
	/**
     * @var array sprites
     */
	private $sprites = array();
	
	/*
	* Cria sprite das imagens
	* @return: string $imageResult caminho da imagem
	*/
	
	public function getSprite()
    {
    
		// Primeiro lê a pasta de origem e procura po imagens .png
		$arrImages = $this->readFolder($this->folders_config["origin"]["images"]);
		
		// Grava array de imagens
		$this->setSprite($arrImages);
		
		// Cria sprite
		$this->createSprite();

    }
	
	/*
	* Lê pasta procurando por imagens
	* @return: array $result 
	*/
	private function readFolder($dir='',$acceptedformats=array('png')) {
		$result = array(); 
		$cdir = scandir($dir); 
		// Lê dir de origem
		foreach ($cdir as $key => $value) 
		{ 
			// Exclui não arquivos
			if (!in_array($value,array(".",".."))) 
			{ 
				// Se houver sub pastas, repete a mesma função
				if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
				{ 
					$result[$value] = $this->readFolder($dir . DIRECTORY_SEPARATOR . $value); 
				} 
				else 
				{ 
					// Exclui arquivos cujas extensōes não são aceitas
					$ext = strtolower(substr($value, strrpos($value, '.') + 1));
					if(in_array($ext, $acceptedformats)) {
						$result[] = $value; 
					}
				} 
			} 
		} 
		   
		return $result; 
	}
	
	/*
	* Obtém informaçōes das imagens do array
	*/
	private function getImageInfoFromDir($dir,$subdir='') {
	
		foreach($dir as $key => $value){
			if(!is_int($key)) {
				$this->getImageInfoFromDir($value,$subdir . $key . DIRECTORY_SEPARATOR);
			} else {
				$this->calculateSpriteWidthHeight($this->folders_config["origin"]["images"] . DIRECTORY_SEPARATOR . $subdir . $value);
			}
		}
	}
	
	/*
	* Obtém informaçōes das imagens do array
	*/
	private function getImagesFromDir($dir,$subdir='') {
		foreach($dir as $key => $value){
			if(!is_int($key)) {
				$this->getImagesFromDir($value,$subdir . $key . DIRECTORY_SEPARATOR);
			} else {
				$this->proccessMedia($this->folders_config["origin"]["images"] . DIRECTORY_SEPARATOR . $subdir . $value);
			}
		}
	}
	
	/*
	* Cria sprite
	*/
	private function createSprite() {
	
		$arrImages = $this->getSprites();

		
		if(count($arrImages)>0) {
		
			// Calcula largura e altura do sprite
			$this->getImageInfoFromDir($arrImages); 
		
			// Cria sprite vazio
			$this->im = imagecreatetruecolor($this->im_w, $this->im_h);
			imagealphablending($this->im, false);
			$transparency = imagecolorallocatealpha($this->im, 0, 0, 0, 127);
			imagefill($this->im, 0, 0, $transparency);
			imagesavealpha($this->im, true);
			
			$x = 0;
			$y = 0;
		
			$this->getImagesFromDir($arrImages);
			
			// Grava sprite
			$this->saveSprite();
			
			// Grava css
			$this->saveCss();
			
			// Grava examplo html
			$this->saveHtml();
		
		}
		
		
		
		header('location:'.$this->folders_config['destiny']['example']);
		exit();
	
	}
	
	/*
	* calcula w e h do sprite 
	* @param: string $image
	* @return: object $this->temp 
	*/
	private function calculateSpriteWidthHeight($image) {
		if(is_file($image)) {
      $arrImage = @getimagesize($image);
			// início			
			$tmps =	$arrImage[0]+$this->temp_sep;
			if ($tmps > $this->im_w) $this->im_w = $arrImage[0]+$this->temp_sep;
			// fim
			$this->im_h += $arrImage[1]+$this->temp_sep;
		}
	}
	
	/*
	* Proccessa mídia
	* @param: string $image
	* @return: object $this->temp 
	*/
	private function proccessMedia($image) {
		if(is_file($image)) {
            $arrImage = @getimagesize($image);
			$this->temp_w = $arrImage[0];
			$this->temp_h = $arrImage[1];
			
			$tmp = ImageCreateTrueColor($this->im_w, $this->im_h);
			imagealphablending($tmp, false);
			$col=imagecolorallocatealpha($tmp,255,255,255,0);
			imagefilledrectangle($tmp,0,0,$this->im_w, $this->im_h,$col);
			imagealphablending($tmp,true);
			
			$gd_ext = substr($image, -3);
			
			if(strtolower($gd_ext) == "gif") {
              if (!$this->temp = imagecreatefromgif($image)) {
                    exit;
              }
            } else if(strtolower($gd_ext) == "jpg") {
              if (!$this->temp = imagecreatefromjpeg($image)) {
                    exit;
              }
            } else if(strtolower($gd_ext) == "png") {
              if (!$this->temp = imagecreatefrompng($image)) {
                    exit;
              }
            } else {
                die;
            }

			imagecopyresampled($tmp, $this->im, 0, 0, 0, 0, $this->im_w, $this->im_h, $this->im_w, $this->im_h);
			imagealphablending($tmp,true);
			
			// Adiciona cada imagem ao sprite
			
			// Início
			imagecopyresampled($this->im, $this->temp, 0, $this->im_y, 0, 0, $this->temp_w, $this->temp_h, $this->temp_w, $this->temp_h);  
			// Fim
			
			imagealphablending($this->im,true);
			
			$ext = substr($image, strrpos($image, '.'));
			
			$filename = basename($image,$ext);
			
			// Adiciona parte de script ao css
			$this->genCssPieceCode($filename);
			
			// Adiciona parte de script ao exemplo html
			$this->genHtmlPieceCode($filename);
			
			$this->im_x += $this->temp_w+$this->temp_sep;
			$this->im_y += $this->temp_h+$this->temp_sep;
			
		} else {
            die;
        }
	}
	
	private function genCssPieceCode($name) {
		// Se nome do arquivo contiver "_hover" adiciona a parte do código
		if(strpos($name,"_hover")!==false) $name = substr($name,0,-6).':hover';
		
		// Início
		$temp_css_detail = "background:url('".$this->folders_config['destiny']['ini_path'].$this->folders_config['destiny']['sprites']."') 0 -".$this->im_y."px no-repeat;".$this->temp_min_sep;
		// Fim
		
		$temp_css_detail .= "width:".$this->temp_w."px; height:".$this->temp_h."px".$this->temp_min_sep;
		$temp_css = ".".$name." {".$temp_css_detail."}".$this->temp_min_sep;
		$this->temp_css .= $temp_css;
	}
	
	private function genHtmlPieceCode($name) {
	// Se nome do arquivo contiver "_hover" adiciona a parte do código
		if(strpos($name,"_hover")===false) {
			$temp_html = '<h3>class: '.$name.'</h3>';
			$temp_html .= '<div class="'.$name.'">';
			$temp_html .= '</div>';
			$this->temp_html .= $temp_html;	
		}
	}
	
	private function saveSprite() {
		imagepng($this->im,$this->folders_config['destiny']['sprites'],3); 
		return $this->im;
		imagedestroy($this->im);
	}
	
	private function saveCss() {
		$css_path = $this->folders_config['destiny']['styles'];
		file_put_contents($css_path,$this->css_init.$this->temp_css);
	}
	
	private function saveHtml() {
		$html_path = $this->folders_config['destiny']['example'];
		$html = '<link rel="stylesheet" href="'.$this->folders_config['destiny']['ini_path'].$this->folders_config['destiny']['styles'].'">'.$this->temp_html;
		file_put_contents($html_path,$html);
	}
 

	/**
     * Atribui o resultado temp da imagem
     * @var object $temp
     * @return object
	 */
	private function setTemp($temp)
    {
		return $this->temp = $temp;
	}
 
	/**
     * Obtém o resultado temp da imagem
     * 
     * @return object
	 */
	private function getImageTemp()
    {
		return $this->temp;
	}
 
	/**
     * Atribui o resultado da imagem 
     * @var object $image
     * @return object
	 */
	private function setImage($image)
    {
		return $this->im = $image;
	}
 
	/**
     * Obtém o resultado da imagem
     * 
     * @return object
	 */
	private function getImage()
    {
		return $this->im;
	}

	/**
     * Atribui array de sprites 
     * 
     * @return array
	 */
	private function setSprite($sprites)
    {
		return $this->sprites = $sprites;
	}
	
	/**
     * Obtém array de sprites 
     * 
     * @return array
	 */
	private function getSprites()
    {
		return $this->sprites;
	}
		
	/**
     * Atribui css de ofuscação
     * 
     * @return string
	 */
	public function setMinization($obs = true) {
		if($obs) $this->temp_min_sep = '';
		else $this->temp_min_sep = "\n";
	}
	
	/**
     * Atribui css init
     * 
     * @return string
	 */
	public function setCssInit($style) {
		$this->css_init = $style.$this->temp_min_sep;
	}
	
	/**
     *  Atribui array de configuração de pasta
     * 
     * @return array
	 */
	public function setFoldersConfig($config)
    {
		return $this->folders_config = $config;
	}
 
 }