
<?php
session_start();
// echo "Welcome".$_SESSION['roll_number'];
?>

<html>
<head>
   <title>Dispaly</title>
   <style>
   body
   {
      background: #D071F9;
   }
   table
   {
      background-color:white ;
   }
   .update, .delete
   {
      background-color: green;
      color: white;
      border: 0;
      outline: none;
      border-radius: 5px;
      height: 23px;
      width:80px;
      font-weight: bold;
      cursor: pointer;
   }
   .delete
   {
     background-color: red;
   }
</style>
</head>

</html>
<?php

include("connection.php");
// Enable error reporting for debugging
error_reporting(0);
// ini_set('display_errors', 1);



$rollno=$_SESSION['roll_number'];

if($rollno== true)
{

}
else
{
   header('location:login.php');
}

$query = "SELECT * FROM DETAILS";
$data = mysqli_query($connection, $query);

// Check if query execution was successful
if (!$data) {
    echo "Error: " . mysqli_error($connection);
    exit();
}

$total = mysqli_num_rows($data);

if ($total != 0) 
{
   ?>
   <h2 align="center"><mark>Displaying all records</mark></h2>
 <center><table border="1px" cellspacing="7px" width="100%">
   <tr>
   <th width="5%">id</th>
   <th width="5%">Image</th>
    <th width="10%">First Name</th>
    <th width="10">Last Name</th>
    <th width="10%">Roll Number</th>
    <th width="7%">Gender</th>
    <th width="18%">Email</th>
    <th width="8%"> Phn Num</th>
    <th width="7%"> Department</th>
    <th width="7%"> Domain</th>
    <th width="15%">Address</th>
    <th width="12%">Operations</th>
   </tr>

   <?php
    while ($result = mysqli_fetch_assoc($data)) 
    {
        echo "<tr>
        <td>".$result['id']."</td>
        <td><img src='".$result['std_image']."' height='100px' width='100px'></td>
     <td>".$result['fname']."</td>
      <td>".$result['lname']."</td>
      <td>".$result['rno']."</td>
      <td>".$result['gender']."</td>
      <td>".$result['email']."</td>
      <td>".$result['phone']."</td>
      <td>".$result['dept']."</td>
      <td>".$result['domain']."</td>
      <td>".$result['address']."</td>
      <td><a href='update_design.php?id=$result[id]'><input type='submit' value='update' class='update'></a>
      <a href='delete_design.php?id=$result[id]'><input type='submit' value='delete' class='delete' onclick='return checkdelete()'></a></td>
   </tr>";
}

} else {
    echo "No records found";
}

?>

</table>
</center>


<a href="logout.php"><input type="submit" name="" value="logout" style="background-color: blue; color: white; height: 35px width:100px; margin-top: 20px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer;"></a>
<br>

<a href="set.php"><h3><center>View the home page by clicking this</center></h3></a>

<script>
   function checkdelete()
   {
      return confirm('Are you sure you want to delete this record ?');
   }

</script>