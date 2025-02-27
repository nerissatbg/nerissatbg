<?php
header("Content-Type: application/json");
include "db.php";

// Ambil data JSON dari request
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Cek apakah data yang dibutuhkan ada
if (!isset($data['name'], $data['email'], $data['division_id'])) {
    echo json_encode(["error" => "Data tidak lengkap"]);
    exit;
}

$name = $data['name'];
$email = $data['email'];
$division_id = $data['division_id'];

// Cek apakah email sudah ada di database
$check_email = $conn->query("SELECT * FROM employees WHERE email = '$email'");
if ($check_email->num_rows > 0) {
    echo json_encode(["error" => "Email sudah digunakan, gunakan email lain"]);
    exit;
}

// Cek apakah division_id ada di tabel divisions
$check_division = $conn->query("SELECT * FROM divisions WHERE division_id = '$division_id'");
if ($check_division->num_rows == 0) {
    echo json_encode(["error" => "Division ID tidak ditemukan"]);
    exit;
}

// Masukkan data ke tabel employees
$sql = "INSERT INTO employees (name, email, division_id) VALUES ('$name', '$email', '$division_id')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Employee berhasil ditambahkan"]);
} else {
    echo json_encode(["error" => "Gagal menambahkan employee: " . $conn->error]);
}
?>