<?php
// Database connection parameters
$host = "localhost";
$dbUsername = "root";
$dbPassword = "**********";
$dbName = "hostel_management_system";

// Create connection
$conn = new mysqli('localhost', 'root', '**********', 'hostel_management_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$full_name = $_POST['full_name'];
$date_of_birth = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$permanent_address = $_POST['permanent_address'];
$guardian_contact = $_POST['guardian_contact'];
$id_proof_number = $_POST['id_proof_number'];

// Prepare SQL query to insert data
$sql = "INSERT INTO students (full_name, date_of_birth, gender, blood_group, contact_number, email, permanent_address, guardian_contact, id_proof_number)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $full_name, $date_of_birth, $gender, $blood_group, $contact, $email, $permanent_address, $guardian_contact, $id_proof_number);

// Execute the query and check if the data was successfully inserted
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>