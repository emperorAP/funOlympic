<?php
    session_start();
    if(isset($_SESSION['submit']))
    {
        header('Location: adminpanel.php');
    }
?>
  <?php
    require 'config.php';

    if(isset($_POST['submit']))
    {
       
        // $user = $_POST['user'];
        // $pass = $_POST['pass'];

        // $query= "SELECT * FROM `tbl_admin` WHERE user='$user' AND pass='$pass'";
        // $result=mysqli_query($conn,$query);
        // if(mysqli_num_rows($result)==1)
        // {
        //     echo "correct";
        // }
        // else
        // {
        //     echo "incorrect";
        // }

        $query= "SELECT * FROM `tbl_admin` WHERE `email_admin`='$_POST[email_admin]' AND `pass_admin`='$_POST[pass_admin]'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['AdminLoginId']=$_POST['email_admin'];
            header("location: adminpanel.php");
        }
        else
        {
            // echo "<script>alert('Wrong')</script>";
            // $message[]='incorrect username or password!';

            // echo "<script>alert('Incorrect Password!')</script>";
            echo 'Incorrect Password!';
        }
    }
    // else
    //     {
    //         header('location: admin.php');
    //     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Font Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style1.css">
    <script src="js/index.js"></script>
</head>

<body>
    
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
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
                    <li><a href="watchlive.php">WATCH LIVE</a></li>
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="login.php">LOGIN</a></li>
                    <li class="login-area"><a href="register.php">REGISTER</a></li> <br>
                    <li class="admin-part"><a href="admin.php">ADMIN</a></li>
                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <form action="" method="POST">
            <h3 class="regis">ADMIN</h3>
            <label class="form-log" for="">Username:</label> <br>
            <input type="text" name="user" placeholder="enter your username"  class="box"> <br>
            <label class="form-log" for="">Password:</label> <br>
            <input type="password" name="pass" placeholder="enter your password"  class="box"><br>
            <input type="submit" name="submit" value="Login" class="btn">
            
        </form>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
  
</body>
</html>
