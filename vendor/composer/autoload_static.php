<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c6557fd043bae0ba6bf8669412de364
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shumonpal\\LaravelAppTracker\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shumonpal\\LaravelAppTracker\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c6557fd043bae0ba6bf8669412de364::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c6557fd043bae0ba6bf8669412de364::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c6557fd043bae0ba6bf8669412de364::$classMap;

        }, null, ClassLoader::class);
    }
}
