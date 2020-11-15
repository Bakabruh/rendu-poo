<?php

namespace App\Controller;
use App\Model\SurveyModel;

class surveyController
{
    public function __construct() {
        $this->model = new Survey();
    }

    public function renderIndex()
    {
        $survey = $this->model->query("SELECT * FROM polls");
        require ROOT."/surveyIndexView.php";
    }
}