<?php
require "./connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNumberOrig = $_POST['studentNumberOrig'];
    $studentNumber = $_POST['studentNumber'];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $course = $_POST["course"];

    $sql = "UPDATE `students` 
                SET studentID = ?, 
                    name = ?, 
                    address = ?, 
                    email = ?, 
                    phoneNumber = ?, 
                    course = ?, 
                    updated_at = NOW() 
                WHERE studentID = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters ("sssssss" indicates 7 string parameters)
        $stmt->bind_param("sssssss", $studentNumber, $name, $address, $email, $phoneNumber, $course, $studentNumberOrig);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Details Updated"]);
        } else {
            echo json_encode(["status" => "failed", "message" => "Error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "failed", "message" => "Error preparing statement: " . $conn->error]);
    }
}

$conn->close();