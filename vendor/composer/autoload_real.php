<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcff8bad65658f576b47ce7f9dc5c418c
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

        spl_autoload_register(array('ComposerAutoloaderInitcff8bad65658f576b47ce7f9dc5c418c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcff8bad65658f576b47ce7f9dc5c418c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcff8bad65658f576b47ce7f9dc5c418c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
