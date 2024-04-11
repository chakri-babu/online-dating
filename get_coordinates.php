<?php
// Connect to MySQL database
$servername = "chakri-babu.github.io";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "location-tracker"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch coordinates from database
$sql = "SELECT * FROM `location`";

// Execute SQL statement
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    $coordinates = array();
    while($row = $result->fetch_assoc()) {
        $coordinates[] = array("latitude" => $row["latitude"], "longitude" => $row["longitude"]);
    }
    echo json_encode($coordinates); // Output coordinates as JSON
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
