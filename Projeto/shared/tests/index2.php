<?php

	require __DIR__ . "/vendor/autoload.php";
	
	$upload = new \CoffeeCode\Uploader\File("storage/uploads/files", "emojis");

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
            echo "<p>Selecione arquivo válido</p>";
        }elseif (!in_array($file["type"], $upload::isAllowed())){
            echo "<p>O arquivo {$file['name']} não é válido</p>";
        }
        else{
            $uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME), 350);
            echo "<p>{$uploaded}</p>";
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
			<form action="" accept="text/html, text/plain" method="post" enctype="multipart/form-data">

				<label for="filesToUpload">Selecione os emojis</label><br/>
				
				<input type="file" name="filesToUpload[]" id="filesToUpload" multiple><br/>

				<input type="submit" value="Enviar arquivos" />

			</form>

		</div>


		<h1>Canvas</h1>
		<canvas id="canvas" width="350" height="350" ></canvas>

	</body>

	<!--<script type="text/javascript" src="shared/scripts/sprite_functions.js"></script>-->
	<script type="text/javascript" src="shared/scripts/sprite_functions_text.js"></script>
</html>

























