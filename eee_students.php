<?php
// Database connection details
$db_host = 'localhost';
$db_user = 'root';
$db_password = ''; // No password set for root by default
$db_name = 'registration_form';

// Create a connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students from the EEE department
$sql = "SELECT * FROM details WHERE dept='EEE'";
$result = $conn->query($sql);

// Display students
echo "<h2>Students in Electrical and Electronics Engineering Department</h2>";
if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["fname"] . " " . $row["lname"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No students found in the Electrical and Electronics Engineering department.";
}

// Close connection
$conn->close();
?>
