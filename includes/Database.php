<?php
    class Database {
        private $dbname = "online_expenses_upwork";
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $conn = null;


        function __construct() {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
        }

        function get_conn() {
            return $this->conn;
        }

    }