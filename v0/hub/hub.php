<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'logowanie_ogloszenia';
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT username FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $logged_in_user = $row['username'];
    } else {
        $logged_in_user = "Unknown";
    }

    $conn->close();
} else {
    $logged_in_user = "Not Logged";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hub2.css">
    <title>Tutoring App</title>
    <meta name="keywords" content="" />
    <meta name='description' content="" />
    <meta name='robots' content="non" />
</head>

<body>


    <header>
        <div>
        <a href="../profil/user_profile.php">
            <button type="button">
        </button> 
    </a>
    </div>

            <nav>

            <h3>My profile</h3><br>
            <h3>Welecome:  <?php echo $logged_in_user; ?></h3>
        </nav>

    </header>


    <section class="main">

        <img src="" alt="baner">

    <article class="Forum">
        <h2>Forum</h2>
        <h6>This page will be aded in the future</h6>
    </article>

    <article class="Search">
        <a href="../list/list.php">list</a>
        <h6>List of avelieble classes</h6>
    </article>

    <article class="Ranking">
        <h2>Ranking</h2>
        <h6>This page will be aded in the future</h6>
    </article>

    <article class="Calender">
        <h2>Calender</h2>
        <!-- <a href="../calender/calendar.php">Calender</a> -->
        <h6> Callender is the page where you can see all the classes you added to your list</h6>
        <h5>Calender function in unavelible right now, we are working to bring it back to work</h5>
    </section>


        <footer>
        <ul>
            <li><a href="../issue/issue.php">If you have any issues, contact us!!</a></li>
            <li><a href=""></a></li>
        </footer>


</body>

