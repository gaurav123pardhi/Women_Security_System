<?php
// Step 1: Connect to Database
$conn = new mysqli("localhost", "root", "", "safeher");

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Get latitude & longitude from POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Step 4: Save current timestamp
$timestamp = date("Y-m-d H:i:s");

// Step 5: Insert into database
$sql = "INSERT INTO locations (latitude, longitude, timestamp) VALUES ('$latitude', '$longitude', '$timestamp')";

if ($conn->query($sql) === TRUE) {
    echo "Location saved successfully";
} else {
    echo "Error: " . $conn->error;
}

// Step 6: Close connection
$conn->close();
?>
