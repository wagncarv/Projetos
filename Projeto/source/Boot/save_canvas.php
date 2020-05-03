<?php
/**
 * Grava imagem sprite com extensão .png em arquivo.
 */
function save_sprite(){
    $image = $_POST["image"];
    $image = explode(";", $image)[1];
    $image = explode(",", $image)[1];
    $image = str_replace(" ", "+", $image);

    $image = base64_decode($image);

    $suffix = $_REQUEST["suffix"];

    try{
        file_put_contents("../../storage/destiny/sprite/sprite_canvas_{$suffix}.png", $image);
    }catch(Exception $e){
        echo "Erro: {$e->getMessage()}";
    }
}

    save_sprite();

?>