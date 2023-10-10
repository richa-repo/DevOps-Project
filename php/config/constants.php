<?php 
    if(empty(session_id()) && !headers_sent()){
        session_start();
    }


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost:8080/php');
    define('LOCALHOST', 'mysql_db');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'foodorder');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database


?>