<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Sign-up</title>
</head>

<?php
include "D:/xampp/htdocs/adelweb/blog/main.php";
session_start();

if (!isset($error)) {
    $error = "";
};
if (!isset($input1)) {
    $input1 = "";
};
if (!isset($input2)) {
    $input2 = "";
};
if (!isset($input3)) {
    $input3 = "";
};

if (isset($_POST["submit"])) {

    if (!is_column_exist("email",$_POST["email"])) {
        $_SESSION["first"] = strtolower(filter_user_input($_POST["first"]));
        $_SESSION["last"] = strtolower(filter_user_input($_POST["last"]));
        $_SESSION["email"] = strtolower(filter_user_input($_POST["email"]));
        $code = verification_code(6);
        $_SESSION["code"] = $code;
        send_email("usthb.dz1@gmail.com",  "usthb2021", true, "Verify your email", "<p>This is your verification code : <b>$code</b></p>", $_POST["email"]);
        header("Location:  verify.php");
    } else {
        $error = "Email already exist!";
        $input1 = $_POST["first"];
        $input2  = $_POST["last"];
        $input3 = $_POST["email"];
    };
};
?>

<body class="container">

    <div id="welcome-title" class="welcome-title row">
        <h1 class="col-xs-12">Create account</h1>
    </div>

    <div id="entry" class="entry row">
        <form action="" method="post">
            <label for="first">Enter your first name:</label>
            <input class="entries" name="first" type="text" minlength="2" maxlength="15" placeholder="First-name here" value="<?= $input1?>" required>
            <br>
            <br>
            <label for="last">Enter your last name:</label>
            <input class="entries" name="last" type="text" minlength="2" maxlength="15" placeholder="Last-name here" value="<?= $input2?>" required>
            <br>
            <br>
            <label for="email">Enter your email:</label>
            <input class="entries" name="email" type="email" placeholder="Email here" value="<?= $input3?>" required>
            <br>
            <br>
            <input class="gradient" id="submit" name="submit" type="submit" value="Enter" onclick="">
            <p>Do  you have an account? <a href="/adelweb/blog/log-in/log-in.php">Log-in</a></p>
        </form>
        <b class="red"><?= $error ?></b>
    </div>

    <script>
        $(".red").fadeToggle();
        $(".red").fadeToggle();
        $(".red").fadeToggle();
        $(".red").fadeToggle();
    </script>
</body>

</html>