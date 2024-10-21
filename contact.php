<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood bank Management System</title>
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
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 125%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  margin-left: 20px;
}

label {
  padding: 6px 6px 6px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 30px 30px;
  border: none;
  border-radius: 2px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 10px;
  background-color: #f8f1e4;
  margin-left:65%;
  margin-top:-52.5%;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 3px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 3px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

</head>

<body>
<?php include('admin/function.php'); ?>

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
		<?php require('header.php');?>
	</div>
    <div>
<div style="height:500px; width:100%; margin:auto; margin-top:10px; margin-bottom:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data">


  <div   class="col span_2_of_3"> <div class="contact-form" style="padding-left:100px;">
          <div class="contact">
				  	<img src="Images/contact.png"  width="300" height="100">
              <style>
                .contact{
                  margin-left:5%;
                }
                  </style>
                  </div>
    
      
    <div class="left-side">
      
    <div class="phone details">
<div class="image">
<img src = "https://marketplace.canva.com/MACYQtWp0xU/1/thumbnail_large/canva-phone-icon-image-vector-illustration-MACYQtWp0xU.png" width="50" height="50">
<style> .image{
margin-left:20%;
}
</style>
</div>
         <div class="topic">Phone
         <style> .topic{
						margin-left:20%;
						font-size: 20px;
						}
		</style>
        </div>
         
         <div class="text-one">8608036495
         <style> .text-one{
						margin-left:16%;
						font-size: 20px;
						}
		</style></div>
          <div class="text-two">9025256102
          <style> .text-two{
						margin-left:16%;
						font-size: 20px;
						}
		</style></div>
        </div>
        <div class="email details">
          <div class="image">
          <img src = "https://foxyhomestaging.com.au/wp-content/uploads/2021/04/email-icon-transparent-background-11549825133qbltljgp1w-700x716.png" width="50" height="50" >
          <style> .image{
margin-left:20%;
}
</style>
</div>
          <div class="topic">Email
          <style> .topic{
margin-left:20%;
}
</style>
          </div>
          <div class="text">info.blood@gmail.com
          <style> .text{
margin-left:10%;
font-size: 20px;
}
</style>
          </div>
        </div>
      </div>
      <div class="container">
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="t1" name="t1" placeholder="Your Name"  required="required">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">E-Mail</label>
    </div>
    <div class="col-75">
      <input type="text" id="t2" name="t2" placeholder="Your E-Mail ID" required="required">
    </div>
  </div>
 <div class="row">
    <div class="col-25">
      <label for="lname">Phone Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="t3" name="t3" required="required" placeholder="Your Phone number"pattern="[0-9]{10,12}" title="Please enter only numbers between 10 to 12 for Mobile Number">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Feedback</label>
    </div>
    <div class="col-75">
      <textarea id="t4" name="t4" placeholder="Your feedback" style="height:200px" required="required" ></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit" name="sbmt">
  </div>
  </form>
</div>

    

<?php
if(isset($_POST["sbmt"])) 
{
	
	$cn=makeconnection();			

			$s="insert into contacts(name,email,mobile,subj) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t4"]   ."')";
			
			
	$q=mysqli_query($cn,$s);
	mysqli_close($cn);
	if($q>0)
	{
	echo "<script>alert('Record Save');</script>";
	}
	else
	{echo "<script>alert('Saving Record Failed');</script>";
	}
		
		}	
	

?> 
</body>
</html>