<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc732342428e1992a816abd1249ccd337
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc732342428e1992a816abd1249ccd337::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc732342428e1992a816abd1249ccd337::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc732342428e1992a816abd1249ccd337::$classMap;

        }, null, ClassLoader::class);
    }
}
