<?php
   session_start();
   include 'config.php';
   if(isset($_GET['token'])){
        $token=$_GET['token'];
        $updatequery="update users where token='$token' ";

        $query=mysqli_query($conn, $updatequery);
        
        if($query)
        {
            if(isset($_SESSION['msg']))
            {
                $_SESSION['msg']="Account registered successfully";
                header('location: login.php');
            }
            else{
                header('location: login.php');
            }
        }
        else{
            $_SESSION['msg']="Account registered successfully";
            header('location: login.php');
        }
   }
?>