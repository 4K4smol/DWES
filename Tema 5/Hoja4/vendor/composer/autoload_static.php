<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita3b4624b8ebe290e24e7bcb9a85a8f7f
{
    public static $files = array (
        '69d992b4bf795e9f5d94c48e2157599e' => __DIR__ . '/../..' . '/src/Ficheros/Helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita3b4624b8ebe290e24e7bcb9a85a8f7f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita3b4624b8ebe290e24e7bcb9a85a8f7f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita3b4624b8ebe290e24e7bcb9a85a8f7f::$classMap;

        }, null, ClassLoader::class);
    }
}
