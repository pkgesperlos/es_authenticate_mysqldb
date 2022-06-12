<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit27a07448e81ce71558d0f5cb475eb46b
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Esperlos98\\Esauthentication\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Esperlos98\\Esauthentication\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit27a07448e81ce71558d0f5cb475eb46b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit27a07448e81ce71558d0f5cb475eb46b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit27a07448e81ce71558d0f5cb475eb46b::$classMap;

        }, null, ClassLoader::class);
    }
}
