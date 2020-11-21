<?php

use App\Controller\surveyController;

$controller = new surveyController();

if (array_key_exists('page', $_GET)) {
    switch ($_GET['page']) {
        case 'createSurvey':
            $controller->renderCreation();
            break;
        default:
            $controller->renderIndex();
    }
}