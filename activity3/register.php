<?php

$db = new mysqli("localhost", "root", "", "db1");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Check if the email is already in use
$query = "SELECT email FROM signup WHERE email = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
   
    echo "Email is already in use.";
    $stmt->close();
    $db->close();
    exit; 
}


$query = "SELECT username FROM signup WHERE username = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    
    echo "Username is already in use.";
    $stmt->close();
    $db->close();
    exit; 
}

// Insert user data into the database
$query = "INSERT INTO signup (username, email, password) VALUES (?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
?>


