<?php
include "../database/connection.php";
extract($_POST);
$id = $_GET['id'];
$update = "UPDATE orders SET state='delivered'  WHERE id ='$id'";
$query = $conn->query($update);
header("location:../orders.php");
