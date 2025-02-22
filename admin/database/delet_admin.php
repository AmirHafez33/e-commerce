<?php
include "connection.php";
$id = $_GET['id'];
$delete = " DELETE FROM admin where id = '$id' ";
$query = $conn->query($delete);

header("location:../admins.php");
