<?php

	require __DIR__ . "/vendor/autoload.php";
	

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Sprite</title>
		<link rel="stylesheet" href="storage/destiny/css/sprite.css">
	</head>
	<body>
		<h1 style="text-align:center;">Teste Sprite</h1>

		<div class="container">
			<form action="" accept="text/csv" method="post" enctype="multipart/form-data">

				<label for="fileToUpload">Selecione os emojis</label><br/>
				
				<input type="file" name="fileToUpload" id="fileToUpload"><br/>

				<!-- <input type="submit" value="Enviar arquivos" /> -->

			</form>

		</div>

		<div style="margin: 10px;">
			<h1>Canvas</h1>
			<canvas id="canvas" width="320" height="320" ></canvas>
		</div>

	</body>
	<script type="text/javascript" src="shared/scripts/sprite_functions_text.js"></script>

</html>



























