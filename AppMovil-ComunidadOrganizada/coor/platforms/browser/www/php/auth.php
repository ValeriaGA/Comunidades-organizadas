<?php
    $con = mysqli_connect("localhost","root","root","comunidadesorganizadas") or die("connection error");
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(isset($_POST['register']))
    {   
        $register = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `users` WHERE `email`='$email'"));
        if($register == 0)
        {
            $insert = mysqli_query($con,"INSERT INTO `users` (`role_id`, `person_id`, `email`, `email_verified_at`, `password`) VALUES ('1', '1','$email','2019-01-10 21:00:58','$password')");
            if($insert)
                echo "success";
            else
                echo "error";
        }
        else if($register != 0)
            echo "exist";
    }
    else if(isset($_POST['login']))
    {
        $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'"));
        if($login != 0)
            echo "success";
        else
            echo "error";
    }
    mysqli_close($con);
?>