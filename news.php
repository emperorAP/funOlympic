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
    <link rel="stylesheet" href="CSS/style1.css">
    <link rel="stylesheet" href="CSS/stylechat.css">
    <script src="JS/index.js"></script>
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
                    <li id="waaa"><a href="watchlive.php">WATCH LIVE</a></li>
                    <li id=""><a href="news.php">NEWS</a></li>
                </ul>
                <ul class="right-part">
                    <li class="login-area"><a href="login.php">LOGOUT</a></li>
                </ul>
            </div>

        </nav>
    </header>
    <div class="form-container">

        <div class="lat-news">
            <h2 class="new">Latest News</h2>
            <div id="left-news">
                <h4>Roger Federer talks future after retirement</h4>
                <p>Swiss star will focus on family but intends to stay in the sport after this weekend's Laver Cup in London (23–25 September), his on-court farewell</p>
                <img src="https://img.olympicchannel.com/images/image/private/t_16-9_1240-700_15x/f_auto/v1538355600/primary/fjgbructygwyhdfehjsx" alt="" srcset="">
                <p>Roger Federer will retire from tennis this week a contented man, having in his own words "overachieved" in the sport. The Swiss legend bows out after having won 103 ATP singles titles including 20 Grand Slams, as well as an Olympic doubles gold medal from Beijing 2008.</p>
                <p>
                    Federer, who has not played since the summer of 2021 at Wimbledon, announced his retirement last week on social media, saying his body was no longer able to allow him to return to competition.

                    As he prepares for one final farewell at the Laver Cup in London, the 41-year-old Swiss told the BBC that he had "overachieved" during his career.
                </p>
                <p>Federer, who has not played since the summer of 2021 at Wimbledon, announced his retirement last week on social media, saying his body was no longer able to allow him to return to competition.

                    As he prepares for one final farewell at the Laver Cup in London, the 41-year-old Swiss told the BBC that he had "overachieved" during his career.</p>
            </div>
        </div>

        <div class="most-read">
            <h2 class="read">Most Read</h2>
            <div id="right-news">
                <h4>Naomi Osaka forced to withdraw from Pan Pacific Open with abdominal illness
                </h4>
                <img src="https://img.olympicchannel.com/images/image/private/t_16-9_1240-700_15x/f_auto/v1538355600/primary/nnnmfl5yksmxoiktl1u4" alt="" srcset="">
                <p>
                Osaka's Pan Pacific Open came to an abrupt and unexpected end on Thursday (22 September), when the four-time Grand Slam champion withdrew ahead of her second-round contest against Beatriz Haddad Maia due to an abdominal illness.
                “I am really sorry that I am not able to compete today", Osaka said in a statement released by organisers, who made it clear that she is not injured but suddenly became sick.

"It’s an honour to be able to play at the Toray Pan Pacific Open in front of the amazing fans here in Japan.

"This has and always will be a special tournament for me and I wish I could have stepped on court today, but my body won’t let me.

"Thank you for all your support this week and I will see you next year”. Fans were hardly able to get a look at Osaka, who was competing in Japan for the first time since the Tokyo 2020 Olympic Games last summer.
                </p>
            </div>
        </div>


    </div>


    <footer style=" bottom: 0;">
        <p>Copyright © FunOlympics 2022 - All Rights Reserved</p>
    </footer>
</body>

</html>