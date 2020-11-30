<?php

namespace App\Model;
use Core\Database;

class SurveyModel extends Database
{

    // fonction pour créer un sondage et les envoyer en bdd
    public function createSurvey(array $cs)
    {
        $surveyCreation = "INSERT INTO polls (poll-title, responses_Number, response1, response2,
        response3, response4, creationDate, endDate)
        VALUES(:poll-title, :questionsNumber, :question1, :question2, :question3, :question4, NOW(), :endDate";

        return $this->prepare($surveyCreation, $cs);
    }

    // fonction pour sélectionner les champs remplis du sondage en bdd
    public function getSurveys()
    {
        $getSurveys = "SELECT poll-title, response1, response2, response3, response4 FROM polls";

        return $this->query($getSurveys, true);
    }

    public function getMess()
    {
        $msg = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 20";

        return $this->query($msg, true);
    }

    public function postMess(array $gm)
    {
        $postMsg = "INSERT INTO comments(author, content, created_at) VALUES(:author, :content, NOW())";

        return $this->prepare($postMsg, $gm);
    }
}