<?php

use App\Controller\UserController;
use App\Controller\DefaultController;
use App\Controller\surveyController;




if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {

        // route vers la page de création de sondages
        case 'createSurvey':

            if(isset($_POST['pollTitle'])) {
                $controller = new surveyController();
                $controller->createSurvey();
            }
    
            $controller = new surveyController();
            $controller->renderCreation();
        break;

        // route vers les sondages
        case 'survey' :

            if(array_key_exists("id", $_GET) && $_GET['id'] != "") {
                if(isset($_POST['vote'])) {
                    $controller = new surveyController();
                    $controller->vote();
                    $controller->renderSurvey();
                } else if(array_key_exists("function", $_GET)){

                    switch($_GET["function"]) {

                        case 'score' :
                            $controller = new surveyController();
                            $controller->getVotes();
                        break;

                        case 'comment' :
                            $controller = new surveyController();
                            $controller->postMessages();
                            $controller->renderSurvey();
                        break;

                        case 'coms' :
                            $controller = new surveyController();
                            $controller->getMessages();
                        break;

                        case 'status' :
                            $controller = new surveyController();
                            $controller->getStatus();
                        break;

                        default :

                        break;
                    }
                    
                } else {
                    $controller = new surveyController();
                    $controller->renderSurvey();
                }
            } else {
                $controller = new DefaultController();
                $controller->homeIndex();
            }

            

        break;
        
        // route vers la page de création d'utilisateur
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

        // route vers les pages d'utilisateurs
        case 'user' :

            if(array_key_exists("page", $_GET) && array_key_exists("name", $_GET)) {
                $controller = new UserController();
                $controller->visitUser();
            } else if(isset($_POST['rq_user_id'])) {
                $controller = new UserController();
                $controller->sendRequest(); 
            } else if(isset($_POST['accept']) || isset($_POST['decline'])) {
                $controller = new UserController();
                $controller->treatRequest();
                $controller->userIndex();
            } else if(isset($_POST['delete'])) {
                $controller = new UserController();
                $controller->deleteFriend(); 
                $controller->userIndex(); 
            } else if(isset($_POST['newname'])) {
                $controller = new UserController();
                $controller->newName(); 
                $controller->userIndex(); 
            } else if(isset($_POST['color'])) {
                $controller = new UserController();
                $controller->newColor(); 
                $controller->userIndex(); 
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
            if(isset($_SESSION['Connected']) && $_SESSION['Connected'] == true) {
                $controller = new DefaultController();
                $controller->homeIndex();
            } else {
                $controller = new UserController();
                $controller->createUser();
            }
        break;
    }
} else {
    // session_destroy();
    
    $controller = new UserController();
    $controller->createUser();
}
