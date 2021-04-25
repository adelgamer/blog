<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "blog";
$link = mysqli_connect($servername, $db_username, $db_password,  $database);

function is_column_exist($column, $value_of_column){
    global $link;
    $sql = "SELECT * FROM users WHERE $column='$value_of_column';";
    $result = mysqli_query($link, $sql) or die ($link->error);
    $list = [];
    while ($row =  $result->fetch_assoc()) {
        array_push($list, $row["email"]);
    };
    $list_count = count($list);
    if ($list_count === 1){
        return true;
    }else{
        return false;
    };
};

function send_email($sender_email, $sender_password, $isHTML, $Subject, $Body, $to)
{
    //This function send gmail with content
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML($isHTML);
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->setFrom($sender_email);
    $mail->Subject = $Subject;
    $mail->Body = $Body;
    $mail->addAddress($to);

    $mail->Send();
    echo $mail->ErrorInfo;
};


function verification_code($length){
    //To Copy
    $min = "1". str_repeat("0", $length-1);
    $max = str_repeat("9", $length);
    return rand(intval($min), intval($max));
};

function filter_user_input($input){
    $input = htmlspecialchars($input);
    $input =  trim($input);
    return $input;
};

function insert_into_db($associative_array){
    global $link;
    $sql = "INSERT INTO users (";
    $count = 0;
    foreach ($associative_array as $key=> $value){
        if ($count === 0){
            $sql = $sql.$key;
        }else{
            $key = ", ".$key;
            $sql = $sql.$key;
        };
        $count ++;
    };
    $sql = $sql.") VALUES (";
    $count = 0;

    foreach ($associative_array as $key=> $value){
        if ($count === 0){
            $value = "'".$value."'";
            $sql = $sql.$value;
        }else{
            $value  = ", '".$value."'";
            $sql = $sql.$value;
        };
        $count ++;
    };
    $sql = $sql . ");";
    mysqli_query($link, $sql);
    mysqli_close($link);
};

function column_value($column_name, $where_column_name, $where){
    global $link;
    $sql = "SELECT $column_name FROM users WHERE $where_column_name='$where';";
    $result = mysqli_query($link,  $sql);
    while ($row  = $result->fetch_assoc()) {
        $column = $row["password"];
    }
    if (isset($column)){
        return $column;
    }else{
        $column =  false;
        return $column;
    };
};