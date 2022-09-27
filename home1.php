<?php
session_start();
if (isset($_SESSION['UserLogin'])) {
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Font Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="CSS/stylechat.css">
    <script src="JS/index.js"></script>
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
    .form-container{
        display: block;
    }
    div.wrapper {
        /* background-color: #D9D9D9; */
        width: 80rem;
        border-radius: 1rem;
        margin: auto;
        margin-top: 2rem;
        margin-right: 25rem;
    }
    .form-container .wrapper img{
        border-radius: 1.5rem;
    }
    .butn{
        display: flex;
        justify-content: center;
        
    }
    button{
        cursor: pointer;

    }
    .butn button:hover{
        border: 0.05rem solid wheat;
    }
   a button p:hover{
        color: wheat;
    }
    .butn a p{
        font-size: 1.5rem;
        font-weight: 900;
        display: inline-block;
        vertical-align: middle;
        color: black;
    }
    .butn  img{
        display: inline-block;
        vertical-align: middle;
    }
    .butn button{
        width: 18rem;
        margin: .5rem;
        padding: .8rem;
        justify-items: center;
        align-items: center;
        background-image: linear-gradient(to right, red, orange);
        border: none;
    }
   
</style>
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
                <a href="home.php">

                    <img src="images/logo1.png" alt="" srcset="">
                </a>
            </div>

            <div class="left-nav">
                <ul class="left-part">
                    <li><a href="home.php">HOME</a></li>
                    <li id="waaa"><a href="watchlive.php">WATCH LIVE</a></li>
                    <li id=""><a href="news.php">NEWS</a></li>
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="login.php">LOGIN</a></li>
                    <li class="login-area"><a href="register.php">REGISTER</a></li>
                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">
        <div class="wrapper">
           <img src="https://wp.inews.co.uk/wp-content/uploads/2021/08/PRI_192753674.jpg?resize=760,507&strip=all&quality=90" alt="Olympics" srcset="">
        </div>

        <style>
            .form-container .wrapper img{
                width: 70rem;
                margin-left: 2rem;
            }
        </style>
        <div class="butn">
            
                <a href="watchlive.php">
                    <button>
                        <p>WATCH STREAM  </p> 
                        <img  src="images/video icon.png" alt="" srcset="" width="30" height="20">
                    </button>
                </a>
            
        </div>
    
    </div>
            
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>

</html>