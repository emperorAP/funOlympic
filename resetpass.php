<?php
include 'config.php';
session_start();

// if(isset($_SESSION['user'])){
//     header('location: watchlive.php');
// }

if (isset($_POST['submit'])) {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        $newpass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
 
        if ($newpass===$cpass) {
            $updatequery="update users set password='$newpass' where token='$token'";

            $iquery=mysqli_query($conn, $updatequery);
            if($iquery>0){
                $_SESSION['msg']="Your password has been updated!";
                header('location: login.php');
            }
            else{
                $_SESSION['passmsg']="Your password is not updated!";
                header('location: resetpass.php');
            }
        }else{
            $_SESSION['passmsg']="Passwords not matched!";
        }
    }else{
        $_SESSION['passmsg']="No user found!";
    }

// <????..........................??????  Old.............................>>>>>>
//         if ($newpass != $cpass) {
//             $_SESSION['passmsg']="passwords not matched!";
            
//         } else {
            
//             $updatequery= "update users set password='$newpass' where token='$token'";
//             $iquery = mysqli_query($conn, $updatequery);
//             header('location: login.php');
//             if ($iquery) {
//                 // $_SESSION['msg']="Your password has been updated!";
//                 header('location: login.php');

//             } else {
//                 // $_SESSION['passmsg']="Your password is not updated!";
//                 header('location: resetpass.php');
//             }
//         }
        
//     }
//     else
//     {
//         $_SESSION['passmsg']="No user found!";
//     }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="CSS/style1.css">
    <link rel="stylesheet" href="CSS/stylechat.css">
</head>

<style>
    html{
        font-size: 62.5%;
    }
    .navbar li{
        font-size: 1.5rem;
    }
    footer{
        font-size: 1.5rem;
    }
    .reset-tag {
        font-size: 1.2rem;
        font-weight: 500;
        color: green;
    }
   .form-container div.bg-sucess {

        color: green;
        font-weight: bold;
        font-size: 1.25rem;
        padding: .4rem;
    }
</style>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
            <div class="message">
                <span>' . $message . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>        
            </div> ';
        }
    }
    ?>



    <header class="headder">
        <nav id="navi" class="navbar">
            <div class="logo">
                <img src="images/logo1.png" alt="" srcset="">
            </div>

            <div class="left-nav">
                <ul class="left-part">
                    <li><a href="home.php">HOME</a></li>
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="login.php">LOGIN</a></li>
                    <li class="login-area"><a href="register.php">REGISTER</a></li> <br>
                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <form action="" method="POST">
            <h3 class="regis" style="width: 180px; font-size: 12px;">reset your password</h3>
            <p class="bg-sucess" style="background-color:  #D9D9D9;">
                <?php
                if(isset($_SESSION['passmsg'])){
                    echo $_SESSION['passmsg'];
                }
                else
                {
                    echo $_SESSION['passmsg']="";

                }
                ?>
            </p>

            <input type="password" name="password" placeholder="enter new password" class="box" required> <br>
            <input type="password" name="cpassword" placeholder="re-enter new password" class="box" required> <br>

            <input type="submit" name="submit" value="confirm" class="btn">


        </form>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>
</html>