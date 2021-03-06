<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit14fdfbf22a23ae041c063e747480a2a2
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
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
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
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'App\\Classes\\Check' => __DIR__ . '/../..' . '/app/Classes/Check.php',
        'App\\Classes\\DataCheck' => __DIR__ . '/../..' . '/app/Classes/DataCheck.php',
        'App\\Classes\\File' => __DIR__ . '/../..' . '/app/Classes/File.php',
        'App\\Classes\\IpGet' => __DIR__ . '/../..' . '/app/Classes/IpGet.php',
        'App\\Classes\\TokenGen' => __DIR__ . '/../..' . '/app/Classes/TokenGen.php',
        'App\\Classes\\TwigLoader' => __DIR__ . '/../..' . '/app/Classes/TwigLoader.php',
        'App\\Classes\\Validate' => __DIR__ . '/../..' . '/app/Classes/Validate.php',
        'App\\Classes\\cPanel\\cPanel' => __DIR__ . '/../..' . '/app/Classes/cPanel/cPanel.php',
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/app/controllers/Controller.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/app/core/Router.php',
        'App\\controllers\\DomainController' => __DIR__ . '/../..' . '/app/controllers/DomainController.php',
        'App\\controllers\\securitycheck' => __DIR__ . '/../..' . '/app/controllers/securitycheck.php',
        'app\\core\\Controller' => __DIR__ . '/../..' . '/app/core/Controller.php',
        'app\\core\\DB' => __DIR__ . '/../..' . '/app/core/DB.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit14fdfbf22a23ae041c063e747480a2a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit14fdfbf22a23ae041c063e747480a2a2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit14fdfbf22a23ae041c063e747480a2a2::$classMap;

        }, null, ClassLoader::class);
    }
}
