<?php
session_start();
if (!isset($_SESSION['uname'])) {
 header('location:donorlogin.php');
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donor profile | Blood and Organ Donation System</title>
 
    
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
     .navbar-default {
  background-color: #dc0303;
  border-color: #dc0000;
}
.navbar-default .navbar-brand {
  color: #fafeff;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #fefefe;
}
.navbar-default .navbar-text {
  color: #fafeff;
}
.navbar-default .navbar-nav > li > a {
  color: #fafeff;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #fefefe;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #fefefe;
  background-color: #dc0000;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #fefefe;
  background-color: #dc0000;
}
.navbar-default .navbar-toggle {
  border-color: #dc0000;
}



   </style>
  
    
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Blood and Organ donation portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a></li>
      <li><a href="donorlogin.php">Donor Portal</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff Portal
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="doclogin.php">Doctor Portal</a></li>
          <li><a href="adminlogin.php">Admin</a></li>
       
        </ul>
      </li>
      
      <li><a href="#">Page 3</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li role="presentation"><a href="logout.php">Log out</a></li>
                    

          </ul>
  </div>
</nav>

        <h1>Donor Profile</h1>

<?php

require('db.php');
//include('auth2.php');
//include("auth.php"); //include auth.php file on all secure pages 
// Create connection
$conn = new mysqli("localhost", "root", "" , "project_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo $uname=$_SESSION['uname'];
$sql = "SELECT bloodonor.id, bloodonor.uname,bloodonor.pwd,bloodonor.fname,bloodonor.lname,bloodonor.email,bloodonor.gender,bloodonor.bday,bloodonor.age,bloodonor.weight,bloodonor.county,bloodonor.phone,bloodonor.postal,bloodonor.address,submit_details.dtype,submit_details.organ,submit_details.regdate FROM bloodonor,submit_details WHERE bloodonor.id=submit_details.b_id AND bloodonor.uname='$uname'";
$result = $conn->query($sql);
/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<br><br>" . $row["id"]. " | " . $row["fname"]. "|" . $row["lname"]. " | ".$row["email"]. " | ".$row["gender"]. " | ".$row["bday"] ."| ".$row["age"] ."| ".$row["county"];
        }*/
if (mysqli_num_rows($result) > 0) {

                    echo "<table class=table border=0 width='100%' cellspacing=0 >\n";
                    echo " <tr bgcolor='grey' align=center class=\"heading\" >\n";
                    echo "  <td width=70px>Id</td>\n";
                    echo "  <td>First Name</td>\n";
                    echo "  <td>Last Name</td>\n";
                    echo "  <td>Email</td>\n";
                    echo "  <td>Gender</td>\n";
                    echo "  <td>Date of Birth</td>\n";
                    echo "  <td>Age</td>\n";
                    echo "  <td>Weight</td>\n";
                    echo "  <td>County</td>\n";
                    echo "  <td> Address</td>\n";
                    echo "  <td>Donation Type</td>\n";
                    echo "  <td>Last Donation Date</td>\n";
                     echo "  <td>Donate</td>\n";
                    echo "  <td>Update</td>\n";
                    echo "  <td>Delete</td>\n";
                    echo " </tr>\n";


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       
                        

                        echo " <tr align=center bgcolor='silver' >\n";
                        echo "  <td>" . $row["id"] ."</td>\n";
                        echo "  <td>" . $row["fname"] ."</td>\n";
                        echo "  <td>" . $row["lname"] ."</td>\n";
                        echo "  <td>" . $row["email"] ."</td>\n";
                        echo "  <td>" . $row["gender"] ."</td>\n";
                        echo "  <td>" . $row["bday"] ."</td>\n";
                        echo "  <td>" . $row["age"] ."</td>\n";
                        echo "  <td>" . $row["weight"] ."</td>\n";
                        echo "  <td>" . $row["county"] ."</td>\n";
                        echo "  <td>" . $row["address"] ."</td>\n";
                        echo "  <td>" . $row["dtype"] ."</td>\n";
                       echo "  <td>" . $row["regdate"] ."</td>\n";
                        echo "<td >"."<a class='btn btn-primary' href='newdonation.php?id=".$row['id']."'>"."Donate"."</a>"."</td>\n";
                        echo "<td >"."<a class='btn btn-primary' href='updatedonor.php?id=".$row['id']."'>"."Edit"."</a>"."</td>\n";
                        echo "  <td><form action='' method='POST'><input type='hidden' name='tempId' value='".$row["id"]."'/><input type='submit' name='submit-btn' value='Delete'></form></td>\n";

                        echo "  </tr>\n";

    }

        
    
    {
       if(isset($_POST['submit-btn']))
        
    
    {
        $ID = $_POST['tempId'];
        //$sub=(mysqli_query($con,"SELECT sub_id FROM submit_details "))
        $query=mysqli_query($con, "DELETE FROM bloodonor WHERE id='$ID'");
        $q=mysqli_query($con, "DELETE FROM submit_details WHERE sub_id='$ID'");  
        if($query and $q)
            {   echo "<script type='text/javascript'>alert('Deleted successfully!!')</script>";
                echo "Success";
            }
        else{echo "Error"or die(mysql_error());}
        
        }
    echo "</table>";


}} else {
    echo "0 results";

mysqli_close($conn);
}
	
?>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
   
      