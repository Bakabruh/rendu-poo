<?php 

    define("ROOT", dirname(__DIR__));

    require ROOT."/Autoloader.php";
    Autoloader::register();

    require ROOT."/router.php";