<?php

namespace App\Controller;
use App\Model\SurveyModel;
use Core\Database;

class surveyController
{
    
    public function __construct()
    {
        $this->model = new SurveyModel();
    }

    // fonction pour créer un sondage à partir du form de surveyCreationView.php
    public function createSurvey()
    {

        //récupération de la date actuelle et modification en fonction de la durée séléctionnée
        $date = new \DateTime();
        $date->modify('+ ' . $_POST['hour'] . 'hours');
        $date->modify('+ ' . $_POST['minutes'] . 'minutes');

        $dateEnd = $date->format('Y-m-d H:i:s');

        $newSurvey = [
            "pollTitle" => $_POST['pollTitle'],
            "id"        => $_SESSION['ID'],
            "dateEnd"   => $dateEnd,
        ];

        $answers = [
            "response1" => $_POST['response1'],
            "response2" => $_POST['response2'],
            "response3" => $_POST['response3'],
            "response4" => $_POST['response4']
        ];

        $this->model->createSurvey($newSurvey);

        $id = $this->model->getSurveyId();

        $test = end($id);

        $sId = $test['survey_id'];

        // boucle pour associer l'id du sondage à chaque réponse possible
        foreach($answers as $an) {
            
            if($an != "") {
                $data = [
                    "reponse" => $an,
                    "id" => $sId
                ];

                $this->model->createSurvey2($data); 
            } else {
               
            }
            
        }

        header("Location: index.php?page=home");
    }


    
    // fonction pour render la page du sondage en récupérant ses infos en bdd
    public function renderSurvey()
    {
        $SurId = $_GET['id'];

        $survey = $this->model->getSurvey($SurId);

        $reps = $this->model->getAnswers($SurId);

        require ROOT."/App/View/SurveyVisitView.php";  
    }

    //fonction pour voter
    public function vote()
    {
        $SurId = $_POST['vote'];

        $choice = $_POST['rep'];

        $poo = $this->model->getGood($choice);

        $poov = intval($poo['votes']);

        $poov++;

        $this->model->updateVote($choice, $poov);

    }

    //fonction pour récupérer les votes et les envoyer en AJAX
    public function getVotes()
    {
        $SurId = $_GET['id'];

        $reps = $this->model->getAnswers($SurId);

        echo json_encode($reps);
    }

    //fonction pour récupérer/update le status du sondage pour l'affichage dynamique en AJAX
    public function getStatus()
    {
        $id = $_GET['id'];

        $surveys = $this->model->getSurvey($id);

        $date = new \DateTime();

        $dateNow = $date->format('Y-m-d H:i:s');

        if($surveys['end'] < $dateNow) {
            $this->model->setStatus($surveys['survey_id']);
        }

        $stat = $this->model->getStatus($id);
        
        echo json_encode($stat);

    }

    //fonction qui récupère les commentaires à afficher sous le sondage
    public function getMessages()
    {
        $id = $_GET['id'];

        $get = $this->model->getMess($id);
        
        echo json_encode($get);

    }

    //fonction pour poster son commentaire et le récupérer en AJAX pour affichage dynamique
    public function postMessages()
    {

        $id = $_GET['id'];

        $newMsg = [
            "author" => $_SESSION['Username'],
            "content" => $_POST['comment'],
            "conv" => $_GET['id']
        ];

        $post = $this->model->postMess($newMsg);
        // echo json_encode($newMsg);

    }

}