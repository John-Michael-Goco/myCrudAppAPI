<?php
require "./connect.php";

$sql = "SELECT studentID, name, address, email, phoneNumber, course 
    FROM students WHERE lStatus != 'Deleted' ORDER BY studentID ASC";

$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $students]);
} else {
    echo json_encode(["status" => "failed", "message" => "No students found."]);
}

$conn->close();
