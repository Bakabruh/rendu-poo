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

        if($_POST && $_POST['action'] == "create") {
            
            $newUser = [
                "mail" => $_POST['mail'],
                "name" => $_POST['name'],
                "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
            ];

            $db = new Database();

            $userRequest = "INSERT INTO users (user_name, user_pass, user_email, status) VALUES (:name, :pass, :mail, false)";
            
            $db->prepare($userRequest, $newUser);

            $_SESSION['Connected'] = true;
            $_SESSION['Username'] = $_POST['name'];
            $_SESSION['Usermail'] = $_POST['mail'];

            header("Location: index.php?page=home");

        } 

        require ROOT."/App/View/userCreateView.php";
    }

    public function connectUser() 
    {
        if($_POST && $_POST['action'] == "connect") {

            
            $loginData = [
                
                "email" => $_POST['connect-mail'],

            ];

            $zizi = $_POST['connect-mail'];

            $db = new Database;
            
            $loginRequest = "SELECT * FROM users WHERE user_email = '" . $zizi . "'";

            $exist = $db->query($loginRequest, false);


            if(password_verify($_POST['connect-pass'], $exist['user_pass'])) {
                echo "Bon mdp";
                
                $_SESSION['Connected'] = true;
                $_SESSION['Username'] = $exist['user_name'];
                $_SESSION['Usermail'] = $exist['user_email'];
                
                header("Location: index.php?page=home");
            } else {
                echo "<script>alert('Wrong password')</script>";
            }
        
        
        }
    }

    public function disconnect() 
    {
        if(isset($_GET['action']) && $_GET['action'] == 'disconnect') {

            session_destroy();

            require ROOT."/App/View/userCreateView.php";
		}
		
    }


}