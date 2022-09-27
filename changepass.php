<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: login.php");
}
?>
<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $oldpass = mysqli_real_escape_string($conn, ($_POST['opassword']));
    $newpass = mysqli_real_escape_string($conn, ($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, ($_POST['cpassword']));

    if ($newpass === $cpass) {
        $updatequery = "update users set password='$newpass'";

        $iquery = mysqli_query($conn, $updatequery);
        if ($iquery) {
            $_SESSION['adminmsg']="Your password has been updated!";
            // header('location: dashboard.php');
        } else {
            $_SESSION['adminmsg']="Your password is not updated!";
            // header('location: dashboard.php');
          
        }
    } else {
        $_SESSION['adminmsg']="Passwords not matched!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Font Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="CSS/stylechat.css">
    <script src="js/index.js"></script>
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
    .form-container {
        margin-bottom: 5rem;
    }

    .form-container .dash {
        background-color: #D9D9D9;
        padding: 1rem;
        border-radius: .5rem;
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
                <a href="home.php">

                    <img src="images/logo1.png" alt="" srcset="">
                </a>
            </div>

            <div class="left-nav">
                <ul class="left-part">
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="watchlive.php">WATCH LIVE</a></li>
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="logout.php">LOG OUT</a></li>

                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <div class="dash">

            <form method="POST" action="">
                <?php
                if(isset($_SESSION['adminmsg'])){
                    echo $_SESSION['adminmsg'];
                }
                ?>
                <input type="password" name="opassword" placeholder="enter old password" class="box" required> <br>
                <input type="password" name="password" placeholder="enter new password" class="box" required> <br>
                <input type="password" name="cpassword" placeholder="re-enter new password" class="box" required> <br>

                <input type="submit" name="submit" value="change password" class="btn">


            </form>
        </div>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>

</body>

</html>