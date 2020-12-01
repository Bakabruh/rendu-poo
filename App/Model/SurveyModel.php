<?php

namespace App\Model;
use Core\Database;

class SurveyModel extends Database
{

    // fonction pour créer un sondage et les envoyer en bdd
    public function createSurvey(array $cs)
    {
        $surveyCreation = "INSERT INTO polls (pollTitle, reponse1, reponse2, reponse3, reponse4, endDate, creatorsId)
        VALUES(:pollTitle, :response1, :response2, :response3, :response4, :endDate, :id)";

        return $this->prepare($surveyCreation, $cs);
    }

    public function getMess()
    {
        $msg = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 15";

        return $this->query($msg, true);
    }

    public function postMess($newmsg)
    {
        $postMsg = "INSERT INTO comments(author, content) VALUES(:author, :content)";

        return $this->prepare($postMsg, $newmsg);
    }
}