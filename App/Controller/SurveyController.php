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
        require ROOT."/App/View/surveyCreationView.php";
    }

    public function createSurvey()
    {

        $newSurvey = [
            "pollTitle" => $_POST['pollTitle'],
            "endDate" => $_POST['time'],
            "id" => $_SESSION['ID']
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
            echo json_encode($get);
        }

        require ROOT."/App/View/oneSurveyView.php";
    }

    public function postMessages()
    {

        if(isset($_POST['content'])) {

            $newMsg = [
                "author" => $_SESSION['Username'],
                "content" => $_POST['content']
            ];

            $post = $this->model->postMess($newMsg);

            echo json_encode($newMsg);
        }
        
        require ROOT."/App/View/oneSurveyView.php";
    }

    public function renderSurvey()
    {
        $SurId = $_GET['id'];

        $survey = $this->model->getSurvey();

        $reps = $this->model->getAnswers($SurId);

        require ROOT."/App/View/SurveyVisitView.php";

    }

    public function vote()
    {
        $SurId = $_POST['vote'];

        $choice = $_POST['rep'];

        $poo = $this->model->getGood($choice);

        $poov = intval($poo['votes']);

        $poov++;

        $this->model->updateVote($choice, $poov);

    }
}