 <?php
 /*
include_once "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
// echo $user_id;
$pro_id = $_GET['id'];
extract($_POST);


$update_cart = "UPDATE cart SET quantity = $qnt WHERE pro_id = $pro_id && user_id =$user_id ";
$query_cart = $conn->query($update_cart);
// $product = $query_pro->fetch_assoc();
header("location:../../cart.php"); */


include_once "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
$pro_id = $_GET['id'];
extract($_POST);


$update_cart = "UPDATE cart SET quantity = $qnt WHERE pro_id = $pro_id && user_id =$user_id ";
$query_cart = $conn->query($update_cart);
header("location:../../cart.php");