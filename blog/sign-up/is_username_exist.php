<?php
include "D:/xampp/htdocs/adelweb/blog/main.php";

if (isset($_POST["username"])){
    if (!is_column_exist("username",  $_POST["username"])){
        echo "This username is available!";
    }else{
        echo "This username is unavailable!";
    };
};