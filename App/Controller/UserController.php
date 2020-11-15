<?php

namespace App\Controller;

use App\Model\UserModel;
use Core\Database;


class UserController {

    // public function __construct()
    // {
    //     $this->model = new UserModel();
    // }

    public function userIndex() 
    {
        require ROOT."/App/View/userIndexView.php";
    }

    public function createUser() 
    {
        // $users = $this->model->getUsers();

        if($_POST) {
            
            $newUser = [
                "mail" => $_POST['mail'],
                "name" => $_POST['name'],
                "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
            ];

            $db = new Database();

            // $User = new UserModel($_POST['mail'], $_POST['name'], $newUser['pass'], false);

            $userRequest = "INSERT INTO users (user_name, user_pass, user_email, status) VALUES (:name, :pass, :mail, false)";

            var_dump($userRequest);
            // die();
            
            $db->prepare($userRequest, $newUser);

            require ROOT."/App/View/userIndexView.php";

        }

        require ROOT."/App/View/userCreateView.php";
    }


}