<?php

use App\Controller\UserController;
use App\Controller\DefaultController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {
        case 'createSurvey':
            $controller->renderCreation();
        break;
        
        case 'create-user':

            if(isset($_GET['action']) && $_GET['action'] == 'disconnect') {
                $controller = new UserController();
                $controller->disconnect(); 

            } else if(isset($_POST['action']) && $_POST['action'] == 'connect') {
                $controller = new UserController();
                $controller->connectUser(); 
            } else {
                $controller = new UserController();
                $controller->createUser(); 
            }
            
            break;

        case 'user' :

            if(array_key_exists("page", $_GET) && array_key_exists("name", $_GET)) {
                $controller = new UserController();
                $controller->visitUser();
            } else {
                $controller = new UserController();
                $controller->userIndex(); 
            }
            
            break;

        case 'home' :

            if(isset($_SESSION['Connected']) && $_SESSION['Connected'] == true) {
                $controller = new DefaultController();
                $controller->homeIndex();
            } else {
                $controller = new UserController();
                $controller->createUser();
            }
            break;

        default:
            # code...
            break;
    }
} else{
    $controller = new UserController();
    $controller->createUser();
}
