<?php if(!isset($_SESSION)) {session_start();}  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/lightbox.css" rel="stylesheet" />
    <link href="StyleSheet.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
     <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
  
 <script type="text/javascript">
     $(function () {
         SyntaxHighlighter.all();
     });
     $(window).load(function () {
         $('.flexslider').flexslider({
             animation: "slide",
             animationLoop: false,
             itemWidth: 210,
             itemMargin: 5,
             minItems: 2,
             maxItems: 4,
             start: function (slider) {
                 $('body').removeClass('loading');
             }
         });
     });
  </script>
  <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  align-self: center;      
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>

<?php

if($_SESSION['donorstatus']=="")
{
	header("location:../login.php");
}
?>
<?php include('function.php'); ?>

 <div class="h_bg">
<div class="wrap">
<div class="header">
		<div class="logo">
			<h1><a href="index.php"><img src="Images/logo.png" alt=""></a></h1>
		</div>
	</div>
</div>
</div>
<div class="nav_bg">
<div class="wrap">
	<ul class="nav">
			<li><a href="chngpwd.php">Change Password</a></li>	
			<li><a href="updateprofile.php">Update Profile</a></li> 
      <li><a href="blooddonated.php">Donate Blood</a></li>           
            <li><a href="viewdonations.php">View Donations</a></li>
            <li><a href="viewrequest.php">View Requests</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <style>
				.nav{
					text-align: center;
				}
				</style>
            </ul>
	</div>
    <form method="post">
<table>
  <tr>
    <th style='text-align: center;'>Request ID</th>
    <th style='text-align: center;'>Name</th>
    <th style='text-align: center;'>Gender</th>
    <th style='text-align: center;'>Age</th>
    <th style='text-align: center;'>Mobile</th>
    <th style='text-align: center;'>E-Mail</th>
    <th style='text-align: center;'>Blood Group</th>
    <th style='text-align: center;'>Request Date</th>
    <th style='text-align: center;'>Message</th>
    
  </tr>
<?php
$cn=mysqli_connect("localhost","root","","bloodbank");
$s="select * from requestfinal,bloodgroup where requestfinal.bgroup=bloodgroup.bg_id";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
			echo "<tr>
            <td style='text-align: center; height: 50px;'>$data[0]</td>
            <td style='text-align: center; height: 50px;'>$data[1]</td>
            <td style='text-align: center; height: 50px;'>$data[2]</td>
            <td style='text-align: center; height: 50px;'>$data[3]</td>
            <td style='text-align: center; height: 50px;'>$data[4]</td>
            <td style='text-align: center; height: 50px;'>$data[5]</td>
            <td style='text-align: center; height: 50px;'>$data[10]</td>
            <td style='text-align: center; height: 50px;'>$data[7]</td>
            <td style='text-align: center; height: 50px;'>$data[8]</td>

            </tr>";
		}
		mysqli_close($cn);
?>
       
</body>
</html>