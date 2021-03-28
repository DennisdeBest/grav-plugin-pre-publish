<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2534cc5fde07417aee69ffc071f25d04
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grav\\Plugin\\PrePublish\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grav\\Plugin\\PrePublish\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Grav\\Plugin\\PrePublishPlugin' => __DIR__ . '/../..' . '/pre-publish.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2534cc5fde07417aee69ffc071f25d04::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2534cc5fde07417aee69ffc071f25d04::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2534cc5fde07417aee69ffc071f25d04::$classMap;

        }, null, ClassLoader::class);
    }
}