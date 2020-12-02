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

        $id = $_SESSION['ID'];

        $surveys = $this->model->getUserSurveys($id);
         
        $friends = $this->model->getFriends($id);


        foreach ($friends as $fr) {

            if ($fr['user_id'] == $_SESSION['ID']) {

                $test = array_search($fr, $friends);
                array_splice($friends, $test, 1);
                
            }

        }
        

        $fReqs = $this->model->getReqs($id);

        if(isset($_POST['search'])) {

            $quest = $this->model->searchFriends($_POST['search']);
            
            //ENLEVER LES AMIS ACTUELS DE LA LISTE DE RECHERCHE
            foreach ($quest as $a) {

                foreach($friends as $aa) {
                    if($a['user_id'] == $aa['user_id']) {
                        $hide= array_search($a, $quest);
                        array_splice($quest, $hide, 1);
                    }
                }
            }
        }
        require ROOT."/App/View/userIndexView.php";
    }

    

    public function visitUser()
    {
        $viName = $_GET['name'];
        if($viName != "") {


            $host = $this->model->searchFriends($viName);

            $id = $host[0]["user_id"];

            $surveys = $this->model->getUserSurveys($id);

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

    
                if($ver != []) {
    
                    echo "<script>alert('Nom ou email déjà prit')</script>";
    
                } else {
                
                    $test = $this->model->createUser($newUser);
        
                    $getId = $this->model->getId($newUser['name']);

                    $_SESSION['Connected'] = true;
                    $_SESSION['Username'] = $_POST['name'];
                    $_SESSION['Usermail'] = $_POST['mail'];
                    $_SESSION['theme'] = "white";
                    $_SESSION['ID'] = $getId['user_id'];

                    
                    require ROOT."/App/View/homeIndex.php";
                    
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
                $_SESSION['theme'] = $exist['user_theme'];
                
                header("Location: index.php?page=home");
            } else {
                echo "<script>alert('Wrong password')</script>";
            }
        
        
        }
    }

    public function disconnect() 
    {

        session_destroy();
		
    }

    public function sendRequest()
    {

        $fR = [
            "id1" => $_SESSION['ID'],
            "id2" => $_POST['rq_user_id']
        ];

        $verif = $this->model->veriFriend($fR);
        if ($verif == false) {
            $this->model->addFriend($fR);
        }

        

        


        header("Location: index.php?page=user");
        // echo "<script>alert('Demande d'amis envoyée à " . $_POST['rq_user_name'] . "')</script>";

    }

    public function treatRequest()
    {
        $id1 = $_POST['id1'];
        $id2 = $_SESSION['ID'];
        $id3 = $_POST['accept'];

        if (isset($_POST['accept'])) {

            $id3 = $_POST['accept'];
            $choice = true;
            $this->model->treatReq($choice, $id1, $id2, $id3);

            header("Location: index.php?page=user");

            

        } else if (isset($_POST['decline'])) {

            $id3 = $_POST['decline']; 
            $choice = false;
            $this->model->treatReq($choice, $id1, $id2, $id3);

            header("Location: index.php?page=user");

        } else {
            header("Location: index.php?page=user");
            echo "<script>alert('Il y a eu un problème, réessayez')</script>";
        }
    }

    public function deleteFriend()
    {
        $id1 = $_POST['delete'];
        $id2 = $_SESSION['ID'];

        $this->model->delFriend($id1, $id2);
    }


    public function newName()
    {
        $newname = $_POST['newname'];
        $verif = $_POST['newnamepass'];

        $ver = $this->model->verifChange($newname);

        if($ver != []) {
            echo "<script>alert('Nom déjà prit')</script>";
        } else {
            $getPass = $this->model->getName($_SESSION['Username']);

            if (password_verify($verif, $getPass['user_pass'])) {
                
                $this->model->newName($newname);

                $_SESSION['Username'] = $newname;
            } else {
                echo "<script>alert('Mauvais mot de passe')</script>";
            }
        }

    }

    public function newColor()
    {
        $color = $_POST['color'];

        $this->model->newColor($color);

        $_SESSION['theme'] = $color;
    }

    public function renderCreate()
    {
        require ROOT."/App/View/userCreateView.php";
    }


}