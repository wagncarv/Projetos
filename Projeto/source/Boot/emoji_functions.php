    <?php
    /**
     * Converte ícone emoji em formato hexadecimal.
     * @param $emoji
     * @return string
     */
    function emoji_to_unicode($emoji):string {
        $emoji = mb_convert_encoding($emoji, 'UTF-32','UTF-8');
        $unicode = strtoupper(preg_replace("/^[0]+/","U+", bin2hex($emoji)));
        return $unicode;
    }

    /**
     * Lê ícones emojis contidos em arquivo CSV.
     * Retorna array contendo emojis.
     * @return mixed
     * @throws Exception
     */
    function load_emojis():array {
       try{
           $data = read_from_csv(CONF_FILE_SOURCE);
           $emoji = array_multi_to_unidim($data);
           return $emoji;
       }catch (Exception $e){
           $e->getMessage();
       }
    }

    /**
     * Converte ícone emoji em formato decimal.
     * @param $emoji
     * @return string
     */
    function emoji_to_decimal ($emoji):string {
        $str = emoji_to_unicode($emoji);
        $dec = hexdec($str);
        return "&#" . $dec . ";";
    }

    /**
     * Converte ícone emoji em formato hexadecimal.
     * @param $emoji
     * @return string
     */
    function emoji_to_hexadecimal ($emoji):string {
        $decimal = hexdec(emoji_to_unicode($emoji));
        $str = dechex($decimal);
        return "&#x". $str .";";
    }

    /**
     * Converte ícone emoji em formato texto.
     * @param $emoji
     * @return string
     */
    function emoji_to_utf8_text ($emoji):string {
        $field=bin2hex($emoji);
        $field=chunk_split($field,2,"\\x");
        return $field= "\\x" . substr($field,0,-2);
    }
