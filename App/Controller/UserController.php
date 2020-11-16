<?php

namespace App\Controller;

use App\Model\UserModel;
use Core\Database;


class UserController {

    public function userIndex() 
    {
        
        $db = new Database;

        $id = $_SESSION['ID'];
            
        $getFriends = 
        "SELECT users.user_name, users.status, users.user_id FROM users 
        INNER JOIN bonds ON user_id1 = '" . $id . "'
        WHERE users.user_id = bonds.user_id2";

        $friends = $db->query($getFriends, true);


        require ROOT."/App/View/userIndexView.php";
    }

    

    public function createUser() 
    {

        if($_POST && $_POST['action'] == "create") {


            if($_POST['pass'] != $_POST['pass2']) {

                echo "<script>alert('Écrivez deux fois le même mot de passe')</script>";

            } else {

                $newUser = [
                    "mail" => $_POST['mail'],
                    "name" => $_POST['name'],
                    "pass" => password_hash($_POST['pass'], PASSWORD_BCRYPT),
                ];
    
                $db = new Database();
    
                $accVerif = "SELECT * FROM users WHERE user_email ='" . $_POST['mail'] . "' OR user_name = '" . $_POST['name'] . "'";
    
                if($db->query($accVerif, false)) {
    
                    echo "<script>alert('Nom ou email déjà prit')</script>";
    
                } else {
                    $userRequest = "INSERT INTO users (user_name, user_pass, user_email, status) VALUES (:name, :pass, :mail, false)";
                
                    $db->prepare($userRequest, $newUser);
    
                    $tempoName = $newUser['name'];
    
                    $idRequest = "SELECT user_id FROM users WHERE user_name = '" . $tempoName ."'";
    
                    $getId = $db->query($idRequest, false);
    
                    $_SESSION['Connected'] = true;
                    $_SESSION['Username'] = $_POST['name'];
                    $_SESSION['Usermail'] = $_POST['mail'];
                    $_SESSION['ID'] = $getId;
    
                    header("Location: index.php?page=home");
                }
            }
            
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
                $_SESSION['ID'] = $exist['user_id'];
                
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
            header("Location: index.php?page=create-user");
            require ROOT."/App/View/userCreateView.php";
		}
		
    }


}