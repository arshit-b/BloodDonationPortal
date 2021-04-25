<?php

session_start();
if(!isset($_SESSION["username"])){
header("Location: doclogin.php");
exit(); }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Blood and Organ Donation System</title>
 
    <script src="js/jquery.js"></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style type="text/css">
    body {
    /* background-image: url("static/images/1.jpg"); */
    background-repeat: no-repeat;
    background-color: #cccccc;
    background-attachment: fixed;
    
}
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
          <li><a href="login.php">Doctor Portal</a></li>
          <li><a href="adminlogin.php">Admin</a></li>
       
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
  </div>
</nav>
<li class="active"><a href="#"><?php echo $_SESSION['username']; ?> logged in</a></li>
<div class="container-fluid">
 <form class="form-horizontal" action="" name="docview" method="GET">
<div class="form-group">
  <label for="county">County:</label>
  <select class="form-control" name="county">
  <option>County</option>
     <option value="Surat">Surat</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Vadodara">Vadodara</option>
            <option value="Bharuch">Bharuch</option>
            <option value="Kim">Kim</option>
            <option value="Maharashtra">Maharashtra</option>
  </select>
</div>
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="filter">Submit</button>
    </div>
  </div>

</form></div>

<?php 
require('db.php');

 if(isset($_GET['filter']))
    {
        $search= $_GET["county"];
        $query=mysqli_query($con, "SELECT * FROM bloodonor, submit_details WHERE bloodonor.county='$search' and bloodonor.id=submit_details.b_id ");
       // echo (' <br><b><h1>'. $query->num_rows. ' Records</b></h2>');
       

 if ($count = mysqli_num_rows($query) > 0){
  echo
  "<div class='col-xs-12 col-sm-12 col-md-12' id='res'></div>".
"<div class='container' align='right'>".
"<form method='post'>".
// "<input type='submit' a class='btn btn-primary'  name='submit1' value='Send Message'/>".
"</form>".
"</div></div>";



                    echo "<table border=0 width='100%' cellspacing=0 >\n";
                    echo " <tr bgcolor='grey' align=center class=\"heading\" >\n";
                    echo "  <td width=70px></td>\n";
                    // echo "  <td width=70px></td>\n";
                    echo "  <td>First Name</td>\n";
                    echo "  <td>Last Name</td>\n";
                    echo "  <td>Id number</td>\n";
                    echo "  <td>Gender</td>\n";
                    echo "  <td>Age</td>\n";
                     echo "  <td>Phone</td>\n";
                     echo "  <td>Email</td>\n";
                     echo "  <td>Donation Type</td>\n";
                     echo "  <td>Organ Type</td>\n";
                     echo "  </tr>\n";
                   

$i=0;
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
       //$emailaddresses[]=$row["email"];
$i;$i<=$count;$i++;

                        echo " <tr align=center bgcolor='silver' >\n";
                        //echo "  <td contenteditable='true'>" . $row["id"] ."</td>\n";
                       // echo "  <td><input type='checkbox' id='check' name='id' value=".$row['sub_id']."></td>\n";
                         echo "  <td>" . $i."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["fname"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["lname"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["id_num"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["gender"] ."</td>\n";
                        //echo "  <td contenteditable='true'>" . $row["bday"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["age"] ."</td>\n";
                        //echo "  <td contenteditable='true'>" . $row["county"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["phone"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["email"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["dtype"] ."</td>\n";
                        echo "  <td contenteditable='true'>" . $row["organ"] ."</td>\n";
                        echo "  </tr>\n";

    }
      
    //var_dump($emailaddresses);
   
    echo "</table>";

    //$result close();
} else {
   // echo "0 results";
} 
}
    
?>

<?php
require('db.php');
if(isset($_POST['submit1'])){
	echo "<form name='sendmsg' method='post'>".
"<div class='form-group'>". 
     "<div class='textarea-message form-groupa'>".
     "<label for='message'>Please Enter Your Message</label>".
     "<textarea name='msg' class='textarea-message form-control' placeholder='Your Message' rows='5'></textarea>".
     "</div>".
     "</div>".
    
 
  "<input type='submit' a class='btn btn-success' name='sub' value='Send Email'/>".
"</form>";
}

if(isset($_POST['sub'])){
   
  $msg=$_POST['msg'];


require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
                              // Enable verbose debug output
//echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; 

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'wanjirajackie8@gmail.com';                 // SMTP username
$mail->Password = 'madrigal';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('wanjirajackie8@gmail.com','Jackie Maina');

//$mail->addAddress('joe@example.net', 'Joe User');  
   // Add a recipient

              // Name is optional
  //$county = stripslashes($_REQUEST['county']);
   // $county = mysqli_real_escape_string($con,$county);

    $county=$_GET['county'];
$sq = mysqli_query($con, "SELECT email FROM bloodonor WHERE county='$county'");
 if (mysqli_num_rows($sq) > 0)
    {
        while($row = mysqli_fetch_assoc($sq))
         {
            $emailaddresses[] = $row["email"];
          }     
     }
//$emailaddresses=array();
// echo $emailaddresses[]=$row["email"];
//$emailaddresses['0']='alfredwmaina25@gmail.com';
//$emailaddresses['1']='Jackiemaina8@gmail.com';
foreach ($emailaddresses as $address) {
    $mail->addAddress($address);
}
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');


$mail->addAttachment('$msg');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation of the blood donation dates and venue';
$mail->Body    = $msg;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    }
}

?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>