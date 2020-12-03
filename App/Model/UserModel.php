<?php
namespace App\Model;

use Core\Database;

class UserModel extends Database{
    

    public function getFriends($id)
    {
        $getFriends = 
        "SELECT users.user_id, users.user_name, users.user_status  
        FROM users 
        INNER JOIN bonds ON user_id1 = '" . $id . "' OR user_id2 = '" . $id . "'
        WHERE bonds.user_id2 = users.user_id OR bonds.user_id1 = users.user_id";

        return $this->query($getFriends, true);
    }

    public function getReqs($id)
    {
        $getReqs = 
        "SELECT *
        FROM requests 
        INNER JOIN users ON user_2_id = '" . $id . "' 
        WHERE user_1_id = users.user_id";
        return $this->query($getReqs, true);
    }

    public function searchFriends($ns) 
    {
        $searchRequest = "SELECT * FROM users WHERE user_name LIKE '%" . $ns . "%'";
        return $this->query($searchRequest, true);
    }

    public function visitName($viName)
    {
        $visitRequest = "SELECT * FROM users WHERE user_name = '" . $viName . "'";
        return $this->query($visitRequest, false);
    }

    public function verifCreate()
    {
        $accVerif = "SELECT * FROM users WHERE user_email ='" . $_POST['mail'] . "' OR user_name = '" . $_POST['name'] . "'";
        return $this->query($accVerif, false);
    }

    public function createUser(array $nu)
    {
        $userRequest = "INSERT INTO users (user_name, user_pass, user_email, user_status) VALUES (:name, :pass, :mail, 1)";      
        return $this->prepare($userRequest, $nu);
        
    }

    public function getId($tmp)
    {
        $idRequest = "SELECT user_id FROM users WHERE user_name = '" . $tmp ."'";
        return $this->query($idRequest, false);
    }

    public function connect($coMail)
    {
        $loginRequest = "SELECT * FROM users WHERE user_email = '" . $coMail . "'";
        return $this->query($loginRequest, false);
    }

    public function veriFriend(array $fR)
    {
        $veri = "SELECT * FROM requests WHERE user_1_id = '" . $fR['id1'] ."' AND user_2_id = '" . $fR['id2'] ."' OR user_2_id = '" . $fR['id1'] ."' AND user_1_id = '" . $fR['id2']."'";
        return $this->query($veri, false);
    }

    public function addFriend(array $fR)
    {
        $friendRequest = "INSERT INTO requests (user_1_id, user_2_id, state) VALUES (:id1, :id2, 0)";
        return $this->prepare($friendRequest, $fR);
    }

    public function dropReq($id3)
    {
        $drop = "DELETE FROM requests WHERE request_id = '" . $id3 . "'";

        return $this->prepare($drop, []);
    }

    public function treatReq(bool $choice, $id1, $id2, $id3)
    {
        if ($choice == true) {
            $tr = "INSERT INTO bonds (user_id1, user_id2) VALUES ('" . $id1 . "', '" . $id2 . "')";

            $this->dropReq($id3);

            return $this->prepare($tr, [$id1, $id2]);
        } else {
            $this->dropReq($id3);
        }
    }

    public function delFriend($idF, $idU)
    {
        $del = "DELETE FROM bonds WHERE user_id1 = '" . $idF ."' AND user_id2 = '" . $idU ."' OR user_id2 = '" . $idF ."' AND user_id1 = '" . $idU ."'";
        return $this->prepare($del, []);
    }

    public function getName($name)
    {
        $passRequest = "SELECT * FROM users WHERE user_name = '" . $name . "'";
        return $this->query($passRequest, false);
    }

    public function verifChange($new)
    {
        $Verif = "SELECT * FROM users WHERE user_name ='" . $new . "'";
        return $this->query($Verif, false);
    }

    public function newName($name)
    {
        $change = "UPDATE users SET user_name = '" . $name . "' WHERE user_id ='" . $_SESSION['ID'] . "'";
        return $this->prepare($change, []);
    }

    public function newColor($col)
    {
        $change = "UPDATE users SET user_theme = '" . $col . "' WHERE user_id ='" . $_SESSION['ID'] . "'";
        return $this->prepare($change, []);
    }

    public function getUserSurveys($id)
    {
        $surv = "SELECT * FROM surveys WHERE creatorsId = '" . $id . "'";
        return $this->query($surv, true);
    }

}