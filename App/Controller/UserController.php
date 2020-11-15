<?php

namespace App\Controller;

use App\Model\UserModel;
use Core\Database;


class UserController {

    public function userIndex() 
    {
        require ROOT."/App/View/userIndexView.php";
    }

    public function createUser() 
    {

        if($_POST) {
            
            $newUser = [
                "mail" => $_POST['mail'],
                "name" => $_POST['name'],
                "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
            ];

            $db = new Database();

            $userRequest = "INSERT INTO users (user_name, user_pass, user_email, status) VALUES (:name, :pass, :mail, false)";
            
            $db->prepare($userRequest, $newUser);

            require ROOT."/App/View/userCreateView.php";

        }

        require ROOT."/App/View/userCreateView.php";
    }


}