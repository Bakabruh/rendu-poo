<?php

namespace App\Controller;

use App\Model\UserModel;
use Core\Database;


class UserController {

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function userIndex()
    {
         
        $friends = $this->model->getFriends($_SESSION['ID']);

        if(isset($_POST['search'])) {

            $quest = $this->model->searchFriends($_POST['search']);


            // ESSAYER D'ENLEVER LES AMIS ACTUELS DE LA LISTE DE RECHERCHE

            // $count = 0;

            // foreach($quest as list($a)) {

            //     var_dump($a);
            //     foreach($friends as list($aa)) {
            //         if($a == $aa) {
            //             unset($quest[$count]);
            //         }
            //     }
            //     $count++;
            // }

            
            

        }


        require ROOT."/App/View/userIndexView.php";
    }

    

    public function visitUser()
    {
        $viName = $_GET['name'];

        if($viName != "") {
            
        
            $host = $this->model->searchFriends($viName);

            require ROOT."/App/View/userVisitView.php";
        } else {
            require ROOT."/App/View/errorView.php";
        }

        
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
    
                $ver = $this->model->verifCreate();

                var_dump($ver);
    
                if($ver != []) {
    
                    echo "<script>alert('Nom ou email déjà prit')</script>";
    
                } else {
                
                    $this->model->createUser($newUser);

        
                    $getId = $this->model->getId($newUser['name']);
    
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

            $exist = $this->model->connect($_POST['connect-mail']);

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