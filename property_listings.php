<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Real Estate Property Listings</title>
</head>
<body>
    <header>
        <h1>Real Estate Properties</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Properties</a></li>
                <li><a href="#">Agents</a></li>
                <li><a href="#">Sign In</a></li>
                <li><a href="#">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="properties">
            <h2>Available Properties</h2>
            
            <?php
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

            // Retrieve property listings from the database
            $sql = "SELECT * FROM properties";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="property-listing">';
                    echo '<h3>' . $row["title"] . '</h3>';
                    echo '<p class="price">' . $row["price"] . '</p>';
                    echo '<p class="location">' . $row["location"] . '</p>';
                    echo '<p class="description">' . $row["description"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No properties available.";
            }

            $conn->close();
            ?>
            
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Real Estate Website. All rights reserved.</p>
    </footer>
</body>
</html>
