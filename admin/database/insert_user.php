<?php
session_start();
include "connection.php";

extract($_POST);
$select = "SELECT email FROM users";
$sel_query = $conn->query($select);
$check_email = $sel_query->fetch_assoc();

if(!in_array($email,$check_email)){
$insert = "INSERT INTO users (name,email,password) 
            VALUES('$username','$email' ,'$password')";

$query = $conn->query($insert);

header("location:../../login.php");
}else{
    $_SESSION['email_error'] = "<div class='alert alert-danger'>this email is not available</div>";
    header("location:../../user_register.php");
    
}