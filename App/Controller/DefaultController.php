<?php

namespace App\Controller;
use App\Model\DefaultModel;

class DefaultController {

    public function __construct()
    {
        $this->model = new DefaultModel();
    }

    //fonction qui récupère les sondages, passe en "fini" ceux qui le sont, et render la homepage
    public function homeIndex() 
    {   

        $surveys = $this->model->getSurveys();

        $date = new \DateTime();

        $dateNow = $date->format('Y-m-d H:i:s');

        //boucle qui vérifie pour chaque sondages récupéré si sa date de fin est passée, et set en fini celles qui le sont
        foreach($surveys as $su) {
            if($su['end'] < $dateNow) {
                $this->model->setStatus($su['survey_id']);
            }
        }

        $surveys = $this->model->getSurveys();


        require ROOT."/App/View/homeIndex.php";
    }

}