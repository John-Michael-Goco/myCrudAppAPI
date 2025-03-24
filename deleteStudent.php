<?php
require "./connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';

    if (!empty($studentID)) {
        // Prepare the SQL statement
        $sql = "UPDATE `students` SET lStatus = 'Deleted', `updated_at` = NOW() WHERE studentID = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameter
            $stmt->bind_param("s", $studentID);

            // Execute the statement
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Student Deleted Successfully"]);
            } else {
                echo json_encode(["status" => "failed", "message" => "Error: " . $stmt->error]);
            }

            // Close the statement
            $stmt->close();
        } else {
            echo json_encode(["status" => "failed", "message" => "Error preparing statement: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "failed", "message" => "Invalid student ID"]);
    }
} else {
    echo json_encode(["status" => "failed", "message" => "Invalid request method"]);
}

$conn->close();
