<?php

// Set the number of rows per page
$pro_per_page = 9;

// Get the current page number from URL, default is 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $pro_per_page;
if(isset($_GET['action'])){    
// Fetch rows for the current page
if($_GET['action'] != "all"){

    $get_cat = $_GET['action'];
    $sel_cat = "SELECT * FROM categories WHERE name = '$get_cat'";
    $cat_query = $conn->query($sel_cat);
    $cat = $cat_query->fetch_assoc();
    $category = $cat['id'];

    // Get total number of rows in the table
$total_result = $conn->query("SELECT COUNT(*) AS total FROM products WHERE category = $category");
$total_pro = $total_result->fetch_assoc()['total'];
// Calculate total pages
$total_pages = ceil($total_pro / $pro_per_page);

   
    $sql = "SELECT * FROM products WHERE category = $category  LIMIT $offset, $pro_per_page";
    $pro_result = $conn->query($sql);
}else{
$get_cat = "all";
    // Get total number of rows in the table
$total_result = $conn->query("SELECT COUNT(*) AS total FROM products ");
$total_pro = $total_result->fetch_assoc()['total'];
// Calculate total pages
$total_pages = ceil($total_pro / $pro_per_page);

    $sql = "SELECT * FROM products LIMIT $offset, $pro_per_page";
    $pro_result = $conn->query($sql);
}
}

?>