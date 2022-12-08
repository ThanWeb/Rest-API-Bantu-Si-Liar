<?php
    class Reports {
        private $connect, $table = "tb_report";
        public $animal, $status, $location, $city, $color, $characteristic, $reporter, $phone, $picture, $date;

        public function __construct ($database) {
            $this->connect = $database;
        }

        public function createReport () {
            $query = "INSERT INTO " . $this->table . " SET animal = :animal, status = :status, province = :province, city = :city, location = :location, color = :color, characteristic = :characteristic, reporter = :reporter, phone = :phone, picture = :picture, date = :date";
            $result = $this->connect->prepare($query);

            $this->animal = htmlspecialchars(strip_tags($this->animal));
            $this->status = htmlspecialchars(strip_tags($this->status));
            $this->province = htmlspecialchars(strip_tags($this->province));
            $this->city = htmlspecialchars(strip_tags($this->city));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->color = htmlspecialchars(strip_tags($this->color));
            $this->characteristic = htmlspecialchars(strip_tags($this->characteristic));
            $this->reporter = htmlspecialchars(strip_tags($this->reporter));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->picture = htmlspecialchars(strip_tags($this->picture));
            $this->date = htmlspecialchars(strip_tags($this->date));

            $result->bindParam(":animal", $this->animal);
            $result->bindParam(":status", $this->status);
            $result->bindParam(":province", $this->province);
            $result->bindParam(":city", $this->city);
            $result->bindParam(":location", $this->location);
            $result->bindParam(":color", $this->color);
            $result->bindParam(":characteristic", $this->characteristic);
            $result->bindParam(":reporter", $this->reporter);
            $result->bindParam(":phone", $this->phone);
            $result->bindParam(":picture", $this->picture);
            $result->bindParam(":date", $this->date);

            $result->execute();
        }
    }
?>