<?php
require "./connect.php";

$studentNumber = $_POST["studentNumber"];

$sql = "SELECT studentID, name, address, email, phoneNumber, course 
        FROM students WHERE `studentID` = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $studentNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    $student = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $student]);
    } else {
        echo json_encode(["status" => "failed", "message" => "No student found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "failed", "message" => "Error preparing statement: " . $conn->error]);
}

$conn->close();