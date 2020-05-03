<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit764117fe2c017d1f480d7580cea18e1c
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '2df12f4c7a59e1601f8379eeef12d73b' => __DIR__ . '/../..' . '/source/Boot/Config.php',
        '3052369bee4209f554c89c3ef81938de' => __DIR__ . '/../..' . '/source/Boot/emoji_functions.php',
        'fa0f8e7635614dbf9a81383405f572b3' => __DIR__ . '/../..' . '/source/Boot/io_functions.php',
        '5fd85ad5d8cb998121e8bf3a2d83bf8b' => __DIR__ . '/../..' . '/source/Boot/save_canvas.php',
        '944e83cf54f394a5b8a8674516e1c2f8' => __DIR__ . '/../..' . '/source/Boot/save_sprite.php',
    );

    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'voku\\helper\\' => 12,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\CssSelector\\' => 30,
            'Source\\' => 7,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
        ),
        'J' => 
        array (
            'JoyPixels\\' => 10,
        ),
        'E' => 
        array (
            'Emojione\\' => 9,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\Uploader\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'voku\\helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/voku/simple_html_dom/src/voku/helper',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\CssSelector\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/css-selector',
        ),
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'JoyPixels\\' => 
        array (
            0 => __DIR__ . '/..' . '/joypixels/emoji-toolkit/lib/php/src',
        ),
        'Emojione\\' => 
        array (
            0 => __DIR__ . '/..' . '/emojione/emojione/lib/php/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'CoffeeCode\\Uploader\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/uploader/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit764117fe2c017d1f480d7580cea18e1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit764117fe2c017d1f480d7580cea18e1c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}