<?php

namespace App\Controller;
use App\Model\SurveyModel;

class surveyController
{
    public function __construct() {
        $this->model = new Survey();
    }

    public function renderCreation()
    {
        $survey = $this->model->query("SELECT * FROM polls");
        require ROOT."/surveyIndexView.php";
    }
}