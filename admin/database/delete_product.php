<?php
include "connection.php";
$id = $_GET['id'];
$delete = " DELETE FROM products where id = '$id' ";
$query = $conn->query($delete);

header("location:../products.php");
