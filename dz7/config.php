<?php

$host = '10.0.0.240';
$user = 'root';
$password = '111111';
$database = 'brand'; 


$dbcnx = @mysqli_connect($host, $user, $password, $database) or die ("Ошибка: " . mysqli_connect_error());
mysqli_set_charset($dbcnx, "utf8");
