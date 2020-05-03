<?php

/**
 * Lê arquivo CSV contendo ícones emojis.
 * Caso arquivo não exista ou não seja possível lê-lo
 * lança exceção.
 * @throws Exception
 * @param $source
 * @return array
 */
function read_from_csv($source):array {
    $dataArray = array();
    $cont = 0;

    try {
        if (($file = fopen($source, "r")) !== FALSE) {
            while (($data = fgetcsv($file, 100, ",")) !== FALSE) {
                if (in_array($data, $dataArray)) {
                    continue;
                }
                $dataArray[$cont] = $data;
                $cont++;
            }
        }

        //fclose($file);
        return $dataArray;
    } catch (Exception $e) {
        echo "Falha: " . $e->getMessage();
    }

    return $dataArray;
}

/**
 * Escreve dados lidos de arquivo CSV em outro arquivo CSV.
 * Os dados gravados contêm os códigos dos emojis convertidos
 * em formatos utf8, hexadecimal, decimal, texto.
 * @param $from
 * @param $to
 * @return bool
 * @throws Exception
 */
function write_to_csv($from, $to):bool {

    /** Lê os dados do arquivo CSV */
    $data = read_from_csv($from);

    /** Converte array multidimensional em unidimensional */
    $array_uni = array_multi_to_unidim($data);

    /** Aplica array_map nos arrays, popula os arrays com os valores hexadecimal, utf8 texto */
    $hexadecimal = array_map("emoji_to_hexadecimal", $array_uni);
    $utf8_txt = array_map("emoji_to_utf8_text", $array_uni);
    $unicode = array_map("emoji_to_unicode", $array_uni);
    $emojis = load_emojis();

    /** Grava os dados no arquivo CSV */
    $header = array('Emoji', 'Hexadecimal', 'Unicode', 'Texto');
    try {
        $file = fopen($to, 'a') or die ("Arquivo não pôde ser aberto");
        for ($i = 0; $i < sizeof($array_uni); $i++) {
            fwrite($file, $emojis[$i] . ",");
            fwrite($file, $hexadecimal[$i] . ",");
            fwrite($file,$unicode[$i] . ",");
            fwrite($file, $utf8_txt[$i] . ",\n");
        }


        //fclose($file);
        return true;
    } catch (Exception $e) {
        $e->getMessage();
        return false;
    }
}

/**
 *  * Escreve dados lidos de arquivo CSV, usando a função fputscsv(), nativa do PHP, em outro arquivo CSV.
 * Os dados gravados contêm os códigos dos emojis convertidos
 * em formatos utf8, hexadecimal, decimal, texto.
 * @param $from
 * @param $to
 * @return bool
 * @throws Exception
 */
function put_csv($from, $to):bool {

    /** Lê os dados do arquivo CSV */
    $data = read_from_csv($from);

    /** Converte array multidimensional em unidimensional */
    $array_uni = array_multi_to_unidim($data);

    /** Aplica array_map nos arrays, popula os arrays com os valores hexadecimal, utf8 texto */
    $hexadecimal = array_map("emoji_to_hexadecimal", $array_uni);
    $utf8_txt = array_map("emoji_to_utf8_text", $array_uni);
    $unicode = array_map("emoji_to_unicode", $array_uni);
    $emojis = load_emojis();

    /** Grava os dados no arquivo CSV */
    try {
        $file = fopen($to, 'w') or die ("Arquivo não pôde ser aberto");
        for ($i = 0; $i < sizeof($array_uni); $i++) {
            fputcsv($file, [
                $emojis[$i],
                $hexadecimal[$i],
                $unicode[$i],
                $utf8_txt[$i]
            ]);
        }


        //fclose($file);
        return true;
    } catch (Exception $e) {
        $e->getMessage();
        return false;
    }
}

/**
 *
 */
function put_image(){
    throw new Exception("not yet implemented");
}

/**
 * Converte array multidimensional em array unidimensional.
 * Dados lidos de arquivo CSV retornam array multidimensional,
 * que são convertidos em array unidimensional, para que
 * possa ser aplicada função map() neste último.
 * @param $array
 * @return array
 */
function array_multi_to_unidim($array):array {

    $array_uni = array();

    for ($i = 0; $i < sizeof($array); $i++) {
        for ($j = 0; $j < sizeof($array[$i]); $j++) {
            array_push($array_uni, $array[$i][$j]);
        }
    }
    return $array_uni;
}

/**
 * Converte array unidimensional em array multidimensional.
 * @param $array
 * @return array
 */
function array_uni_to_multidim($array):array {

    $array_multi = array();
    for ($i = 0; $i < sizeof($array); $i++) {
        array_push($array_multi, array($array[$i]));
    }
    return $array_multi;
}

/**
 * Obtém os src das imagens físicas contidas em url remotas
 * baixa-as para pasta local
 */
function save($url = null){
    $arr = ["1f1e6-1f1f4.png","1f3c3-1f3fd.png", "1f3c4-2640.png","1f3d8.png" ];
    for($i = 0; $i < count($arr); $i ++ ) {
        if (!isset($arr[$i])){continue;}
        str_replace(" ", "", $arr[$i]);
        $url_to_image = "https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/". $arr[$i];
        $my_save_dir = "image/";
        $filename = basename($url_to_image);
        $complete_save_location = $my_save_dir . $filename;
        file_put_contents($complete_save_location, file_get_contents($url_to_image));
    }
}

/**
 * Obtém o src das imagens, cria arquivo e grava-os nele
 * 
 */
function get_images_src(){
    $test = load_emojis();
    $imageArray = array();
    $file = fopen('storage/origin/image_path/src_path.txt', "w+");
    $html = '';
    $doc = new DOMDocument();
    for($i = 0; $i < sizeof($test); $i++){
       array_push($imageArray, Emojione::toImage($test[$i]));
       $html = Emojione::toImage($test[$i]);
       $doc->loadHTML($html);
       $xpath = new DOMXPath($doc);
       $nodelist = $xpath->query("//img");
       $node = $nodelist->item(0);
       if ($node == null){continue;}
       $value = $node->attributes->getNamedItem('src')->nodeValue;
       fwrite($file, $value . "\n");
    }
    
    fclose($file);
}

/**
 * Obtém todos os nomes dos arquivos contidos no caminho fornecido.
 * @param $path diretório dos arquivos
 */
function get_dir_file_names($path = "storage/images/png/32/"):array{
    $dir = scandir($path);
    $result = array();
    foreach($dir as $key => $value){
        if (strpos($value, ".png")){
            array_push($result,  basename($value, '.png'));
        }       
    }
    return $result;
}

/**
 * Obtém todos os nomes dos arquivos contidos no caminho fornecido
 * em um intervalo determinado.
 * @param $end fim do intervalo pretendido
 * @param $start início do intervalo pretendido
 * @param $path diretório dos arquivos
 */
function get_range_file_names($end, $start = 0, $path = "storage/images/png/32/"):array{
    $dir = scandir($path);
    $result = array();
    for($i = $start; $i <= $end; $i++){
        if (strpos($dir[$i], ".png")){
            array_push($result, basename($dir[$i], '.png'));
        }       
    }
    return $result;
}




