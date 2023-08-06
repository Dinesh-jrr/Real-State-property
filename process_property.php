<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $description = $_POST["description"];

    // Database connection settings
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "realestate";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert property details into the database
    $sql = "INSERT INTO properties (title, price, location, description) VALUES ('$title', '$price', '$location', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Property Added</h2>";
        echo "<p><strong>Title:</strong> $title</p>";
        echo "<p><strong>Price:</strong> $price</p>";
        echo "<p><strong>Location:</strong> $location</p>";
        echo "<p><strong>Description:</strong> $description</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>