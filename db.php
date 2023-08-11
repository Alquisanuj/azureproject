<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $firstName = isset($_POST["First_Name"]) ? $_POST["First_Name"] : "";
    $lastName = isset($_POST["Last_Name"]) ? $_POST["Last_Name"] : "";
    $number = isset($_POST["Number"]) ? $_POST["Number"] : "";
    $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
    $message = isset($_POST["Message"]) ? $_POST["Message"] : "";

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

    // Insert form data into the database
    $sql = "INSERT INTO form_data (first_name, last_name, number, email, message) VALUES ('$firstName', '$lastName', '$number', '$email', '$message')"; // Replace 'form_data' with your table name

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form action="db.php" method="post">
    <div class="col-md-5 col-sm-5 agileits-contact-right">
        <textarea name="Message" placeholder="Message" required=""></textarea>
    </div>
    <div class="col-md-7 col-sm-7 agileits-contact-left">
        <input type="text" name="First_Name" placeholder="First Name" required="">
        <input type="text" class="email" name="Last_Name" placeholder="Last Name" required="">
        <input type="text" name="Number" placeholder="Mobile Number" required="">
        <input type="email" class="email" name="Email" placeholder="Email" required="">
        <input type="submit" value="SUBMIT">
    </div>
    <div class="clearfix"></div>
</form>

</body>
</html>

