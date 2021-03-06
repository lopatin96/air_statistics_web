<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c1debb0c451ee8068386c8d0ff85473
{
    public static $files = array (
        '5d9c5be1aa1fbc12016e2c5bd16bbc70' => __DIR__ . '/..' . '/dusank/knapsack/src/collection_functions.php',
        'e5fde315a98ded36f9b25eb160f6c9fc' => __DIR__ . '/..' . '/dusank/knapsack/src/utility_functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Test\\' => 5,
        ),
        'S' => 
        array (
            'Simplon\\Mysql\\' => 14,
            'Simplon\\Helper\\' => 15,
        ),
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
        'D' => 
        array (
            'DusanKasan\\Knapsack\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/simplon/mysql/test',
        ),
        'Simplon\\Mysql\\' => 
        array (
            0 => __DIR__ . '/..' . '/simplon/mysql/src',
        ),
        'Simplon\\Helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/simplon/helper/src',
        ),
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
        'DusanKasan\\Knapsack\\' => 
        array (
            0 => __DIR__ . '/..' . '/dusank/knapsack/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c1debb0c451ee8068386c8d0ff85473::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c1debb0c451ee8068386c8d0ff85473::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
