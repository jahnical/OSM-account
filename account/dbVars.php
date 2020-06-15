<?php
//Configure database variables

//Make sure the database has a user and pending user tables 
//with fields user(user_id int auto-increment, firstname varchar(32), 
//      lastname varchar(32), email varchar(32), password string(32), role varchar(8))
// pending_user(user_id int auto-increment, firstname varchar(32), 
//      lastname varchar(32), email varchar(32), password varchar(32), veri_code varchar(32))
        $host = 'localhost';
        $username = 'root';
        $password = 'jahnical';
        $dbname = 'mos';

?>