<?php
include "connection.php";
extract($_POST);
$imgnames = [];
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
// print_r($_FILES['image']['name'][0]);
// // echo count($_FILES['image']['name']);
// die();
$insert = "INSERT INTO products (name,price,category,Description) 
            VALUES('$name','$price','$Category','$Description')";
$query = $conn->query($insert);
$inserted_id = $conn->insert_id;
for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
    $imgname = $_FILES['image']['name'][$i];
    $tmp = $_FILES['image']['tmp_name'][$i];
    if ($_FILES['image']['error'][$i] == 0) {
        $extensions = ['jpg', 'png', 'gif'];
        $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        if (in_array($ext, $extensions)) {
            if ($_FILES['image']['size'][$i] < 2000000) {
                $newName = uniqid() . "." . $ext;
                move_uploaded_file($tmp, "../images/$newName");
                $imgnames[] = $newName;
                $insert_img = "INSERT INTO images (name,pro_id)VALUES('$newName','$inserted_id') ";
                $img_query = $conn->query($insert_img);
            } else {
                echo "size of image is big";
            }
        } else {
            echo "file error";
        }
    } else {
        echo "no image";
    }
}
// $newName = implode(',', $imgnames);



header("location:../products.php");
