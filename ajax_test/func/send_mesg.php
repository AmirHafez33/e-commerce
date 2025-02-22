<?php

include_once "../conn.php";

extract($_POST);

$insert_msg = "INSERT INTO contact (name , email , message) VALUES('$name','$email','$message') ";
$ins_query = $conn->query($insert_msg);


if($ins_query){

    echo "<div>message sent successfuly</div>" ;
}