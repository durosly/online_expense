<?php

class Budget {
    public $id;
    public $title;
    public $type;
    public $amount;
    public $userId;
    public $date;
    public $month;
    public $year;
    private $table = "budget";
    private $conn;

    function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    function insertBudget(string $title, int $amount, string $type, int $date, int $month, int $year, int $userId) {
        $sql = "INSERT INTO {$this->table} (title, amount, type, date, month, year, userId) VALUES (:title, :amount, :type, :date, :month, :year, :userId);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":amount", $amount);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":month", $month);
        $stmt->bindParam(":year", $year);
        $stmt->bindParam(":userId", $userId);

        $stmt->execute();
    }

    function getMonths() {
        $sql = "SELECT DISTINCT month FROM {$this->table} WHERE userId = :userId ORDER BY month ASC LIMIT 12;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":userId", $this->id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    function getYears() {
        $sql = "SELECT DISTINCT year FROM {$this->table} WHERE userId = :userId ORDER BY year ASC;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":userId", $this->id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    function getBudgetsByDate() {
        $sql = "SELECT * FROM {$this->table} WHERE userId = :userId AND year = :year AND month = :month ORDER BY date ASC;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":userId", $this->id);
        $stmt->bindParam(":year", $this->year);
        $stmt->bindParam(":month", $this->month);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
}