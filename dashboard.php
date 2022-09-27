<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: login.php");
}
?>

<?php
if (isset($_POST['submit'])) {
    session_destroy();
    header("location: login.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        height: 19vh;
    }

    .form-container .dash h3 {
        text-align: center;
    }

    .form-container .dash a {
        margin: .5rem;
        padding: .5rem;
        color: rgb(91, 84, 72);
        font-size: 1.8rem;
        font-weight: bold;
        background-color: lightcoral;

    }

    .form-container .dash a:hover {
        background-color: burlywood;
    }

    .form-container .main-title {
        display: flex;
        /* background-color: red; */
    }

    .form-container .dash .stream {

        width: 25rem;

        margin: 1rem;
        text-align: center;
        padding: .5rem;

    }

    .form-container .dash .live-chat {

        margin: 1rem;
        padding: .5rem;
        text-align: center;
        width: 25rem;


    }

    .form-container .dash .pass-change {

        padding: .5rem;
        margin: 1rem;
        text-align: center;
        width: 25rem;

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
                    <li id=""><a href="news.php">NEWS</a></li>
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="logout.php">LOG OUT</a></li>

                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <div class="dash">
            <h3 class="regis" style="width: 450px;">WELCOME TO ADMIN DASHBOARD - <?php echo $_SESSION['AdminLoginId']; ?></h3>
            <div class="main-title">
                <div class="stream">
                    <a href="adminpanel.php">GAME STREAM</a> 
                </div>
                <div class="live-chat">
                    <a href="viewlivechat.php">VIEW LIVE CHAT</a>
                </div>
                <div class="pass-change">
                    <a href="changepass.php">CHANGE PASSWORD</a>
                </div>
                <div class="pass-change">
                    <a href="forgotpass.php">USER PASSWORD RESET</a>
                </div>
                <div class="pass-change">
                    <a href="usersdb.php">USERS DATABASE</a>
                </div>
            </div>

        </div>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>

</body>

</html>