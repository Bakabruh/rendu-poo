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
            $title = $_POST['poll-title'];
            $questionsNumber = $_POST['questionsNumber'];
            $question1 = $_POST['question1'];
            $question2 = $_POST['question2'];
            $question3 = $_POST['question3'];
            $question4 = $_POST['question4'];
        }

        require ROOT."/App/View/surveyCreationView.php";
    }

    public function renderIndex()
    {
        require ROOT."/App/View/surveyIndexView.php";
    }

}