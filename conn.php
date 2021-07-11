<?php


$host="localhost";
$User="cl23-ws-c9z";
$password="EeyFKs^ds";
$db="cl23-ws-c9z";

// Create connection
$conn = new mysqli($host, $User, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

error_reporting(0);



?>