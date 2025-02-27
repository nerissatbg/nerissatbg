<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "se_nerissatobing"; // Ganti dengan nama database

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

header("Content-Type: application/json");
?>