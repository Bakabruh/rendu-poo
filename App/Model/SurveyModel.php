<?php

namespace App\Model;
use Core\Database;

class SurveyModel extends Database
{
    public function createSurvey(array $cs)
    {
        $surveyCreation = "INSERT INTO create-poll (poll-title, questionsNumber, question1, question2,
        question3, question4, creationDate)
        VALUES(:poll-title, :questionsNumber, :question1, :question2, :question3, :question4, NOW()";

        return $this->prepare($surveyCreation, $cs);
    }

    public function getSurveys()
    {
        $getSurveys = "SELECT poll-title, question1, question2, question3, question4 FROM create-poll";

        return $this->query($getSurveys, true);
    }
}