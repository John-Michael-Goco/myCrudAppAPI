<?php
require "./connect.php";

$studentNumber = $_POST["studentNumber"];

$sql = "SELECT studentID, name, address, email, phoneNumber, course 
        FROM students WHERE `studentID` = '$studentNumber'";

$result = $conn->query($sql);

$student = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $student[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $student]);
} else {
    echo json_encode(["status" => "failed", "message" => "No student found."]);
}
