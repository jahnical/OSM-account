<?php
    set_error_handler("error_handler");
    function error_handler($level, $message)
    {
        die("<h2>Verification failed</h2>");
    }
    //connect to database
    require("dbVars.php");

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "Conection error in db";
        die("Connection Error ". $conn->connect_error);
    }

    if (isset($_GET['email'])) {
        $email = mysqli_real_escape_string($conn, stripcslashes($_GET['email']));
        $veri_code = mysqli_real_escape_string($conn, stripcslashes($_GET['veri_code']));

        //check if it matches in db
        $match = matchDB($email, $veri_code);
        
        if ($match) {
            //remove data from temp db to main db
            global $conn;
            $sql = "SELECT * FROM PendingUser WHERE email='" . $email . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();

                $firstname = $data['firstname'];
                $lastname = $data['lastname'];
                $email = $data['email'];
                $password = $data['password'];

                $sql = "INSERT INTO User (firstname, lastname, email, password, role)" . 
                    "VALUES ('$firstname', '$lastname', '$email', '$password', 'customer');";
                $result = $conn->query("SELECT * FROM user where email='$email'");
                if ($result->num_rows < 1) {
                    if ($conn->query($sql)) {
                        session_start();
                        $_SESSION['user_id'] = $conn->query("SELECT id FROM user where email='$email'")->fetch_assoc()['id'];
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        echo "<link href='sign.css' rel='stylesheet'><section><h3>Your email has been verified</h3><h4>Start <a href='../index.php'>Shopping now</a></h4></section>";
                    }
                    else echo $conn->error;
                }
                else { 
                    echo "<link href='sign.css' rel='stylesheet'><section><h3>Your email has been verified</h3><h4>Start <a href='../index.php'>Shopping now</a></h4></section>";
                    session_start();
                    $_SESSION['user_id'] = $result->fetch_assoc()['id'];
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                }
            }
            else {
                echo "<h2>Verification failed</h2>";
            }
        }
        else {
            echo "<h2>Verification failed</h2>";
        }
    }

     //Check if hash matches with email in temp db
     function matchDB($email, $veri_code) {
        global $conn;
        //Check for hash of email pending db
        $sql = "SELECT veri_code FROM PendingUser WHERE email='" . $email . "';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if ($data['veri_code'] == $veri_code) { 
                return true;}
        }
        return false;
     }
?>