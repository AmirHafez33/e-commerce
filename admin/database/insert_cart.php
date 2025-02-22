<?php
session_start();
include_once "connection.php";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $select_user = "SELECT * FROM users WHERE id = $user_id ";
    $query_user = $conn->query($select_user);
    $user = $query_user->fetch_assoc();
  }else{
    header("location:user_register.php");
  }

$pro_id = $_GET['id'];
$quantity = 1 ;
extract($_POST);

$insert = "INSERT INTO cart (user_id,pro_id,quantity) VALUES('$user_id','$pro_id','$quantity')";
$query = $conn->query($insert);
header("location:../../cart.php");
