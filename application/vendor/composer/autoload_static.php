<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73f4db08327e67f102daf1138fa0107b
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73f4db08327e67f102daf1138fa0107b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73f4db08327e67f102daf1138fa0107b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit73f4db08327e67f102daf1138fa0107b::$classMap;

        }, null, ClassLoader::class);
    }
}
