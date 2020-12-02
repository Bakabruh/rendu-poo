<?php

namespace App\Model;
use Core\Database;

class DefaultModel extends Database
{

    public function getSurveys()
    {
        $getSurveys = "SELECT * FROM surveys INNER JOIN users ON users.user_id = surveys.creatorsId ";

        return $this->query($getSurveys, true);
    }


}