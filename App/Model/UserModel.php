<?php
namespace App\Model;

use Core\Database;

class userModel extends Database{


    public function getUsers()
    {
        $query = $this->pdo->query("SELECT * FROM users");
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
}