<?php include("connection.php");
$id= $_GET['id'];



$query = "DELETE FROM DETAILS where id= '$id'";
$data = mysqli_query($connection, $query);

if ($data)
 {
    echo "<script>alert('Record Deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />

    <?php
}
else
{
    echo "Failed to delete";
}
