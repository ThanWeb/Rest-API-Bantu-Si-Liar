<?php
    class Accounts {
        private $connect, $table = "tb_account";
        public $id, $username, $email, $password, $name, $province, $city, $address, $phone, $picture;

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
            $query = "INSERT INTO " . $this->table . " SET username = :username, email = :email, password = :password,  name = :name, province = :province, city = :city, address = :address, phone = :phone, picture = :picture";
            $result = $this->connect->prepare($query);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->province = htmlspecialchars(strip_tags($this->province));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->picture = htmlspecialchars(strip_tags($this->picture));

            $result->bindParam(":username", $this->username);
            $result->bindParam(":email", $this->email);
            $result->bindParam(":password", $this->password);
            $result->bindParam(":name", $this->name);
            $result->bindParam(":province", $this->province);
            $result->bindParam(":city", $this->city);
            $result->bindParam(":address", $this->address);
            $result->bindParam(":phone", $this->phone);
            $result->bindParam(":picture", $this->picture);

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

        public function findAccount () {
            $query = ("SELECT * FROM " . $this->table . " WHERE username = :identifier OR email = :identifier");
            $result = $this->connect->prepare($query);

            $this->identifier = htmlspecialchars(strip_tags($this->identifier));
            $result->bindParam(":identifier", $this->identifier);

            $result->execute();
            if($result->rowCount() > 0) {
                return $result;
            } else {
                return null;
            }
        }

        public function getAccount() {
            $queryResult = $this->findAccount();
            $this->password = htmlspecialchars(strip_tags($this->password));

            if($queryResult == null) {
                return array(
                    'error' => true,
                    'message' => 'Email or Username not found'
                );
            } else {
                $accounts = array();
                while($account = $queryResult->fetch(PDO::FETCH_ASSOC)){
                    extract($account);
                    if($this->password == $password) {
                        return array(
                            'error' => false,
                            'message' => 'Login success',
                            'id' => $id
                        );
                    } else {
                        return array(
                            'error' => true,
                            'message' => 'Wrong password'
                        );
                    }
                }
                return $accounts;
            }
        }

        public function getAccountWithId() {
            $query = ("SELECT * FROM " . $this->table . " WHERE id = :id");
            $result = $this->connect->prepare($query);

            $result->bindParam(":id", $this->id);
            $result->execute();

            if($result->rowCount() == 0) {
                return false;
            } else {
                return true;
            }
        }

        public function getProfile() {
            if($this->id == null) {
                return array(
                    'error' => true,
                    'message' => 'Invalid ID'
                );
            }

            if($this->getAccountWithId()) {
                $query = ("SELECT name, province, city, address, phone, picture FROM " . $this->table . " WHERE id = :id");
                $result = $this->connect->prepare($query);

                $result->bindParam(":id", $this->id);
                $result->execute();
                $resultArray = $result->fetch(PDO::FETCH_ASSOC);
                
                return array(
                    'error' => false,
                    'message' => 'Load profile success',
                    'data' => $resultArray
                );
            } else {
                return array(
                    'error' => true,
                    'message' => 'Account not found'
                );
            }
        }
    }
?>