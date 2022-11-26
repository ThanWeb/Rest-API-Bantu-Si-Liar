<?php
    class Accounts {
        private $connect, $table = "tb_account";
        public $id, $username, $email, $password;

        public function __construct ($database) {
            $this->connect = $database;
        }
       
        public function checkDuplicateAccount () {
            $query = ("SELECT * FROM " . $this->table . " WHERE username = :username OR email = :email");
            $result = $this->connect->prepare($query);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));

            $result->bindParam(":username", $this->username);
            $result->bindParam(":email", $this->email);

            $result->execute();
            return $result->rowCount();
        }

        public function createAccount () {
            $query = "INSERT INTO " . $this->table . " SET username = :username, email = :email, password = :password";
            $result = $this->connect->prepare($query);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = htmlspecialchars(strip_tags($this->password));

            $result->bindParam(":username", $this->username);
            $result->bindParam(":email", $this->email);
            $result->bindParam(":password", $this->password);

            if($this->checkDuplicateAccount() > 0) {
                return array(
                    'error' => true,
                    'message' => 'Email or Username already registered'
                );
            }

            if($result->execute()) {
                return array(
                    'error' => false,
                    'message' => 'Registration success'
                );
            };
            
            return array(
                'error' => true,
                'message' => 'Unknown error'
            );
        }
    }
?>