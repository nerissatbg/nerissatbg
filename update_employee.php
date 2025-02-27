<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$sql = "UPDATE employees SET name='{$data['name']}', email='{$data['email']}', division_id='{$data['division_id']}' WHERE employee_id={$data['employee_id']}";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Employee updated successfully"]);
} else {
    echo json_encode(["error" => "Failed to update employee"]);
}
?>