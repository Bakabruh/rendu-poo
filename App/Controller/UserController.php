<?php

namespace App\Controller;

use App\Model\userModel;


class UserController {


    public function __construct()
    {
        $this->model = new userModel();
    }

    public function renderIndex() 
    {
        $users = $this->model->getUsers();
        require ROOT."/App/View/userIndexView.php";
    }

}