<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Verification</title>
</head>
<?php
include "D:/xampp/htdocs/adelweb/blog/main.php";
session_start();
if (!isset($error)){
    $error = "";
};
$_SESSION["is_verify"] = false;

if(isset($_POST["code"])){
    if ($_POST["code"] == intval($_SESSION["code"])){
        $_SESSION["is_verify"] = true;
        header("Location: sign-up2.php");
    }else{$error = "The code you entered is incorrect!";};
};

if(isset($_POST["reemail"])){
    $code  = verification_code(6);
    $_SESSION["code"] = $code;
    send_email("usthb.dz1@gmail.com", "usthb2021", true, "Verify your email", "<p>This is your verification code : <b>$code</b></p>", $_POST["reemail"]);
    $error = "Code has been re-sent!";
    $_SESSION["email"] = filter_user_input($_POST["reemail"]);
};

?>

<body>
    
<div id="verify" class="verify row">
        <div id="verify-welcome" class="col-xs-12">
            <h2>Verify your email</h2>
            <p>We have sent you a verification code with 6 digits.<br>Re-enter the code here.</p>
        </div>
        <div id="verify-entry" class="row">
            <form action="" method="POST" class="col-xs-12">
                <input name="code" type="text" minlength="6" maxlength="6" placeholder="xxxxxx" required>
                <br>
                <input class="gradient" id="submit" type="submit" value="Enter">
                <p  id="error"><?= $error?></p>
            </form>
        </div>
    </div>
    <p class="">Didn't you receive the code? Check your spam folder or <button onclick="reenter()">Re-enter your email</button></p>
    <div id="reenter" class="reenter row">
        <form action="" method="POST">
        <label for="reemail">Re-enter your email</label><br>
            <input name="reemail" type="email" placeholder="Your email here" required><br>
            <input type="submit" value="Enter">
        </form>
    </div>

    <script>
        $("#reenter").hide();
        function reenter(){
            $("#reenter").slideToggle();
        };
        $("#error").fadeOut();
        $("#error").fadeIn();
        $("#error").fadeOut();
        $("#error").fadeIn();
        if ($("#error").text() === "Code has been re-sent!"){
            $("#error").removeClass("red");
            $("#error").addClass("green");
        }else{
            $("#error").removeClass("green");
            $("#error").addClass("red");
        };
    </script>
</body>
</html>