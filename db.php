<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the email input
    if (isset($_POST["Email"]) && filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST["Email"];

        // Replace with your database connection code
        $servername = "your_servername";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the email into the database
        $sql = "INSERT INTO emails (email) VALUES ('$email')"; // Replace 'emails' with your table name
        if ($conn->query($sql) === TRUE) {
            echo "Email submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid email format!";
    }
}
?>

<form action="db.php" method="post">
    <input type="email" name="Email" placeholder="Enter Your Email..." required="">
    <input type="submit" value="Send">
</form>

</body>
</html>

