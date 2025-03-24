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
                SET studentID = '$studentNumber', 
                    name = '$name', 
                    address = '$address', 
                    email = '$email', 
                    phoneNumber = '$phoneNumber', 
                    course = '$course', 
                    updated_at = NOW() 
                WHERE studentID = '$studentNumberOrig'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Details Updated"]);
    } else {
        echo json_encode(["status" => "failed", "message" => "Error: " . $conn->error]);
    }
}
$conn->close();
