<?php

namespace App\Model;
use Core\Database;

class DefaultModel extends Database
{

    public function getSurveys()
    {
        $getSurveys = "SELECT * FROM surveys INNER JOIN users ON creatorsId = user_id";

        return $this->query($getSurveys, true);
    }


}