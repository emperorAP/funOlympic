<?php
include 'config.php';
session_start();


if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $emailquery = "select * from users where email='$email'";
    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);
    if ($emailcount) {
        $userdata = mysqli_fetch_array($query);
        $fname = $userdata['fullname'];
        $token = $userdata['token'];
        $subject = "Password Reset!";
        $body = "Hi, $fname. Click here to reset your password! http://localhost/funolympics/resetpass.php?token=$token ";
        $senderemail = "From: panthiaaashish@gmail.com";

        if (mail($email, $subject, $body, $senderemail)) {
            $_SESSION['msg'] = "Check your mail to reset your password $email";
            header('location: login.php');
        } else {
            $_SESSION['msg_forgot'] = "Email sending failed...";
        }
    } else {
        $_SESSION['msg_forgot'] = 'No email found';
    }
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
    html {
        font-size: 62.5%;
    }

    .navbar li {
        font-size: 1.5rem;
    }

    footer {
        font-size: 1.5rem;
    }

    .reset-tag {
        /* background-color: red; */
        font-size: 12px;
        font-weight: 500;
        color: blueviolet;
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
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="login.php">LOGIN</a></li>
                    <li class="login-area"><a href="register.php">REGISTER</a></li> <br>
                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
            <h3 class="regis" style="width: 180px; font-size: 12px;">reset your password</h3>
            <p class="bg-sucess" style="background-color: #D9D9D9;">
                <?php
                if (isset($_SESSION['msg_forgot'])) {
                    echo $_SESSION['msg_forgot'];
                }
                ?>
            </p>

            <input type="email" name="email" placeholder="enter your email" class="box" required> <br>

            <input type="submit" name="submit" value="confirm" class="btn">
        </form>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>

</html>