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
    $checkSql = "SELECT * FROM `students` WHERE `studentID` = '$studentNumber' AND `lStatus` = 'Listed'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // Student already registered
        echo json_encode(["status" => "exists", "message" => "Student already registered."]);
    } else {
        // Insert the new student
        $sql = "INSERT INTO `students` (`studentID`, `name`, `address`, `email`, `phoneNumber`, `course`, `lStatus`)
        VALUES ('$studentNumber', '$name', '$address', '$email', '$phoneNumber', '$course', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Registered"]);
        } else {
            echo json_encode(["status" => "failed", "message" => "Error: " . $conn->error]);
        }
    }
}

$conn->close();
