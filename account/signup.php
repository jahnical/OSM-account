<?php
    if (isset($_POST['info'])) {
        $info = json_decode($_POST['info']);
        //verify email
        if (!filter_var($info->email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
          }

        //add data to temp database
        require("dbVars.php");
        
       $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo "Error";
            die("Connection Error ". $conn->connect_error);
        }
        else {
            $email = mysqli_real_escape_string($conn, stripcslashes($info->email));
            $firstname = mysqli_real_escape_string($conn, stripcslashes($info->firstName));
            $lastname = mysqli_real_escape_string($conn, stripcslashes($info->lastName));
            $veri_code = mysqli_real_escape_string($conn, stripcslashes(md5(rand(10, 10000))));
            $password = mysqli_real_escape_string($conn, stripcslashes(md5($info->password)));
           //Check if email is not in USER table
            $sql = "SELECT firstName FROM User WHERE email='$email';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "Email duplicated";
                die();
            }

            //ADD data to pending user table
            $sql = "INSERT INTO pendinguser(firstname, lastname, email, password, veri_code) VALUES ('$firstname', '$lastname', '$email', '$password', '$veri_code');";
            $qresult = $conn->query($sql);

            if ($qresult === TRUE) {
                //send verifcation email
                $link = $_SERVER['SERVER_ADDR']."/account/verify.php?";
                 $to = $info->email;
                $subject = "Malawi online shopping Email Verification";
                $message = '<h2>Verify Email</h2><p>Your account has been created 
                <br>'.$info->firstName.' '.$info->lastName.'<br>Click <a href='.$link."email=".$to."&veri_code=". $veri_code .
                '>here to verify your email </p>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: nethard@cc.ac.mw";
                mail($to, $subject, $message, $headers);
                echo "done";
            }
            else {
                echo "Query failed " . $conn->error;
            }
        }
        $conn->close();
    }
?>