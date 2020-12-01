<?php 

// définis le path racine du projet
define("ROOT", dirname(__DIR__));

session_start();

require ROOT."/Core/Database.php";

require ROOT."/vendor/autoload.php";

require ROOT."/router.php";
