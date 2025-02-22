<?php
session_start();
extract($_POST);
include "connection.php";
$select = "SELECT * FROM admin WHERE email='$email' AND password='$password' ";
$query = $conn->query($select);
if ($query->num_rows > 0) {
    $admin = $query->fetch_assoc();
    $_SESSION['admin_name'] = $admin['name'];
    $prev = $admin['prev'];
    $sel_prev = "SELECT * FROM prev WHERE id = $prev";
    $prev_query = $conn->query($sel_prev);
    $prev_array = $prev_query->fetch_assoc();
    $_SESSION['prev'] = $prev_array['prev_value'];
    header("location:../index.php");
} else {
    $_SESSION['login_error'] = "<div class='alert alert-danger'>Wrong Credentials</div>";
    header("location:../login.php");
}
