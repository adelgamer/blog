<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wild west blogger is a free, simple and easy to use blogging website with 100% freedom of speech.">
    <meta name="author" content="Adel Amrane">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="saloon.png">
    <title>Wild West blogger login</title>
</head>
<?php
include "D:/xampp/htdocs/adelweb/blog/main.php";
session_start();

if (isset($_POST["submit"])){
    $email  = $_POST["email"];
    $password = $_POST["password"];
    if ($password === column_value("password", "email", $email)){
        echo "Login";
    }else{
        echo "password or email is incorrect!";
    };
};




?>



<body class="container">
    <div  class="welcome row">
        <h1 class="col-xs-12">Log in</h1>
    </div>
    <form class="form" action="log-in.php" method="post">
        <label for="email">Enter your email:</label>
        <input class="input" type="email" name="email" placeholder="Email here">
        <br><br>
        <label for="password">Enter your password:</label>
        <input class="input" type="password" name="password" placeholder="Password here">
        <br>
        <input class="button" name="submit" type="submit" value="Log-in">
        <nav><p>Don't you have an account? <a href="/adelweb/blog/sign-up/sign-up1.php">Sign-up</a></p></nav>
    </form>
</body>
</html>