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
    <title>sign-up2</title>
</head>
<?php
session_start();
include "D:/xampp/htdocs/adelweb/blog/main.php";

if (!isset($input1)){
    $input1 = "";
};
if (!isset($input2)){
    $input2 = "";
};
if (!isset($input3)){
    $input3 = "";
};


if (!$_SESSION["is_verify"]){
    header("Location:  verify.php");
};


if (isset($_POST["submit"])){
    if (!is_column_exist("username", $_POST["username"]) and !is_column_exist("email", $_SESSION["email"])){
        $_SESSION["username"] = strtolower(filter_user_input($_POST["username"]));
        $_SESSION["password"] = filter_user_input($_POST["password"]);
        $_SESSION["bio"] = filter_user_input($_POST["bio"]);
        $_SESSION["birthday"] =  filter_user_input($_POST["birthday"]);
        $user_data = [
            "first"=> $_SESSION["first"],
            "last"=> $_SESSION["last"],
            "email"=> $_SESSION["email"],
            "username"=> $_SESSION["username"],
            "password"=> $_SESSION["password"],
            "birhtday"=> $_SESSION["birthday"],
            "bio"=> $_SESSION["bio"],
        ];
        insert_into_db($user_data);
    }else{
        echo "This username already exist!";
    };
};


?>
<body class="container">
    <div class="welcome row">
        <h1>Create account 2</h1>
    </div>

    <div class="entry2 row" id="entry2">
        <form action="sign-up2.php" method="POST">
            <label for="username">Create a username:</label>
            <input id="username" class="entries" value="<?= $input1?>" name="username" placeholder="Username here" type="text" minlength="2" maxlength="15" required>
            <p id="error"></p>
            <br>
            <label for="password">Create a password:</label>
            <input id="password" class="entries"  name="password" placeholder="Password here" type="password" minlength="6" maxlength="20" required>
            <br><br>
            <label for="bio">Create a suitable bio for you:</label>
            <textarea id="bio" name="bio" value="<?= $input1?>" placeholder="Bio here" minlength="15"></textarea>
            <p class="op red">Optional</p>
            <br><br>
            <label for="birthday">Enter your birthday:</label>
            <input class="entries" value="<?= $input3?>" name="birthday" type="date">
            <p class="op red">Optional</p>
            <br><br>
            <input class="gradient" id="submit" name="submit" type="submit" value=Enter>
        </form>
    </div>

    <script>
        $("#username").keyup(function(){
            $.post("is_username_exist.php",
             {username:  $("#username").val()},
              function(data){
                  $("#error").text(data);
                  if (data === "This username is available!"){
                      $("#error").removeClass("red");
                      $("#error").addClass("green");
                  }else{
                    $("#error").removeClass("green");
                    $("#error").addClass("red");
                  };
              })
        });
    </script>
</body>

</html>