<?php
include "connection.php";
$id = $_GET['id'];
$delete = " DELETE FROM orders where id = '$id' ";
$query = $conn->query($delete);

header("location:../orders.php");
