<?php

$host     = "localhost";      
$username = "root";          
$password = "";              
$db       = "school_project"; 

mysqli_report(MYSQLI_REPORT_OFF);

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
