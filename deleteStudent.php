<?php
require "./connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = isset($_POST['studentID']) ? $conn->real_escape_string($_POST['studentID']) : '';

    if (!empty($studentID)) {
        $sql = "UPDATE `students` SET lStatus = 'Deleted', `updated_at` = NOW() WHERE studentID = '$studentID'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Student Deleted Successfully"]);
        } else {
            echo json_encode(["status" => "failed", "message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "failed", "message" => "Invalid student ID"]);
    }
} else {
    echo json_encode(["status" => "failed", "message" => "Invalid request method"]);
}

$conn->close();
