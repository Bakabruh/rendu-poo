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

        $date = new \DateTime();
        $date->modify('+ ' . $_POST['hour'] . 'hours');
        $date->modify('+ ' . $_POST['minute'] . 'minutes');

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

    public function getMessages()
    {
        $id = $_GET['id'];

        $get = $this->model->getMess($id);
        
        echo json_encode($get);

    }

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

    public function renderSurvey()
    {
        $SurId = $_GET['id'];

        $survey = $this->model->getSurvey($SurId);

        $reps = $this->model->getAnswers($SurId);

        

        require ROOT."/App/View/SurveyVisitView.php";  
    }

    public function getVotes()
    {
        $SurId = $_GET['id'];

        $reps = $this->model->getAnswers($SurId);

        echo json_encode($reps);
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