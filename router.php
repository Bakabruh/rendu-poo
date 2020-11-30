<?php

use App\Controller\UserController;
use App\Controller\DefaultController;
use App\Controller\surveyController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {

        // route vers la page de création de sondages
        case 'createSurvey':
            $controller = new surveyController();
            $controller->renderCreation();
        break;
        
        // route vers la page de création d'utilisateur
        case 'create-user':

            // si l'utilisateur n'est pas connecté
            if(isset($_GET['action']) && $_GET['action'] == 'disconnect') {
                $controller = new UserController();
                $controller->disconnect(); 

            // si l'utilisateur est connecté
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

        // route vers la page home
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

if(array_key_exists("task", $_GET)) {
    switch($_GET['task']) {
        case 'write':
        if(isset($_SESSION['Connected']) && $_SESSION['Connected'] == true) {
            $controller = new surveyController();
            $controller->postMessages();
        }
        break;

        case '':
        if(isset($_SESSION['Connected']) && $_SESSION['Connected'] == true) {
            $controller = new surveyController();
            $controller->getMessages();
        }
        break;
    }
}