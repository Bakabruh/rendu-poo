<?php

namespace App\Controller;
use App\Model\DefaultModel;

class DefaultController {

    public function __construct()
    {
        $this->model = new DefaultModel();
    }

    public function homeIndex() 
    {   

        $surveys = $this->model->getSurveys();


        require ROOT."/App/View/homeIndex.php";
    }

}