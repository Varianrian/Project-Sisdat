<?php
    //start session
    session_start();
    
    define('SITEURL', 'http://localhost/test-food-order1/');
    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', 'hamud4103');
    define('DB_NAME', 'testordercrud');   

    //connect database
    $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD) or die("koneksi gagal");
    $db_select = mysqli_select_db($conn, DB_NAME) or die("database tidak bisa dibuka");
?>