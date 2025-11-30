<?php
$eventsServername = "localhost";
$eventsUsername = "root";
$eventsPassword = "";
$eventsDatabase = "events";

$eventsConn = new mysqli($eventsServername, $eventsUsername, $eventsPassword, $eventsDatabase);

if ($eventsConn->connect_error) {
    die("Events database connection failed: " . $eventsConn->connect_error);
}

$sql = "SELECT id, name, date, description FROM events";
$result = $eventsConn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tutoring List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="../hub/hub.php">
      <button type="button">
      <label> <- </label>
  </button>
  </a>

<h2>Tutoring List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Description</th>
        <th>Add to Calendar</th>
    </tr>
    <a href="../newPost/add_event.html">add event</a>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td><button onclick='addToCalendar(" . $row["id"] . ")'>Add</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>0 results</td></tr>";
    }
    ?>
</table>

<script>
    function addToCalendar(eventId) {
        var personalServername = "localhost";
        var personalUsername = "root";
        var personalPassword = "";
        var personalDatabase = "logowanie_ogloszenia";

        var personalConn = new mysqli(personalServername, personalUsername, personalPassword, personalDatabase);

        if (personalConn.connect_error) {
            alert("Personal calendar database connection failed: " + personalConn.connect_error);
            return;
        }

        var sql = "INSERT INTO calendar (event_id) VALUES ('" + eventId + "')";
        personalConn.query(sql, function (err, result) {
            if (err) throw err;
            alert("Event with ID " + eventId + " added to personal calendar!");
            personalConn.close();
        });
    }
</script>

</body>
</html>

<?php
$eventsConn->close();
?>
