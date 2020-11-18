<?php

    use App\Controller\surveyController;

    define("ROOT", dirname(__DIR__));
    require ROOT."/Autoloader.php";
    Autoloader::register();

    require ROOT."/router.php";