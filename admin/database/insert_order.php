<?php
session_start();
include_once "connection.php";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $total_price = $_SESSION['total_price'];
    // $select_user = "SELECT * FROM users WHERE id = $user_id ";
    // $query_user = $conn->query($select_user);
    // $user = $query_user->fetch_assoc();
  }else{
    header("location:user_register.php");
  }

extract($_POST);

$insert = "INSERT INTO orders (user_id,username,email,phone,country,Address,city,total_price,state) VALUES('$user_id','$username','$email','$phone','$country','$address','$city','$total_price','intransit')";
$query = $conn->query($insert);
unset($_SESSION['total_price']);
header("location:del_cart_after_check.php");
