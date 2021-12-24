<?php
    class Database {
        private $dbname = "online_expenses_work";
        private $servername = "localhost";
        private $username = "root";
        private $password = "";


        function __construct() {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname}";
            try {

                return new PDO($dsn, $this->username, $this->password);
            } catch(PDOException $e) {
                return false;
            }
        }
    }