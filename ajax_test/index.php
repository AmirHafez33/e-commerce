<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
   
</head>
<body>

<form class="form">
    <div>
        <input type="text" placeholder="username" name="name">
    </div>
    <br>
    <div>
        <input type="text" placeholder="phone number" name="phone">
    </div>
    <br>
    <div>
        <input type="email" placeholder="email" name="email">
    </div>
    <br>
    <div>
        <input type="text" placeholder="message" name="message">
    </div>
    <br>
    <div>
        <input type="submit" placeholder="submit" value="submit">
    </div>
</form>

<script src="js/ajax.js"></script>

    
</body>
</html>