<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass =  md5($_POST['password']);

    $email_search = "select * from users where email='$email' and password = '$pass' ";
    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);
    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($query);
        $_SESSION['email'] = $email_pass['email'];
        $_SESSION['UserLogin'] = $email_pass['fullname'];
        $db_pass = $email_pass['password'];
        if ($db_pass) {
            header('location: watchlive.php');
        } 
    } else {
        $_SESSION['msg']= 'Incorrect email or password!';
    }

}
?>
<?php
// For admin login------------------------------------->>>
if (isset($_POST['submit'])) {
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$_POST[email]' AND `password`='$_POST[password]'") or die('faillllled');
    if (mysqli_num_rows($select_users) > 0) {
        session_start();
        $_SESSION['AdminLoginId'] = $_POST['email'];
        header("location: dashboard.php");
    } else {
    }
}
?>

<?php
// Google database insert>>>>
// if (isset($_POST['gog'])) {
//     $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

//     if ($emailcount > 0) {
//         // $_SESSION['error_msg']="Email already exists!";
//         echo 'already have';
//     }
//     else {
//         $insertquery = "INSERT INTO `users`(fullname, email, password, token) VALUES('$fname', '$email', '$pass', '$token')" or die('query failedddd');
//         $iquery = mysqli_query($conn, $insertquery);
//         if($iquery)
//         {
//             echo 'inserted';
//         }
//     }
// }

?>

<?php


// Google Login starts here-------------------------------->>>>>>>.

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

// authenticate code from Google OAuth Flow

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
    <title>Log In</title>
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
    #forgot-pass {
        font-size: 1.2rem;
        width: 11.7rem;
        color: black;
        font-weight: 500;
    }

    #log-gmail {
        display: flex;
        align-content: center;
        margin: auto;
        margin-bottom: .5rem;
        margin-top: .2rem;
        /* border: none; */
    }

    #log-gmail:hover {
        background-color: lightsalmon;
    }

    /* msg part..... */

    .form-container div.bg-sucess {
        color: green;
        font-weight: bold;
        font-size: 1.2rem;
        padding: .4rem;
    }
    footer{
        font-size: 1.5rem;
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
            <h3 class="regis">LOGIN NOW</h3>
            <div>
                <p class="bg-sucess" style="background-color: #D9D9D9;">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                    }
                    ?>
                </p>
            </div>
            <label class="form-log" for="">Email:</label> <br>
            <input type="email" name="email" placeholder="enter your email" class="box" required> <br>
            <label class="form-log" for="">Password:</label> <br>
            <input type="password" name="password" placeholder="enter your password" class="box" required><br>
            <label id="forgot-pass" class="form-log" for=""><a href="forgotpass.php">Forgot Password?</a></label> <br>
            <input type="submit" name="submit" value="Log In" class="btn">
            <button name="login_google" id="log-gmail">
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
                    echo "<a name='gog' href='" . $client->createAuthUrl() . "'>Login with Google</a>";
                }
                ?>
            </button>
            <p>don't have an account? <a href="register.php">register now</a></p>
        </form>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>

</html>