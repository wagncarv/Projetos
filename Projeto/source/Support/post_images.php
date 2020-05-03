<?php 
    $getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);


    if ($_FILES && !empty($_FILES['file']['name'])){
        $fileUpload = $_FILES['file'];
        var_dump($fileUpload);
        $allowedTypes = [
          "image/png"
        ];
    }elseif($getPost){
        echo "<p>Arquivo maior que limite permitido</p>";
    }else{
        if($_FILES){
            echo "<p>Selecione arquivos antes de enviar</p>";
        }
           
    }

?>