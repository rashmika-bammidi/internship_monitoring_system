<?php
error_reporting(E_ALL); 
 include("connection.php");?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Php Crud Operations</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
       <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

        <div class="title">
            Registration Form
        </div>

        <div class="form">
        <div class="input_field" >
            <label>Upload Image</label>
            <input type="file" name="uploadfile" style="width: 100%;">
        </div>

        <div class="input_field">
            <label>First Name</label>
            <input type="text" class="input" name="fname" required style="width: 100%;">
        </div>
        <div class="input_field">
            <label>Last Name</label>
            <input type="text" class="input" name="lname" required style="width: 100%;">
        </div>
        <div class="input_field">
            <label>Roll Number</label>
            <input type="text" class="input" name="rno" required style="width: 100%;">
        </div>
        <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="password" required style="width: 100%;">
        </div>
        <div class="input_field">
            <label>Confirm Password</label>
            <input type="password" class="input" name="conpassword" required style="width: 100%;">
        </div>
        <div class="input_field">
            <label>Gender</label>
            <div class="custom_select">
            <select name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        </div>
        <div class="input_field">
            <label>Email</label>
            <input type="text" class="input" name="email" required style="width: 100%;">
        </div>
        <div class="input_field">
            <label>Phn</label>
            <input type="text" class="input" name="phone" required style="width: 100%;">
        </div>
        <div class="input_field" >
            <label style="margin-right:100px;">Department</label>
            <input type="radio"  name="r1" value="CSE" required><label style="margin-left:5px;">CSE</label>
            <input type="radio"  name="r1" value="CSM" required><label style="margin-left:5px;">CSM</label>
            <input type="radio"  name="r1" value="IT" required><label style="margin-left:5px;">IT</label>
            <input type="radio"  name="r1" value="ECE" required><label style="margin-left:5px;">ECE</label>
            <input type="radio"  name="r1" value="EEE" required><label style="margin-left:5px;">EEE</label>
        </div>
        <div class="input_field" >
    <label style="margin-right:100px;">Domain</label>
    <input type="checkbox" name="domain[]" value="AI"><label style="margin-left:5px;">AI</label>
    <input type="checkbox" name="domain[]" value="ML"><label style="margin-left:5px;">ML</label>
    <input type="checkbox" name="domain[]" value="Cyber Security"><label style="margin-left:5px;">Cyber Security</label>
    <input type="checkbox" name="domain[]" value="Web Dev"><label style="margin-left:5px;">Web Dev</label>
    <input type="checkbox" name="domain[]" value="Data Science"><label style="margin-left:5px;">Data Science</label>
</div>
        <div class="input_field">
            <label>Address</label>
            <textarea class="textarea" name="address" required style="width: 100%;"></textarea>
        </div>
         <div class="input_field terms">
            <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            </label>
            <p>agree to terms and conditions</p>
        </div>
      <div class="input_field">
          
        <input type="submit" value="register" class="btn" name="register">
      </div>
      <div>
          
        <a href="login.php"><h3><center>Login Here</center></h3></a>
      </div>
    </div>

</form>
</div>
</body>
<script>
    function validateForm() {
        var checkboxes = document.querySelectorAll('input[name="domain[]"]:checked');
        if (checkboxes.length < 1) {
            alert("Please select at least one domain.");
            return false;
        }
        return true;
    }
</script>
</html>


<?php
    if(isset($_POST['register'])) 
    {

        $filename= $_FILES["uploadfile"]["name"];
        $tempname= $_FILES["uploadfile"]["tmp_name"];
        // $filename is nothing but your selected image which is kept in $folder
        $folder="images/".$filename;
        // echo $folder;
        move_uploaded_file($tempname, $folder);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $rno = $_POST['rno'];
        $pwd = $_POST['password'];
        $cpwd = $_POST['conpassword'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['r1'];

       $domain = $_POST['domain'];
        $domain1 = implode(",", $domain);


        $address = $_POST['address'];

        
        $query="INSERT INTO DETAILS (std_image,fname,lname,rno,password,conpassword,gender,email,phone,dept,domain,address) VALUES('$folder','$fname','$lname','$rno','$pwd','$cpwd','$gender','$email','$phone','$dept','$domain1','$address')";
        $data=mysqli_query($connection,$query);
    
        if($data)
        {
            echo "<script> alert('Data Inserted into Database')</script>";
        }
        else
        {
            echo "<script> alert('Failed to insert')</script>" . mysqli_error($connection);
        }
}
?>
