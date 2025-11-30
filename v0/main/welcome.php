<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, content FROM threads";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS_ogłoszenia</title>
    <link rel="stylesheet" href="hub2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<body>
    <a href="../main/index.php">
    <button type="button" class="back">
    <label> <- </label>
</button>
</a>

<div class="title"><h1>MY POSTS</h1></div>

<ul>
 <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li><h2>" . $row["title"] . "</h2><p>" . $row["content"] . "</p></li>";
        }
    } else {
        echo "0 results";
    }
    ?>
    </ul>

<a href="../newPost/index.php" class="new">
    <button type="button" class="new_post">
    <label> NEW POST </label>
</button>
</a>
</button>

    <footer></footer>
</body>
</html>

<?php
$conn->close();
?>