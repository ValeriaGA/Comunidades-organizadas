<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATH, PUT, DELETE, OPTIONS');

//require 'Credentials.php';
    $host = "localhost";
    $user = "root";
    $passwd = "root";
    $database = "comunidadesorganizadas";

    $con = mysqli_connect($host, $user, $passwd, $database) or die("connection error");
    $title = $_POST['email'];
    $description = $_POST['password'];
    $community = $_POST['comunnity'];

    if(isset($_POST['news']))
    {   
        
            $insertNews = mysqli_query($con,"`reports` (`title`, `description`, `community_group_id`, `sub_cat_report_id`, `user_id`, `state_id`) VALUES ( '$title', '$description', '$community', '1', '1', '1');");
          
            if($insertNews)
                echo "success";
            else
                echo "error";
        }
    
    
    mysqli_close($con);
?>