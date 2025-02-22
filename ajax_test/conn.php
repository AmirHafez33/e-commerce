<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DBNAME', 'ajaxtest');

$conn = new mysqli(HOST , USER , PASSWORD , DBNAME);

$conn->set_charset("utf8");
?>