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
}