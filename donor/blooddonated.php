<?php if(!isset($_SESSION)) {session_start(); }   ?>

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
</head>

<body>

<?php
//echo $_SESSION["b_id"];
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
<div style="height:400px; width:600px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" width="500px" class="tableborder" style="margin:auto" >

        <tr><td colspan="2" align="center"><img src="Images/bdonated.png" height="80px" /></td></tr>
             <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
  
   <tr><td class="lefttd">Select Patient </td><td><select name="s3" required><option value="">Select</option>
<?php
$cn=makeconnection();

$s="select * from requestfinal where bgroup = '" . $_SESSION["b_id"] . "'";
//  where bgroup = '" . $bId . "'";
// echo $s;
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s3"])
		{
			echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
		
		
		
	}
	mysqli_close($cn);

?>



</select>
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from requestfinal where name='" .$_POST["s3"] ."'";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	$data=mysqli_fetch_array($result);
	$req_id = $row['req_id'];
    $name = $row["name"];
    $gender = $row["gender"];
    $age = $row["age"];
    $mobile = $row["mobile"];
    $email = $row["email"];
    $bgroup = $row["bgroup"];
    $reqdate = $row["reqdate"];
    $detail = $row["detail"];
		
		
	mysqli_close($cn);
}
?>
</td></tr>

         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td class="lefttd"  style="vertical-align:middle"> Date</td><td><input type ="date" name="t1" required="required" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        
          <tr><td class="lefttd"  style="vertical-align:middle">No Of Units</td><td><input type="number" name="t3"  required="required" pattern="[0-9]{1,10}" title="please enter only numbers between 1 to 10 for no. of units" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr><td class="lefttd"  style="vertical-align:middle"> Other Detail</td><td><textarea name="t4"></textarea></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td><td>
		
		 <?php 
				$cn=makeconnection();
				$s="select * from donation where email='" .$_SESSION["email"] ."'";
					$result=mysqli_query($cn,$s);
					$r=mysqli_num_rows($result);
					$data=mysqli_fetch_array($result);
					if($data == null): ?>
					
							<input  
						type="submit" value="Save" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; " /> 
					<?php else: ?><input  
						type="submit" value="Save" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; " disabled/> 
						<?php endif ?>
		 </td></tr>	
		</table></table></td></tr>	</table></form>
	</div>
     <?php
if(isset($_POST["sbmt"])) 
{
	
	
$cn=makeconnection();
			$s="insert into donation(req_id,ddate,units,detail,email) values('" . $_POST["s3"] . "','" . $_POST["t1"] . "' ,'" . $_POST["t3"] . "','" . $_POST["t4"] . "','". $_SESSION["email"] ."')";
			
			//INSERT INTO `donation`(`donation_id`, `camp_id`, `ddate`, `units`, `detail`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
}
		

	

?> 	 


      
</body>
</html>
