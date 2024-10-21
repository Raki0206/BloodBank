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
tr:nth-child(odd) {
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
    <th style='text-align: center;'>Request ID</th>
    <th style='text-align: center;'>Name</th>
    <th style='text-align: center;'>Gender</th>
    <th style='text-align: center;'>Age</th>
    <th style='text-align: center;'>Mobile</th>
    <th style='text-align: center;'>E-Mail</th>
    <th style='text-align: center;'>Blood Group</th>
    <th style='text-align: center;'>Request date</th>
    <th style='text-align: center;'>Message</th>
    <th style='text-align: center;'>Approve</th>
    <th style='text-align: center;'>Reject</th>
  </tr>
<?php
$cn=mysqli_connect("localhost","root","","bloodbank");
$s="select * from requestes";
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
            <td style='text-align: center; height: 50px;'>$data[6]</td>
            <td style='text-align: center; height: 50px;'>$data[7]</td>
            <td style='text-align: center; height: 50px;'>$data[8]</td>
            <td style='text-align: center; height: 50px;'><button onclick='approveRd($data[0])' >Accept</button></td>
            <td style='text-align: center; height: 50px;'><button onclick='rejectRd($data[0])'>Reject</button></td>
            </tr>";
		}
		mysqli_close($cn);
?>

<script>
  function approveRd(useId) {
    var url = "approvereq.php?useid=" + useId;
    window.open(url);
  }
</script>
<script>
  function rejectRd(useId) {
    var url = "rejectedreq.php?useid=" + useId;
    window.open(url);
  }
</script>
</body>
</html>