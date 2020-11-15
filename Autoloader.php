<?php

class Autoloader
{
    public static function autoload($className)
    {
        $className = str_replace("\\", "/", $className);
        require "$className.php";
    }

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, "autoload"));
    }
}
