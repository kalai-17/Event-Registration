<?php
// Capture form data
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$phonenumber = $_POST["phonenumber"];
$collegename = $_POST["collegename"];
$course = $_POST["course"];

// Create connection
$conn = new mysqli('localhost', 'root', '1234', 'db_college_registration');

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations (firstname, lastname, email, gender, phonenumber, collegename, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstname, $lastname, $email, $gender, $phonenumber, $collegename, $course);

    // Execute statement
    if ($stmt->execute()) {
        echo "Registration successful...";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
