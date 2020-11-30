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

    public function renderCreation()
    {
        if(isset($_POST['poll-title']) && isset($_POST['questionsNumber'])) {
            $newSurvey = [
                "pollTitle" => $_POST['poll-title'],
                "questionsNumber" => $_POST['questionsNumber'],
                "reponse1" => $_POST['response1'],
                "response2" => $_POST['response2'],
                "response3" => $_POST['response3'],
                "response4" => $_POST['response4']
            ];


            $cr = $this->model->createSurvey($newSurvey);
        }

        require ROOT."/App/View/surveyCreationView.php";
    }

    public function renderIndex()
    {

        $gs = $this->model->getSurveys();

        require ROOT."/App/View/homeIndex.php";
    }

    public function getMessages()
    {

        if(isset($_POST['content'])) {
            $contenu = $_POST['content'];

            $get = $this->model->getMess($contenu);
        }

        echo \json_encode($get);

        require ROOT."/App/View/oneSurveyView.php";
    }

    public function postMessages()
    {

        $newMsg = [
            "author" => $_POST['author'],
            "content" => $_POST['content']
        ];

        $post = $this->model->postMess($newMsg);

        echo \json_encode($newMsg);

        require ROOT."/App/View/oneSurveyView.php";
    }
}