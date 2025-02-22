<?php
include "../database/connection.php";
extract($_POST);
$id = $_GET['id'];
$update = "UPDATE products SET name='$name' , price='$price' , category='$Category' , Description = '$Description' WHERE id ='$id'";
$query = $conn->query($update);

$del_old_img = "DELETE FROM images WHERE pro_id = $id";
$del_query = $conn->query($del_old_img);

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
                $insert_img = "INSERT INTO images (name,pro_id)VALUES('$newName','$id') ";
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

header("location:../products.php");
