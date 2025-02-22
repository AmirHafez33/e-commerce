<?php
include "connection.php";

extract($_POST);

$insert = "INSERT INTO admin (name,email,prev,password) 
            VALUES('$username','$email', '$prev' ,'$password')";

$query = $conn->query($insert);

header("location:../admins.php");
