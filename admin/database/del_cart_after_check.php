<?php
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
$pro_id = $_GET['pro_id'];
$delete = " DELETE FROM cart where user_id = '$user_id' ";
$query = $conn->query($delete);

header("location:../../cart.php");
