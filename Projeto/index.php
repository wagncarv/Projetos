<?php

	require __DIR__ . "/vendor/autoload.php";
	
	$upload = new \CoffeeCode\Uploader\Image("storage/uploads", "images");

	$files = $_FILES;
	

if (!empty($files["filesToUpload"])){
    $emojis = $files["filesToUpload"];
    for ($i = 0; $i < count($emojis["type"]); $i++){
        foreach (array_keys($emojis) as $keys){
            $emojiFiles[$i][$keys] = $emojis[$keys][$i];
        }
    }
    foreach ($emojiFiles as $file){
        if (empty($file["type"])){
            echo "<p>Selecione imagem válida</p>";
        }elseif (!in_array($file["type"], $upload::isAllowed())){
            echo "<p>O arquivo {$file['name']} não é válido</p>";
        }
        else{
            $uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), 350);
            echo "<img src='{$uploaded}' />";
        }
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sprite</title>
		<link rel="stylesheet" href="shared/styles/sprite_styles.css" />
		<link rel="stylesheet" href="storage/destiny/css/sprite.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
	</head>
	<body>

		<div class="container">
			<form action="" accept="image/png, image/jpeg, image/jpg" method="post" enctype="multipart/form-data">

				<label for="filesToUpload">Selecione os arquivos de imagem</label><br/>
				
				<input type="file" name="filesToUpload[]" id="filesToUpload" multiple><br/>

				<input type="submit" value="Enviar arquivos" />

			</form>

		</div>


		<h1>Canvas</h1>
		<canvas id="canvas" width="320" height="320" ></canvas>

	</body>
	
	<script type="text/javascript" src="shared/scripts/sprite_functions_images.js"></script>
</html>

























