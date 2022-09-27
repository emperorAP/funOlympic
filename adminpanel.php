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
<!-- game stream.................>>>>>>>>>> -->

<?php
    include 'config.php';
    function selecthomepage($conn){
        $sql = "select * from live_stream where page_name = 'watchlive'";
        $compile = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_row($compile);
        return $fetch;
    }
    $data = selecthomepage($conn);
?>
<?php
include 'config.php'; 
if(isset($_POST['broadcast'])){

    $title=$_POST['title'];
    $url=$_POST['url'];
    $titlequery= "update live_stream set title='$title', url='$url'where page_name = 'watchlive'";
    $query=mysqli_query($conn, $titlequery);
    if($query){
        header('location: dashboard.php');
        echo '<script>alert("updated")</script>';
    }
    else{
        echo '<script>alert("not updated")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Stream Panel</title>
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
    .form-container form .admin-game {
        /* background-color: #A00F0F; */
        display: flex;
        /* justify-content: center; */
        margin-left: 1.5rem;
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
        <form action="" method="POST">
            <h3 class="regis" style="width: 250px;">WELCOME TO ADMIN PANEL - <?php echo $_SESSION['AdminLoginId']; ?></h3>

            <label class="admin-game" for="">Game Title:</label>
            <input type="text" name="title" id="title" placeholder="enter game title" value="<?php echo $data[1]; ?>" class="box" style="width: 320px; height: 40px">
            <label class="admin-game" for="">Video Url:</label>
            <input type="url" name="url" id="url" placeholder="enter video url" value="<?php echo $data[2]; ?>" class="box" style="width: 320px; height: 40px">
            <input type="submit" name="broadcast" value="broadcast" class="btn">

        </form>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>

</body>

</html>