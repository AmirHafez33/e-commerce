<?php
session_start();
include "connection.php";
extract($_POST);
foreach ($selected as $id) {
    $del = "DELETE FROM products WHERE id='$id'";
    $query_del = $conn->query($del);
}
header("location:../products.php");
