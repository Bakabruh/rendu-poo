<?php 

// définis le path racine du projet
define("ROOT", dirname(__DIR__));

//définis la timezone du site
date_default_timezone_set('Europe/Paris');

session_start();

require ROOT."/Core/Database.php";

require ROOT."/vendor/autoload.php";

require ROOT."/router.php";
