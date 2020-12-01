<?php

namespace Core;

class Database{

    // Set up database

    protected $pdo;
    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function __construct()
    {
        try {
            require "Config/config.php";
            $this->host = $dbConfig["host"];
            $this->dbname = $dbConfig["dbname"];
            $this->user = $dbConfig["user"];
            $this->pass = $dbConfig["pass"];
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    // Set up query request function

    public function query(string $statement, bool $one)
    {
        $query = $this->pdo->query($statement);
        if ($one === false) {
            return $query->fetch(\PDO::FETCH_ASSOC);
        } else {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    // Set up prepare request function

    public function prepare(string $statement, array $data = array())
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);
    }
}
