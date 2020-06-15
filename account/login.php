<?php

    class Person {
        public $isMember = false;
        public $id = 0;
    }
    $user = json_decode($_POST['user']);
    $obj = new Person();
    $obj->id = checkUser($user);

    if  ($obj->id > 0) {
        //is valid user
        $obj->isMember = true;
    }
    echo json_encode($obj);

    function checkUser($user) {
        //check in databse and return user id
        
        //connect to database
        require("dbVars.php");
        
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Error ". $conn->connect_error);
    }
        $email = mysqli_real_escape_string($conn, stripcslashes($user->email));
        $password = mysqli_real_escape_string($conn, stripcslashes(md5($user->password)));

        $sql = "SELECT id,firstname,lastname,password FROM User WHERE email='$email';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if ($data['password'] == $password) { 
                session_start();
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['firstname'] = $data['firstname'];
                $_SESSION['lastname'] = $data['lastname'];
                return $data['id'];
            }
        }
        return -1;
    }
?>