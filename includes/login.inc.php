<?php

    $phonenumber = $_POST['phone'] ?? "";
    $password = $_POST['password'] ?? "";

    require_once "Database.php";
    require_once "User.php";

    $db = new Database();

    $user = new User($db->get_conn());

    $user->setPhone($phonenumber);

    $data = $user->findByPhone();

    if($data === false) {
        echo json_encode(['status' => false, "msg" => "Invalid credentials"]);
    } else {
        if(password_verify($password, $data->password)) {
            session_start();
            $_SESSION['userId'] = $data->id;
            echo json_encode(['status' => true, "msg" => "Log in successful"]);
        } else {
            echo json_encode(['status' => false, "msg" => "Invalid credentials."]);
        }
    }