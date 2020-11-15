<?php 

define("ROOT", dirname(__DIR__));

session_start();

require ROOT."/Core/Database.php";





require ROOT."/vendor/autoload.php";
// Autoloader::register();

require ROOT."/router.php";

