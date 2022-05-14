<?php
    //start session
    session_start();
    

    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', 'mysql');
    define('DB_NAME', 'testordercrud');   

    //connect database
    $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD) or die("koneksi gagal");
    $db_select = mysqli_select_db($conn, DB_NAME) or die("database tidak bisa dibuka");
?>