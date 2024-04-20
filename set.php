<?php
// Start PHP code block

// You can put PHP code here if needed, like including other PHP files, defining functions, etc.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Monitoring System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="set.css">
    <link rel="stylesheet" href="dept.css">
</head>
<body>
    <header>
        <h1>Internship Monitoring System</h1>
    </header>
    <form method="GET" action="search.php">
        <div class="search-bar">
            <input type="text" id="searchInput" name="query" placeholder="Search...">
            <button onclick="search()">Search</button>
        </div>
    </form>
        

    <div class="profile-menu">
        <i class="fas fa-user"></i>
    </div>
    <br>
    <div class="profile-icon">
        <br><br>
        <a href="prof.html">Profile</a>
        <br><br><br><br><br>
    </div>

    <div class="box">
        <div class="nav-container">
            <div class="nav-item">
                <div class="icon-container">
                    <i class="fas fa-building"></i>
                </div>
                <div id="tooltip">
                    <span id="tooltipText">
                        <ul>
                                <li><a href="cse_students.php">Computer Science Engineering</a></li>
                                <li><a href="eee_students.php">Electrical and Electronics Engineering</a></li>
                                <li><a href="ece_students.php">Electronics and Communication Engineering</a></li>
                                <li><a href="it_students.php">Information Technology</a></li>
                                <li><a href="csm_students.php">Computer Science and Mathematics</a></li>

                        </ul>
                    </span>
                    <span>Departments</span>
                </div>
            </div>
            <div class="nav-item">
                <div class="icon-container">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div id="tooltip">
                    <span id="tooltipText">
                        <ul>
                            <li><a href="web_students.php">Web Development</a></li>
                            <li><a href="mobile_students.php">Mobile Computing</a></li>
                            <li><a href="ai_students.php">Artificial Intelligence</a></li>
                            <li><a href="ml_students.php">Machine Learning</a></li>
                            <li><a href="data_science_students.php">Data Science</a></li>
                            <li><a href="cybersecurity_students.php">Cyber Security</a></li>
                        </ul>
                    </span>
                    <span>Domain</span>
                </div>
            </div>
            
            <div class="nav-item">
                <a href="w2.php">
                    <div class="icon-container">
                        <i class="fas fa-upload"></i>
                    </div>
                </a>
                <div id="tooltip">
                <a href="w2.php">Upload</a>
            </div>
        </div>
            <div class="nav-item">
                <a href="#testimonials">
                    <div class="icon-container">
                        <i class="fas fa-comments"></i>
                    </div>
                </a>
               <div id="tooltip">
                <a href="testimonials.php">Testimonials</a>
            </div>
        </div>
    </div>
    
    
    <script src="scripts.js"></script> <!-- Import your JavaScript file -->
</body>
</html>

<?php
// End PHP code block

// You can put more PHP code here if needed
?>
