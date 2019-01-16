<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATH, PUT, DELETE, OPTIONS');

//require 'Credentials.php';
    $host = "localhost";
    $user = "root";
    $passwd = "root";
    $database = "comunidadesorganizadas";

    $con = mysqli_connect($host, $user, $passwd, $database) or die("connection error");
    $email = $_POST['email'];
    $password = $_POST['password'];


     if(isset($_POST['login']))
    {
        $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'"));
        if($login != 0)
            echo "success";
        else
            echo "error";
    }
    mysqli_close($con);
?>