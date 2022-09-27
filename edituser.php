<?php

use Google\Service\Adsense\Alert;

include 'config.php';
session_start();

$ids = $_GET['id'];
$showquery = "select * from users where id={$ids}";
$showdata=mysqli_query($conn, $showquery);
$arrdata=mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {
    $idupdate=$_GET['id'];

    $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    // $gender = mysqli_real_escape_string($conn, $_POST['gender_type']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $query="update users set fullname='$fname', email='$email', age='$age', country='$country' where id='$idupdate'";
    $res=mysqli_query($conn, $query);
    if($res){
        header('location: usersdb.php');
    }
    else{
        echo "<script>alert('not updated')</script>";
    }


    // $emailquery = "select * from users where email='$email'";
    // $query = mysqli_query($conn, $emailquery);
    // $emailcount = mysqli_num_rows($query);
    // if ($emailcount > 0) {
    // } else {
    //     if ($pass != $cpass) {
    //     } else {
    //         $insertquery = "INSERT INTO `users`(fullname, email, age, gender_type, country) VALUES('$fname', '$email', '$age', '$gender', '$country')" or die('query failedddd');
    //         $iquery = mysqli_query($conn, $insertquery);
    //         header('location: login.php');
    //         if ($iquery) {
    //         } else {
    //             echo "Email sending failed...";
    //         }
    //     }
    // }
}

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
    html {
        font-size: 62.5%;
    }

    .navbar li {
        font-size: 1.5rem;
    }

    footer {
        font-size: 1.5rem;
    }

    .form-container .bg-sucess {
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
                    <li class="login-area"><a href="login.php">LOGOUT</a></li>


                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <form action="" method="POST">
            <h3 class="regis">EDIT NOW</h3>

            <!-- <label for="">Full Name:</label> -->
            <input type="text" name="fullname" placeholder="enter your full name" value="<?php echo $arrdata['fullname']; ?>" required class="box"> <br>
            <!-- <label for="">Email:</label> -->
            <input type="email" name="email" placeholder="enter your email" value="<?php echo $arrdata['email']; ?>" required class="box"> <br>
            <!-- <label for="">Age:</label> -->
            <input type="age" name="age" placeholder="enter your age" value="<?php echo $arrdata['age']; ?>" required class="box"><br>
            <!-- <label for="">Gender:</label> -->
            <!-- <select name="gender_type" id="" class="box ">
                <option value="<?php echo $arrdata['gender_type']; ?>"><?php echo $arrdata['gender_type']; ?></option>
                <option value="<?php echo $arrdata['gender_type']; ?>"><?php echo $arrdata['gender_type']; ?></option>
            </select> <br> -->
            <!-- <label for="">Country:</label> -->
            <input type="country" name="country" placeholder="enter your country" value="<?php echo $arrdata['country']; ?>" required class="box"> <br>
            <input type="submit" name="submit" value="Update" class="btn">

        </form>
    </div>

    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>

</html>