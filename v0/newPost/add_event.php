<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "events";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gather data for the new post
$title = $_POST["name"];
$description = $_POST["description"];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO events (date, description, name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

if (!$stmt->bind_param("sss", $date, $description, $title)) {
    die("Binding parameters failed: " . $stmt->error);
}

if ($stmt->execute()) {
    header("Location: ../list/list.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
