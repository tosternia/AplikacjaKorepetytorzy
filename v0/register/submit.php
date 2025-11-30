<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logowanie_ogloszenia";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$class = $_POST['class'];
$subject = $_POST['subject'];

$sql = "INSERT INTO interests (UserID, Subject, Grade) VALUES (1, '$subject', '$class')"; // Załóżmy, że UserID=1

if ($conn->query($sql) === TRUE) {
  header("Location: ../hub/hub.php");
  exit();
} else {
  echo "Błąd: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
