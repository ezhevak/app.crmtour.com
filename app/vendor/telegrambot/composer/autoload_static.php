<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita3b3fd74de8ebd583a0e4ff1dc449c32
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TelegramBot\\Api\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TelegramBot\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/telegram-bot/api/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita3b3fd74de8ebd583a0e4ff1dc449c32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita3b3fd74de8ebd583a0e4ff1dc449c32::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
