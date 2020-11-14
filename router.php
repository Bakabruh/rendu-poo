<?php

use App\Controller\UserController;
use App\Controller\DefaultController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {
        case 'create-user':
            $controller = new UserController();
            $controller->createUser();
            break;

        case 'user' :
            $controller = new UserController();
            $controller->userIndex();
            break;
        default:
            # code...
            break;
    }
} else{
    $controller = new DefaultController();
    $controller->homeIndex();
}