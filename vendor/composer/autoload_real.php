<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitacfc2ea8c7e3c02df098a82a88561d69
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitacfc2ea8c7e3c02df098a82a88561d69', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitacfc2ea8c7e3c02df098a82a88561d69', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitacfc2ea8c7e3c02df098a82a88561d69::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
