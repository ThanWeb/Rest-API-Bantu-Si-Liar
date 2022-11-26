<?php
    class Accounts {
        private $connect, $table = "tb_account";
        public $id, $username, $email, $password;

        public function __construct ($database) {
            $this->connect = $database;
        }
    }
?>