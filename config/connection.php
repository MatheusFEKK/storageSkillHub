<?php

    Class database{
        private $host     = "localhost:3307";
        private $database = "storageSkillHub";
        private $user     = "root";
        private $password = "10012019";

        public $conn;

        public function connect()
        {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=$this->host; dbname=$this->database;", $this->user, $this->password);
            }catch(PDOException $error)
            {
                echo $error -> getMessage();
            }
            return $this->conn;
        }
    }