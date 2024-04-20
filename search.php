<?php
// Check if the query parameter is set in the URL
if(isset($_GET['query'])) {
    // Get the search query from the URL
    $search_query = $_GET['query'];

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

    // Perform search query
    $sql = "SELECT * FROM details WHERE 
                fname LIKE '%$search_query%' OR 
                lname LIKE '%$search_query%' OR 
                rno LIKE '%$search_query%' OR 
                password LIKE '%$search_query%' OR 
                conpassword LIKE '%$search_query%' OR 
                gender LIKE '%$search_query%' OR 
                email LIKE '%$search_query%' OR 
                dept LIKE '%$search_query%' OR 
                domain LIKE '%$search_query%'";
    $result = $conn->query($sql);

    // Output search results
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
            echo "Roll No: " . $row["rno"]. "<br>";
            echo "Email: " . $row["email"]. "<br>";
            echo "Department: " . $row["dept"]. "<br>";
            // Output other details as needed
            echo "<br>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
}
?>
