<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c25586b46522176550e876e36041d52
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'Anor\\Www\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Anor\\Www\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c25586b46522176550e876e36041d52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c25586b46522176550e876e36041d52::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c25586b46522176550e876e36041d52::$classMap;

        }, null, ClassLoader::class);
    }
}