<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5055b2363f28231a05cf0962b6e3271b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5055b2363f28231a05cf0962b6e3271b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5055b2363f28231a05cf0962b6e3271b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5055b2363f28231a05cf0962b6e3271b::$classMap;

        }, null, ClassLoader::class);
    }
}