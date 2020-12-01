<?php

namespace App\Model;
use Core\Database;

class SurveyModel extends Database
{

    // fonctions pour créer un sondage et les envoyer en bdd
    public function createSurvey(array $cs)
    {
        $surveyCreation = "INSERT INTO surveys(question, end, creatorsId) VALUES(:pollTitle, :endDate, :id)";

        
        return $this->prepare($surveyCreation, $cs);
    }

    public function getSurveyId()
    {
        $id = "SELECT * FROM surveys";
        return $this->query($id, true);
    }

    public function createSurvey2($data)
    {
        $survey2 = "INSERT INTO answers (survey_id, reponse) VALUES (:id, :reponse)";
        return $this->prepare($survey2, $data);
    }



    // fonction pour afficher le sondage séléctionné

    public function getSurvey()
    {
        $getEm = "SELECT * FROM surveys INNER JOIN users on surveys.creatorsId = users.user_id";
        return $this->query($getEm, false);
    }

    public function getAnswers($id)
    {
        $getEm = "SELECT * FROM answers WHERE survey_id = '" . $id . "'";
        return $this->query($getEm, true);
    }

    //repondre au sondage

    public function getGood($id)
    {
        $answerVotes = "SELECT * FROM answers WHERE id = '" . $id . "'";
        return $this->query($answerVotes, false);
    }

    public function updateVote($id, $v)
    {
        $update = "UPDATE answers SET votes = '" . $v . "' WHERE id = '" . $id . "'";
        return $this->prepare($update, []);
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