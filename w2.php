<?php
    error_reporting(E_ALL);
    include("connection.php");

    if(isset($_POST['upload']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $rno = $_POST['rno'];
        $dept = $_POST['dept'];
        $company_name = $_POST['company_name'];
        $online_offline = $_POST['online_offline'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $still_continuing = isset($_POST['still_continuing']) ? 'Yes' : 'No';
        $domain = $_POST['domain'];
        $paid_free = $_POST['paid_free'];
        $status = $_POST['status'];

       
        $certificate_name = $_FILES["certificate_upload"]["name"];
        $certificate_tempname = $_FILES["certificate_upload"]["tmp_name"];
        $certificate_folder = "certificates/".$certificate_name;
        move_uploaded_file($certificate_tempname, $certificate_folder);

        $reference = $_POST['reference'];

        // Modify your SQL query to use the correct table name and field names
        $query = "INSERT INTO upload_form (fname, lname, rno, dept, company_name, online_offline, start_date, end_date, still_continuing, domain, paid_free, status, certificate_upload, reference) VALUES ('$fname', '$lname', '$rno', '$dept', '$company_name', '$online_offline', '$start_date', '$end_date', '$still_continuing', '$domain', '$paid_free', '$status', '$certificate_folder', '$reference')";
       
        $data = mysqli_query($connection, $query);
   
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


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
       <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" name="uploadForm">

        <div class="title">
            Upload Form
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
                <label>Roll Number</label>
                <input type="text" class="input" name="rno" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Department</label>
                <input type="text" class="input" name="dept" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Company Name</label>
                <input type="text" class="input" name="company_name" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Online/Offline</label>
                <select name="online_offline" required>
                    <option value="">Select</option>
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                </select>
            </div>
            <div class="input_field">
                <label>Start Date</label>
                <input type="date" class="input" name="start_date" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>End Date</label>
                <input type="date" class="input" name="end_date" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Is it still continuing?</label>
                <input type="checkbox" name="still_continuing" value="yes">
            </div>
            <div class="input_field">
                <label>Domain</label>
                <input type="text" class="input" name="domain" required style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Paid/Free</label>
                <select name="paid_free" required>
                    <option value="">Select</option>
                    <option value="paid">Paid</option>
                    <option value="free">Free</option>
                </select>
            </div>
            <div class="input_field">
                <label>Status</label>
                <select name="status" required>
                    <option value="">Select</option>
                    <option value="completed">Completed</option>
                    <option value="ongoing">Ongoing</option>
                </select>
            </div>
            <div class="input_field">
                <label>Certificate Upload</label>
                <input type="file" name="certificate_upload" style="width: 100%;">
            </div>
            <div class="input_field">
                <label>Reference</label>
                <textarea class="textarea" name="reference" style="width: 100%;"></textarea>
            </div>
            <div class="input_field">
                <input type="submit" value="Upload" class="btn" name="upload">
            </div>
        </div>
    </form>
</div>
</body>
<script>
    function validateForm() {
        var fname = document.forms["uploadForm"]["fname"].value;
        var lname = document.forms["uploadForm"]["lname"].value;
        var rno = document.forms["uploadForm"]["rno"].value;
        var dept = document.forms["uploadForm"]["dept"].value;
        var company_name = document.forms["uploadForm"]["company_name"].value;
        var online_offline = document.forms["uploadForm"]["online_offline"].value;
        var start_date = document.forms["uploadForm"]["start_date"].value;
        var end_date = document.forms["uploadForm"]["end_date"].value;
        var domain = document.forms["uploadForm"]["domain"].value;
        var paid_free = document.forms["uploadForm"]["paid_free"].value;
        var status = document.forms["uploadForm"]["status"].value;
        var certificate_upload = document.forms["uploadForm"]["certificate_upload"].value;

        if (fname == "" || lname == "" || rno == "" || dept == "" || company_name == "" || online_offline == "" || start_date == "" || end_date == "" || domain == "" || paid_free == "" || status == "") {
            alert("All fields must be filled out");
            return false;
        }
        return true;
    }
</script>
</html>