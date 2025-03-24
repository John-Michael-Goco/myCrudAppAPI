<?php
require "./connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNumber = $_POST["studentNumber"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $course = $_POST["course"];
    $status = "Listed";

    // Check if the student already exists
    $checkSql = "SELECT * FROM `students` WHERE `studentID` = ? AND `lStatus` = ?";
    if ($checkStmt = $conn->prepare($checkSql)) {
        $checkStmt->bind_param("ss", $studentNumber, $status);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(["status" => "exists", "message" => "Student already registered."]);
        } else {
            // Insert the new student
            $sql = "INSERT INTO `students` (`studentID`, `name`, `address`, `email`, `phoneNumber`, `course`, `lStatus`)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssssss", $studentNumber, $name, $address, $email, $phoneNumber, $course, $status);

                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Registered"]);
                } else {
                    echo json_encode(["status" => "failed", "message" => "Error: " . $stmt->error]);
                }
                $stmt->close();
            } else {
                echo json_encode(["status" => "failed", "message" => "Error preparing statement: " . $conn->error]);
            }
        }
        $checkStmt->close();
    } else {
        echo json_encode(["status" => "failed", "message" => "Error preparing check statement: " . $conn->error]);
    }
}

$conn->close();
