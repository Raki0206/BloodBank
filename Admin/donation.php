<?php if(!isset($_SESSION)) {session_start();}  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Approve Users</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
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
tr:nth-child(odd){
  
  background-color: #ffb3b3;

}
</style>

</head>
<body>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:admimlogin.php");
}
?>
<?php include('topbar.php'); ?>
    <center>
   <div style="width:1000px; height:700px; ">
       <div style="width:200px; float:left;">
       <?php include('left.php'); ?>
       </div>
       <div style="width:800px;float:left">
<br /><br />

<?php include('function.php'); ?>


       <form method="post">
<table>
  <tr>
    <th style='text-align: center;'>Donation ID</th>
    <th style='text-align: center;'>Request ID</th>
    <th style='text-align: center;'>Donor</th>
    <th style='text-align: center;'>Patient</th>
    <th style='text-align: center;'>Donated date</th>
    <th style='text-align: center;'>Number of Units</th>
    <th style='text-align: center;'>Donor E-Mail</th>
    <th style='text-align: center;'>Patient E-Mail</th>
    <th style='text-align: center;'>Blood Group</th>
    <th style='text-align: center;'>Message</th>
  </tr>
<?php
$cn=mysqli_connect("localhost","root","","bloodbank");
$s="select * from donation,donors,requestfinal,bloodgroup where donation.email=donors.email and donation.req_id=requestfinal.req_id and donors.b_id=bloodgroup.bg_id";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
			echo "<tr>
            <td style='text-align: center; height: 50px;'>$data[0]</td>
            <td style='text-align: center; height: 50px;'>$data[1]</td>
            <td style='text-align: center; height: 50px;'>$data[7]</td>
            <td style='text-align: center; height: 50px;'>$data[17]</td>
            <td style='text-align: center; height: 50px;'>$data[2]</td>
            <td style='text-align: center; height: 50px;'>$data[3]</td>
            <td style='text-align: center; height: 50px;'>$data[5]</td>
            <td style='text-align: center; height: 50px;'>$data[21]</td>
            <td style='text-align: center; height: 50px;'>$data[26]</td>
            <td style='text-align: center; height: 50px;'>$data[4]</td>
            </tr>";
		}
		mysqli_close($cn);
?>
</body>
</html>