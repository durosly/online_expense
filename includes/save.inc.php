<?php
    header("Content-Type: application/json");

    $data = json_decode(file_get_contents("php://input"));
    
    if(isset($data) && is_object($data)) {
        if(count($data->budget) > 0) {

            require_once "Database.php";
            require_once "Budget.php";
            session_start();

            $db = new Database();
            $budgetObj = new Budget($db->get_conn());

            foreach ($data->budget as $budget) {
                $title = $budget->title;
                $type = $budget->type;
                $amount = $budget->amount;
                $day = date("d");
                $month = date("m");
                $year = date("Y");
                $userId = $_SESSION['userId'];

                $budgetObj->insertBudget($title, $amount, $type, $day, $month, $year, $userId);
            }

            echo json_encode(["status" => true, "msg" => "success"]);
        } else {
            echo json_encode(["status" => false, "msg" => "No records"]);
        }

    } else {
        echo json_encode(["status" => false, "msg" => "Something is wrong with data entry"]);
    }