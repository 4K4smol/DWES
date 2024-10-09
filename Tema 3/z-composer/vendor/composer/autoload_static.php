<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4ac266ae697b8e915e3e3b0d80dd92e
{
    public static $files = array (
        '741584db7d7d87c093e04d16abe3ca01' => __DIR__ . '/../..' . '/app/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hackzilla\\PasswordGenerator\\' => 28,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hackzilla\\PasswordGenerator\\' => 
        array (
            0 => __DIR__ . '/..' . '/hackzilla/password-generator',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4ac266ae697b8e915e3e3b0d80dd92e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4ac266ae697b8e915e3e3b0d80dd92e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd4ac266ae697b8e915e3e3b0d80dd92e::$classMap;

        }, null, ClassLoader::class);
    }
}
