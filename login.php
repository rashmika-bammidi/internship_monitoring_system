<?php
session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="login-style.css">
		<title>Login </title>
	</head>
	<body>
		<div class="center">
			<h1>Login</h1>

			<form action="#" method="POST" autocomplete="off">
			<div class="form">
				<input type="text" name="rollnumber" class="textfeild" placeholder="roll number">
				<input type="password" name="password" class="textfeild" placeholder="password">
			<div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password</a></div>
			 <input type="submit" name="login" value="Login" class="btn">
			 <div class="signup">New Member?<a href="#" class="link">Sign up here</a></div>

			</div>
		</div>
	</form>
		<script>
			function message()
			{
				alert("please remember your password");
			}
		</script>

	</body>

</html>
<?php

include("connection.php");
if(isset($_POST['login']))
{
	$rollnumber=$_POST['rollnumber'];
	$pwd=$_POST['password'];


	$query="SELECT *FROM details WHERE rno='$rollnumber' && password='$pwd' ";
	
	$data=mysqli_query($connection,$query);

	$total=mysqli_num_rows($data);
	// echo $total;
   
//if details provided in login page are correct then redirect it to display.ph 
    if($total==1)
    {
    	$_SESSION['roll_number']=$rollnumber;
       header('location:display.php');
    }
    else
    {
    	echo "Login Failed";
    }
}
?>