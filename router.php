<?php

use App\Controller\surveyController;

if (array_key_exists('page', $_GET)) {
    switch ($_GET['page']) {
        case 'createSurvey':
            $controller = new surveyController;
            $controller->renderCreation();
            break;
    }
}