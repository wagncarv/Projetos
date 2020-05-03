<?php

//
$dimensions = file_get_contents("php://input");
if (isset($dimensions)){
    save_sprite_css();
}

/**
 * Obtém dados recebidos via post e os repassa para a função write_css.
 */
function save_sprite_css(){
    $dimensions = file_get_contents("php://input");
    $suffix = $_REQUEST["suffix"];
    $spriteName = "../../storage/destiny/sprite/sprite_canvas_{$suffix}.png";

    $data = json_decode($dimensions);
    $dataArray = [];
    $values = [];

    for ($i=0; $i < count($data); $i++) { 
        array_push($dataArray, $data[$i]);
        array_push($values, json_decode($dataArray[$i]));
    }

    write_css($values, $spriteName);
   
}
 
/**
 * Grava mapeamentos de cada emoji em arquivo.
 */
function write_css($data, $spriteName){
    try{
        for($i = 0; $i < sizeof($data); $i++){
            file_put_contents
            ("../../storage/destiny/css/sprite.css",
                ".unicode_" . substr($data[$i]->id, 2). "{" 
                    . "\n\theight: " . $data[$i]->height . "px;"
                    . "\n\twidth: " . $data[$i]->width . "px;"
                    . "\n\tbackground-image: " . "url("."'". $spriteName . "'" .");\n\t" 
                    . "background-position: -" . $data[$i]->positionX 
                    . "px -" 
                    . $data[$i]->positionY . "px; \n} \n",
                    FILE_APPEND
            );
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}



?>