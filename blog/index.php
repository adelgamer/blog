<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Blog, Blogger, wild west blogger, freedom of speech">
    <meta name="description" content="Wild west blogger is a free, simple and easy to use blogging website with 100% freedom of speech.">
    <meta name="author" content="Adel Amrane">
    <link rel="canonical" href="wsblogger.epizy.com" />
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="saloon.png">
    <title>Express your opinion freely - Wild West Blogger</title>
</head>

<body class="container-wrap">
    <nav class="header row">
        <form class="col-xs-6" id="sign-up" action="sign-up/sign-up1.php" method="post"><input type="submit" value="Sign-up"></form>
        <form class="col-ws-6" id="log-in" action="log-in/log-in.php" method="post"><input type="submit" value="Log-in"></form>
    </nav>
    <div class="victim"></div>
    <article>
        <div class="content row">
            <div class="name row">
                <h1>Wild West Blogger</h1>
                <p>Wild West Blogger is a <b>free</b>, <b>easy</b>, <b>simple</b> to use website for <b>blogging</b>.<br>
                    Talk about any topic you want with 100% <b>freedom of speech</b>. you will never get banned for your honesty!<br>
                    That's why we named our website "<i>Wild West Blogger</i>", Because the wild west was savage and free you can do and say whatever you want there was no law.</p>
            </div>

            <div class="free row">
                <h2>Free</h2>
                <p>Our website is completly free you don't have to pay anything to use it!</p>
            </div>

            <div class="freedom row">
                <h2>Freedom of speech</h2>
                <p>Our worl nowadays really needs <b>freedom of speech</b> especially in the internet<br>
                    so we decided to let people <b>express there opinions freely</b> without any restrictions.<br>
                    <i>"You can say whatever you want here it's a free country!"</i>
                </p>
            </div>

            <div class="simple row">
                <h2>Simple and Easy</h2>
                <p>Our website is so simple and easy to use anyone can use it create his <b>blogs</b> including you, So what are you waiting for join us today!</p>
                <button onclick="signup()">Sign up Now</button>
            </div>

            <div class="like-comment row">
                <h2>Like / Dislike / Comment</h2>
                <p>Users can like / comment / dislike your <b>blogs</b> so do You!</p>
                <p><strong>Note: </strong>Dislikes won't affect your <b>Blog</b> ranking or get it deleted</p>
            </div>

            <div class="unlimited row">
                <h2>Unfinite Blogs</h2>
                <p>You have unlimited number of <b>Blogs</b>, You can create millions of blogs!</p>
            </div>

            <div class="sign-up row">
                <button onclick="signup()">Sign-up Now</button>
            </div>
        </div>
    </article>
</body>

<script>
    const sign_up = $("#sign-up");
    const log_in = $("#log-in")
    function signup(){
        sign_up.fadeOut();
        sign_up.fadeIn();
        sign_up.fadeOut();
        sign_up.fadeIn();
    };
</script>

</html>