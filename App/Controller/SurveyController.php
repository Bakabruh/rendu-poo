<?php

namespace App\Controller;
use App\Model\SurveyModel;
use Core\Database;

class surveyController
{
    public function createSurvey()
    {

        $db = new Database;

        $getCreation = "SELECT * FROM create-poll";

        $creation = $db->query($getCreation, true);

    }
}