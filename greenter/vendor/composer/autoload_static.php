<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f49c6efb042e2422c916d986505be32
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\Finder\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'PhpZip\\' => 7,
        ),
        'G' => 
        array (
            'Greenter\\XMLSecLibs\\' => 20,
            'Greenter\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'PhpZip\\' => 
        array (
            0 => __DIR__ . '/..' . '/nelexa/zip/src',
        ),
        'Greenter\\XMLSecLibs\\' => 
        array (
            0 => __DIR__ . '/..' . '/greenter/xmldsig/src',
        ),
        'Greenter\\' => 
        array (
            0 => __DIR__ . '/..' . '/greenter/core/src/Core',
            1 => __DIR__ . '/..' . '/greenter/lite/src/Greenter',
            2 => __DIR__ . '/..' . '/greenter/ws/src',
            3 => __DIR__ . '/..' . '/greenter/xml/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f49c6efb042e2422c916d986505be32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f49c6efb042e2422c916d986505be32::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1f49c6efb042e2422c916d986505be32::$classMap;

        }, null, ClassLoader::class);
    }
}