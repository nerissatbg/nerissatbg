<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);
$sql = "DELETE FROM employees WHERE employee_id={$data['employee_id']}";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Employee deleted successfully"]);
} else {
    echo json_encode(["error" => "Failed to delete employee"]);
}
?>