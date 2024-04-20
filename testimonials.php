<?php include("connection.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
       <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" name="testimonialsForm">

        <div class="title">
            Testimonials
        </div>

        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Roll No</label>
                <input type="text" class="input" name="rno" required style="width: 100%;">   
            </div>
            <div class="input_field">
                <label>Testimonials</label>
                <textarea class="textarea" name="testimonials" style="width: 100%;"></textarea>
            </div>
            <div class="input_field">
                <button type="submit" name="submit" class="btn">Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $rno = $_POST['rno'];
        $testimonials = $_POST['testimonials'];
        
        // Modify your SQL query to use the correct table name and field names
        $query = "INSERT INTO testimonials_form (fname, lname, rno, testimonials) VALUES ('$fname', '$lname', '$rno', '$testimonials')";
        
        $data = mysqli_query($connection, $query);
    
        if($data) {
            echo "<script>alert('Data Inserted into Database')</script>";
        } else {
            echo "Failed";
        }
    }
?>
