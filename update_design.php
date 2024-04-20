<?php include("connection.php");


session_start();
// echo "Welcome".$_SESSION['roll_number'];

$id= $_GET['id'];

$rollno=$_SESSION['roll_number'];

if($rollno== true)
{

}
else
{
   header('location:login.php');
}


$query = "SELECT * FROM DETAILS where id= '$id'";
$data = mysqli_query($connection, $query);
$result = mysqli_fetch_assoc($data);
 
$domain= $result['domain'];
$domain1=explode(",",$domain);
 
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewpoint" connect="width=device-width, initial-scale=1">
    <title>Php Crud Operations</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            <h4 align="center"><mark>Update Student Details</mark></h4>
        </div>
        <div class="form">
        <div class="input_field">
            <label>First Name</label>
            <input type="text" value="<?php echo $result['fname']?>"class="input" name="fname" required style="width: 300px; height: 30px;">
        </div>
        <div class="input_field">
            <label>Last Name</label>
            <input type="text" value="<?php echo $result['lname']?>" class="input" name="lname" required style="width: 300px; height: 30px;">
        </div>
        <div class="input_field">
            <label>Roll Number</label>
            <input type="text" value="<?php echo $result['rno']?>" class="input" name="rno" required style="width: 300px; height: 30px;">
        </div>
        <div class="input_field">
            <label>Password</label>
            <input type="password" value="<?php echo $result['password']?>" class="input" name="password" required style="width: 300px; height: 30px;">
        </div>
        <div class="input_field">
            <label>Confirm Password</label>
            <input type="password" value="<?php echo $result['conpassword']?>" class="input" name="conpassword" required style="width: 300px; height: 30px;">
        </div>
        <div class="input_field">
            <label>Gender</label>
            <div class="custom_select">
            <select name="gender" required style="width: 300px; height: 30px;">
                <option value="">Select</option>

                <option value="male"
                  <?php
                       if($result['gender']=='male')
                       {
                         echo "selected";
                       }
                  ?>
                >

                Male</option>
                <option value="female"
                 <?php
                       if($result['gender']=='female')
                       {
                         echo "selected";
                       }
                  ?>
                 >
             Female</option>
            </select>
        </div>

        </div>
        <div class="input_field">
            <label>Email</label>
            <input type="text" value="<?php echo $result['email']?>" class="input" name="email" required style="width: 300px; height: 30px;"> <!-- Fixed typo here -->
        </div>
        <div class="input_field">
            <label>Phn</label>
            <input type="text" value="<?php echo $result['phone']?>" class="input" name="phone" required style="width: 300px; height: 30px;">
        </div>
        <div class="input_field" >
            <label style="margin-right:100px;">Department</label>
            <input type="radio"  name="r1" value="CSE" required
            
             <?php
                 if($result['dept']=="CSE")
                 {
                    echo "checked";
                 }
             ?>

            ><label style="margin-left:5px;">CSE</label>
            <input type="radio"  name="r1" value="CSM" required
              <?php
                 if($result['dept']=="CSM")
                 {
                    echo "checked";
                 }
             ?>
            ><label style="margin-left:5px;">CSM</label>
            <input type="radio"  name="r1" value="IT" required
             <?php
                 if($result['dept']=="IT")
                 {
                    echo "checked";
                 }
             ?>
            ><label style="margin-left:5px;">IT</label>
            <input type="radio"  name="r1" value="ECE" required
              <?php
                 if($result['dept']=="ECE")
                 {
                    echo "checked";
                 }
             ?>
            ><label style="margin-left:5px;">ECE</label>
            <input type="radio"  name="r1" value="EEE" required
              <?php
                 if($result['dept']=="EEE")
                 {
                    echo "checked";
                 }
             ?>
            ><label style="margin-left:5px;">EEE</label>
        </div>


        <div class="input_field" >
          <label style="margin-right:100px;">Domain</label>

          <input type="checkbox" name="domain[]" value="AI" 
           <?php
               if(in_array('AI', $domain1))
               {
                echo "checked";
               }  
           ?>          
           >
          <label style="margin-left:5px;">AI</label>

          <input type="checkbox" name="domain[]" value="ML"
         <?php
               if(in_array('ML', $domain1))
               {
                echo "checked";
               }  
           ?>    
          >
          <label style="margin-left:5px;">ML</label>

          <input type="checkbox" name="domain[]" value="Cyber Security"
           <?php
               if(in_array('Cyber Security', $domain1))
               {
                echo "checked";
               }  
           ?>    
          >
          <label style="margin-left:5px;">Cyber Security</label>

          <input type="checkbox" name="domain[]" value="Web Dev"
           <?php
               if(in_array('Web Dev', $domain1))
               {
                echo "checked";
               }  
           ?>    
          >
          <label style="margin-left:5px;">Web Dev</label>

          <input type="checkbox" name="domain[]" value="Data Science"
        <?php
               if(in_array('Data Science', $domain1))
               {
                echo "checked";
               }  
           ?>    
          >
          <label style="margin-left:5px;">Data Science</label>

        </div>
        <div class="input_field">
            <label>Address</label>
            <textarea class="textarea" name="address" required style="width: 300px; height: 30px;"><?php echo $result['address']; ?>
            </textarea>
        </div>
         <div class="input_field terms">
            <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            </label>
            <p>agree to terms and conditions</p>
        </div>
      <div class="input_field">
          
        <input type="submit" value="Update Details" class="btn" name="update">
      </div>
    </div>
</form>
</div>
</body>
</html>


<?php
    if($_POST['update'])
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $rno = $_POST['rno'];
        $pwd = $_POST['password'];
        $cpwd = $_POST['conpassword'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['r1'];

         $dom = $_POST['domain'];
        $dom1= implode(",",$dom);


        $address = $_POST['address'];


           $query="UPDATE details set fname='$fname',lname='$lname',rno='$rno',password='$pwd',conpassword='$cpwd',gender='$gender',email='$email',phone='$phone',dept='$dept',
               domain='$dom1',address='$address' where id='$id'";


        $data=mysqli_query($connection,$query);
    
        if($data)
        {
            echo "<script>alert('Record Updated')</script>";
            ?>
            
             <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />
     <!-- after 5 secs it goes to previos displaypage after updating -->
     <!-- url  is your localhost crud  -->
            <?php

        }
        else
        {
            echo "Failed";
        }
}
?>
