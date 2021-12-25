<?php
    require_once "Database.php";
    class User {
        public $id;
        public $first;
        public $last;
        public $phonenumber;
        public $password;
        private $table = "users";
        private $conn = null;

        function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }

        function setPhone(string $phone) {
            $this->phonenumber = $phone;
        }

        function findByPhone() {
            $sql = "SELECT id, password FROM {$this->table} WHERE phonenumber = :phonenumber LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":phonenumber", $this->phonenumber);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        }

        function setUpNewUser(string $first, string $last, string $phonenumber, string $password) {
            $this->first = $first;
            $this->last = $last;
            $this->phonenumber = $phonenumber;
            $this->password = $password;
        }

        function checkUserExist() {
            $sql = "SELECT COUNT(*) AS userCount FROM {$this->table} WHERE phonenumber = :phonenumber;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":phonenumber", $this->phonenumber);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        function createNewUser() {
            $sql = "INSERT INTO {$this->table} (firstname, lastname, phonenumber, password) VALUES (:first, :last, :phonenumber, :password);";
            $stmt = $this->conn->prepare($sql);
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt->bindParam(":first", $this->first);
            $stmt->bindParam(":last", $this->last);
            $stmt->bindParam(":phonenumber", $this->phonenumber);
            $stmt->bindParam(":password", $hash);

            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        function getFirstname() {
            $sql = "SELECT firstname FROM {$this->table} WHERE id = :userId LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":userId", $this->id);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                return $row->firstname;
            } else {
                return false;
            }
        }
    }