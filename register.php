<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender_type']);
    $country = mysqli_real_escape_string($conn, $_POST['country']); 

    $token =  bin2hex(random_bytes(15));

    $emailquery = "select * from users where email='$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount > 0) {
        $_SESSION['error_msg']="Email already exists!";
    } else {
        if ($pass != $cpass) {
            $_SESSION['error_msg']="Passwords not matched!";
            
        } else {
            $insertquery = "INSERT INTO `users`(fullname, email, password, age, gender_type, country, token, status) VALUES('$fname', '$email', '$pass', '$age', '$gender', '$country', '$token', 'inactive')" or die('query failedddd');
            $iquery = mysqli_query($conn, $insertquery);
            header('location: login.php');
            if ($iquery) {
                $subject = "Email Activation!";
                $body = "Hi, $fname. Click here to activate your account! http://localhost/funolympics/activate.php?token=$token ";
                $senderemail = "From: panthiaaashish@gmail.com";

                if (mail($email, $subject, $body, $senderemail)) {
                    $_SESSION['msg'] = "Check your mail to activate your account $email";
                    header('location: login.php');
                } else {
                    echo "Email sending failed...";
                }
            }
        }
    }
}

?>
<?php


// Register with google-------------------------------->>>>>>>

require_once 'vendor/autoload.php';

$clientID = '1042111591115-46mh04mauak743gnlbubjfnu92dtu89p.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/funolympics/watchlive.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

?>
<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
// require_once 'vendor/autoload.php';

// //Make object of Google API Client for call Google API
// $google_client = new Google_Client();

// //Set the OAuth 2.0 Client ID
// $google_client->setClientId('1042111591115-46mh04mauak743gnlbubjfnu92dtu89p.apps.googleusercontent.com');

// //Set the OAuth 2.0 Client Secret key
// $google_client->setClientSecret('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');

// //Set the OAuth 2.0 Redirect URI
// $google_client->setRedirectUri('http://localhost/funolympics/index.php');

// // to get the email and profile 
// $google_client->addScope('email');

// $google_client->addScope('profile');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
   .form-container .bg-sucess{
        background-color: #D9D9D9;
        color: green;
    
} 
#reg-gmail {
        display: flex;
        align-content: center;
        margin: auto;
        margin-bottom: 5px;
        margin-top: 2px;
        /* border: none; */
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
        <form action="" method="POST">
            <h3 class="regis">REGISTER NOW</h3>
            <div>
                <p class="bg-sucess">
                    <?php
                        if(isset($_SESSION['error_msg'])){
                            echo $_SESSION['error_msg'];
                        } 
                    ?>
                </p>
            </div>
            <!-- <label for="">Full Name:</label> -->
            <input type="text" name="fullname" placeholder="enter your full name" required class="box"> <br>
            <!-- <label for="">Email:</label> -->
            <input type="email" name="email" placeholder="enter your email" required class="box"> <br>
            <!-- <label for="">Password:</label> -->
            <input type="password" name="password" placeholder="enter your password" required class="box"><br>
            <!-- <label for="">Confirm Password:</label> -->
            <input type="password" name="cpassword" placeholder="confirm your password" required class="box"><br>
            <!-- <label for="">Age:</label> -->
            <input type="age" name="age" placeholder="enter your age" required class="box"><br>
            <!-- <label for="">Gender:</label> -->
            <select name="gender_type" id="" class="box">
                <option value="male">male</option>
                <option value="female">female</option>
            </select> <br>
            <!-- <label for="">Country:</label> -->
            <input type="country" name="country" placeholder="enter your country" required class="box">
            <input type="submit" name="submit" value="Create Account" class="btn">
            <button name="login_google" id="reg-gmail">
                <?php
                if (isset($_GET['code'])) {
                    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                    $client->setAccessToken($token['access_token']);
                    $google_oauth = new Google_Service_Oauth2($client);
                    $google_account_info = $google_oauth->userinfo->get();
                    $email =  $google_account_info->email;
                    $name =  $google_account_info->name;
                } else {
                    echo "<a href='" . $client->createAuthUrl() . "'><img src='images/gogg.png' width='20px' style='margin-right: 2px;'></a>";
                    echo "<a href='" . $client->createAuthUrl() . "'>Register with Google</a>";
                }
                ?>
            </button>    
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>

    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>

</html>