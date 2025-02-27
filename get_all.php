<?php
include "db.php";

$sql = "SELECT * FROM view_division_employees";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>