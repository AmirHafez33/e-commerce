<?php
include "../database/connection.php";
extract($_POST);
$id = $_GET['id'];
$update = "UPDATE admin SET name='$username' , email='$email' , prev = '$prev' , password='$password'  WHERE id ='$id'";
$query = $conn->query($update);
header("location:../admins.php");
