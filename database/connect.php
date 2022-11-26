<?php 
    class Database {
        private $host = "localhost", $database = "db_bantu_si_liar", $username = "root", $password = "";
        public $connect;

        public function connectDatabase () {
            try {
                $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
                $this->connect->exec("set names utf8");
            } catch (PDOException $exception) {
                echo "Error: ".$exception->getMessage();
            }
            return $this->connect;
        }
    }  
?>