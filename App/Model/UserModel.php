<?php
namespace App\Model;

use Core\Database;

class UserModel extends Database{
    

    public function getFriends($id)
    {
        $getFriends = 
        "SELECT users.user_id, users.user_name, users.status  FROM users 
        INNER JOIN bonds ON user_id1 = '" . $id . "'
        WHERE users.user_id = bonds.user_id2";

        return $this->query($getFriends, true);

        
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
        $userRequest = "INSERT INTO users (user_name, user_pass, user_email, status) VALUES (:name, :pass, :mail, false)";
                
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

}