<?php
// Retrieve latitude and longitude from POST data
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Connect to MySQL database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "location-tracker"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert or update coordinates into database
$sql = "INSERT INTO `location` (`latitude`, `longitude`) VALUES ('$latitude', '$longitude')
        ON DUPLICATE KEY UPDATE `latitude` = '$latitude', `longitude` = '$longitude'";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Coordinates updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
