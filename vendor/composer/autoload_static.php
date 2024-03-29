<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4406638d5e01b9cda491c1c064a1378e
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'colibri_functions\\fields\\partials\\' => 34,
        ),
        'S' => 
        array (
            'StoutLogic\\AcfBuilder\\' => 22,
        ),
        'D' => 
        array (
            'Doctrine\\Instantiator\\' => 22,
            'Doctrine\\Common\\Inflector\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'colibri_functions\\fields\\partials\\' => 
        array (
            0 => __DIR__ . '/../..' . '/colibri-functions/fields/partials',
        ),
        'StoutLogic\\AcfBuilder\\' => 
        array (
            0 => __DIR__ . '/..' . '/stoutlogic/acf-builder/src',
        ),
        'Doctrine\\Instantiator\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/instantiator/src/Doctrine/Instantiator',
        ),
        'Doctrine\\Common\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Common/Inflector',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4406638d5e01b9cda491c1c064a1378e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4406638d5e01b9cda491c1c064a1378e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
