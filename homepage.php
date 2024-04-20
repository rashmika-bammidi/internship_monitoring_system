<?php
error_reporting(E_ALL); 
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Monitoring System</title>
    <link rel="stylesheet" type="text/css" href="homepage-stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body>
    <header>
        <h1>Internship Monitoring System</h1>
    </header>
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="search()">Search</button>
    </div>
    <div class="profile-menu">
        <i class="fas fa-user"></i>
        <!-- You can add dynamic content here -->
    </div>
    <br>
    <div class="profile-icon"><br><br>
        <a href="prof.php">Profile</a>
    <br><br><Br><br><Br>
    </div>

    <div class="box">
        <div class="nav-container">&nbsp;&nbsp;&nbsp;
            <div class="nav-item">
                <a href="department.php">
                    <div class="icon-container">
                        <i class="fas fa-building"></i>
                    </div>
                </a>
                <br>
                <a href="dept.php">Department</a>
            </div>
            <div class="nav-item">
                <a href="domain.php">
                    <div class="icon-container">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                </a>
                <br>
                <a href="domain.php">Domain</a>
            </div>
            <div class="nav-item">
                <a href="#upload">
                    <div class="icon-container">
                        <i class="fas fa-upload"></i>
                    </div>
                </a>
                <br>
                <a href="upload.php">Upload</a>
            </div>
            <div class="nav-item">
                <a href="#testimonials">
                    <div class="icon-container">
                        <i class="fas fa-comments"></i>
                    </div>
                </a>
                <br>
                <a href="test.php">Testimonials</a>
            </div>
        </div>
    </div>
    
    <script>
        function search() {
            var searchInput = document.getElementById("searchInput").value;
            // Implement logic to handle search query (e.g., AJAX request to backend)
            console.log("Search query: " + searchInput);
        }
    </script>
</body>
</html>

<?php
error_reporting(E_ALL); 
include("connection.php");

if(isset($_POST['search'])) {
    $searchInput = $_POST['searchInput']; // Assuming the name of the input field is 'searchInput'

    // Construct the SQL query to search for records based on multiple fields
    $query = "SELECT * FROM DETAILS WHERE ";
    $query .= "id LIKE '%$searchInput%' OR ";
    $query .= "rno LIKE '%$searchInput%' OR ";
    $query .= "email LIKE '%$searchInput%' OR ";
    $query .= "fname LIKE '%$searchInput%' OR ";
    $query .= "lname LIKE '%$searchInput%' OR ";
    $query .= "dept LIKE '%$searchInput%' OR ";
    $query .= "domain LIKE '%$searchInput%'";

    // Execute the query
    $result = mysqli_query($connection, $query);

    if($result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through the rows and display the results
            while ($row = mysqli_fetch_assoc($result)) {
                // Output or process each row as needed
                echo "ID: " . $row['id'] . ", Name: " . $row['fname'] . " " . $row['lname'] . ", Roll Number: " . $row['rno'] . "<br>";
                // Add more fields as needed
            }
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
