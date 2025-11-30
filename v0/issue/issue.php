<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form action="submit.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
