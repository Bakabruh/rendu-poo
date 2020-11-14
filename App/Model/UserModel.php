<?php
namespace App\Model;

use Core\Database;

<<<<<<< HEAD
class userModel extends Database{

=======
class UserModel extends Database{
    
    private $mail;

    private $name;

    private $pass;

    private $status;

    public function __construct($mail, $name, $pass, $status)
    {
        $this->mail = $mail;
        $this->name = $name;
        $this->pass = $pass;
        $this->status = $status;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
>>>>>>> 52fee9cfb845b8f2dbdc62508defde00302f0784

    public function getUsers()
    {
        $query = $this->pdo->query("SELECT * FROM users");
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function createArray()
    {
        return [$this->mail, $this->name, $this->pass, $this->status];
    }

}