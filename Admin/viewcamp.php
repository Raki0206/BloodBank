<?php if(!isset($_SESSION)) {session_start();}  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Camp</title>
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
   <div style="width:1000px; height:700px;#CCC">
       <div style="width:200px; float:left;">
       <?php include('left.php'); ?>
       </div>
       <div style="width:800px;float:left">
<br /><br />

<?php include('function.php'); ?>


       <form method="post">
<table border="1" align="center" width="100%" height="20%" class="shaddoww">
<tr><td colspan="2" align="center" class="toptd">View camps </td></tr>
<tr><td align="center" style="padding-top:10px">
<table border="1" align="center" width="100%" height="20%" >
<tr><td style='text-align: center; height: 50px;'>Camp Id </td>
<td style='text-align: center; height: 50px;'>Camp Title</td>
<td style='text-align: center; height: 50px;'>Organised By</td>
</tr>

<?php
$cn=mysqli_connect("localhost","root","","bloodbank");
$s="select * from camp";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{
		
			echo "<tr><td style='text-align: center; height: 50px;'>$data[0]</td><td  style='text-align: center;height: 50px;'>$data[1]</td><td  style='text-align: center;height: 50px;'>$data[2]</td></tr>";
		}
	mysqli_close($cn);

?>


   
</body>
</html>