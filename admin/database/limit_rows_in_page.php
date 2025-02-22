<?php

// Set the number of rows per page
$rows_per_page = 5;

// Get the current page number from URL, default is 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $rows_per_page;

// Get total number of rows in the table
$total_result = $conn->query("SELECT COUNT(*) AS total FROM products");
$total_rows = $total_result->fetch_assoc()['total'];

// Calculate total pages
$total_pages = ceil($total_rows / $rows_per_page);

// Fetch rows for the current page
$sql = "SELECT * FROM products LIMIT $offset, $rows_per_page";
$result = $conn->query($sql);

?>