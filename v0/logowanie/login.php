<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logowanie_ogloszenia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: ../hub/hub.html");
} else {
    session_start();    
    $_SESSION['username'] = $username;
    header("Location: blad.php");
}

$conn->close();
?>
