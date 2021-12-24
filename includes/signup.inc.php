<?php
    
    if(!isset($_POST['first']) || trim($_POST['first']) === "") {
        echo json_encode(["status" => false, "msg" => "Firstname cannot be empty"]);
    } else if(!preg_match("/^[a-zA-Z]+$/", $_POST['first'])) {
        echo json_encode(["status" => false, "msg" => "Firstname must be only letters"]);
    } else if(!isset($_POST['last']) || trim($_POST['last']) === "") {
        echo json_encode(["status" => false, "msg" => "Lastname cannot be empty"]);
    } else if(!preg_match("/^[a-zA-Z]+$/", $_POST['last'])) {
        echo json_encode(["status" => false, "msg" => "Lastname must be only letters"]);
    } else if(!isset($_POST['phone']) || trim($_POST['phone']) === "") {
        echo json_encode(["status" => false, "msg" => "Phonenumber cannot be empty"]);
    } else if(preg_match("/\s/", $_POST['password'])) {
        echo json_encode(["status" => false, "msg" => "Phonenumber cannot contain whitespace"]);
    } else if(!isset($_POST['password']) || trim($_POST['password']) === "") {
        echo json_encode(["status" => false, "msg" => "Password cannot be empty"]);
    } else {
        require_once "Database.php";
        require_once "User.php";
        $db = new Database();
        $user = new User($db->get_conn());

        $user->setUpNewUser($_POST['first'], $_POST['last'], $_POST['phone'], $_POST['password']);

        $userExist = $user->checkUserExist();

        if($userExist === true) {
            echo json_encode(['status' => false, "msg" => "Phonenumber has been used by another user."]);
        } else {
            $status = $user->createNewUser();
    
            if($status === true) {
                echo json_encode(['status' => true, "msg" => "Signup Successful. Log in now"]);
            } else {
                echo json_encode(['status' => false, "msg" => "Signup failed"]);
            }
        }
    }