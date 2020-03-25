<?php
    require __DIR__ . "/vendor/autoload.php";

    //include('source/Boot/emoji_functions.php');
   // include('source/Boot/io_functions.php');
    //include('source/Boot/Config.php');


    //********************
    // OBS:
    // verificar emoji_to_decimal, emoji_to_hexadecimal



    //$file = "storage/files/emojis.csv" ;

    //TESTES emoji.php
    //*************** teste ok
//    $file = CONF_FILE_SOURCE;
//    $io = load_emojis();
//    $io = read_from_csv($file);
//    var_dump($io);



    //TESTES emoji.php
    //*************** teste ok
    //$file = CONF_FILE_SOURCE;
    //$io = load_emojis();
    //$io = read_from_csv($file);
    //var_dump($io);

    //********** teste ok
    //$e = emoji_to_unicode('⌛');
    //var_dump($e);

    //********** teste ok
    //$l = load_emojis();
    //var_dump($l);

    //************* teste ok
    //echo $d = emoji_to_decimal('⏮');


    //************* teste ok
    //$hx = emoji_to_hexadecimal('⏮');
    //var_dump($hx);

    //************* teste ok
   //$u =  emoji_to_utf8_text('⏮');
   //var_dump($u);

   /////////////// TESTE IOSERVICE ////////////////

    //***************** teste ok
    //$r = read_from_csv($file);
    //var_dump($r);

    //***************** teste ok
    //$m = array([1,2,3], [13, 45, 9], [12,21,89]);
    //var_dump($m);
    //echo "<br/><br/>";
    //$uni = array_multi_to_unidim($m);
    //var_dump($uni);
    //echo "<br/><br/>";

    //***************** teste ok

//    $un = [13, 45, 9];
//    var_dump($un);
//    echo "<br/><br/>";
//    $mu = array_uni_to_multidim($un);
//    var_dump($mu);

    //************** teste
//    $from = CONF_FILE_SOURCE;
//    $to = CONF_FILE_PASTE;

    //************* teste ok
//    $s = write_to_csv($from, $to);
//    if ($s == true){
//        echo "<p>Arquivo csv gerado com sucesso!</p>";
//    }


//    $e = load_emojis();
//    var_dump($e);

    //$un = [13, 45, 9];
    //var_dump($un);
    //echo "<br/><br/>";
    //$mu = array_uni_to_multidim($un);
    //var_dump($mu);

    //************** teste

    //$from = CONF_FILE_SOURCE;
    //$to = CONF_FILE_PASTE;

    //************* teste ok
    //$s = write_to_csv($from, $to);
    //if ($s == true){
    //    echo "<p>Arquivo csv gerado com sucesso!</p>";
    //}

    $from = CONF_FILE_SOURCE;
    $to = CONF_FILE_PASTE;

    //************* teste ok
    $s = write_to_csv($from, $to);
    if ($s == true){
        echo "<p>Arquivo csv gerado com sucesso!</p>";
    }



    //$e = load_emojis();
    //var_dump($e);

    //write_to_csv($from, $to);
    //$file = fopen(CONF_FILE_SOURCE,"w");
    //echo fwrite($file,"Hello World, Ola mundo Testing!");
    //fclose($file);


//    $io = read_from_csv($file);
//    var_dump("Hello", $io);

    //$io = read_from_csv($file);
    //var_dump("Hello", $io);

    //$io = read_from_csv($file);
    //var_dump("Hello", $io);














