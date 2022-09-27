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
    <title>User DB</title>
    <!-- Font Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- CSS File Link -->
    <link rel="stylesheet" href="CSS/style1.css">
    <link rel="stylesheet" href="CSS/stylechat.css">
    <!-- css??? -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .form-container .user-dash {
        margin-bottom: 15rem;
    }

    .form-container .user-dash {
        background-color: #D9D9D9;
        padding: 1rem;
        border-radius: .5rem;
        height: auto;
        width: 75rem;
    }

    
    .form-container .center th, td {
        padding: 1.2rem;
        text-align: center;
        font-size: 1.6rem;
    }
</style>

<body>
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
        <div class="user-dash">
            <h1>Users List</h1>
            <div class="center"></div>
            <table>
                <thead>
                    <tr style="font-size: 1.8rem;">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th style="padding: 0.2rem;">Country</th>
                        <th colspan="2" style="padding: 0.2rem">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';

                    $selectquery = "select * from users";
                    $query = mysqli_query($conn, $selectquery);
                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        
                   
                        ?>
                        <tr>
                        <td><?php echo $res['id']; ?></td>
                        <td><?php echo $res['fullname']; ?></td>
                        <td><?php echo $res['email']; ?></td>
                        <td><?php echo $res['age']; ?></td>
                        <td><?php echo $res['gender_type']; ?></td>
                        <td><?php echo $res['country']; ?></td>
                        <td><a href="edituser.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="deleteusers.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                
               <?php } ?>
                    

                    
                </tbody>
            </table>
        </div>

    </div>

    </div>
    <footer>
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>

</body>

</html>