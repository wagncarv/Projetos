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

<<<<<<< HEAD
<<<<<<< HEAD
=======
            fclose($file);
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
            fclose($file);
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
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
            fwrite($file,"\t".$header[0] . "\t" . $header[1] . "\t" . $header[2] . "\t" . $header[3] ."\t\n");
            for ($i = 0; $i < sizeof($array_uni); $i++) {
                fwrite($file, $emojis[$i] . "\t");
                fwrite($file, $hexadecimal[$i] . "\t");
                fwrite($file,$unicode[$i] . "\t");
                fwrite($file, $utf8_txt[$i] . "\t\n ");
            }

<<<<<<< HEAD
<<<<<<< HEAD
=======

            fclose($file);
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======

            fclose($file);
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
            return true;
        } catch (Exception $e) {
            $e->getMessage();
            return false;
        }
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




