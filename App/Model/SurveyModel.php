<?php

namespace App\Model;
use Core\Database;

class SurveyModel extends Database
{

    // fonctions pour créer un sondage et les envoyer en bdd
    public function createSurvey(array $cs)
    {
        $surveyCreation = "INSERT INTO surveys(question, end, creatorsId) VALUES(:pollTitle, :dateEnd, :id)";

        var_dump($surveyCreation);
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

    public function getSurvey($id)
    {
        $getEm = "SELECT * FROM surveys INNER JOIN users on surveys.creatorsId = users.user_id WHERE survey_id = '" . $id . "'";
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

    public function getMess($id)
    {
        $msg = "SELECT * FROM comments WHERE conv_id = '" . $id .  "'";

        return $this->query($msg, true);
    }

    public function postMess($newmsg)
    {
        $postMsg = "INSERT INTO comments(author, content, conv_id) VALUES(:author, :content, :conv)";

        return $this->prepare($postMsg, $newmsg);
    }
}