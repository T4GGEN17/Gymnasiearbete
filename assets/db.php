<?php
$servername = "localhost";
$username = "Redbull-admin";
$password = "1234";
$database = "mydb";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Databasanslutningen misslyckades: "
        . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>