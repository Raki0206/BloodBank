<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<title>Admin</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('../Admin/images/donating-blood-banner.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-size: 100% 100%;
  background-blend-mode: color-burn;
}

.navbar {
  overflow: hidden;
  width: absolute;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 20px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color:  #ff9999;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<body>
<div class="h_bg">
<div class="wrap">
<div class="header">
		<div class="logo">
			<h1><img src="images/logo.png" alt=""></h1>
		</div>
	</div>
</div>
</div>
<div class="nav_bg">
<div class="wrap">
<div class="navbar">
  <a href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">User 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="adduser.php">Add User</a>
      <a href="upuser.php">Update User</a>
      <a href="deluser.php">Delete User</a>
    </div>
  </div> 
  <!-- <div class="dropdown">
    <button class="dropbtn">City 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addcity.php">Add city</a>
      <a href="updatecity.php">Update City</a>
      <a href="deletecity.php">Delete City</a>
	  <a href="viewcity.php">View City</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">State 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addstate.php">Add State</a>
      <a href="updatestate.php">Update State</a>
      <a href="deletestate.php">Delete State </a>
	  <a href="viewstate.php">View State</a>
    </div>
  </div>  -->
  <div class="dropdown">
    <button class="dropbtn">Camp 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addcamp.php">Add Camp</a>
      <a href="updatecamp.php">Update Camp</a>
      <a href="deletecamp.php">Delete Camp</a>
	    <a href="viewcamp.php">View Camp</a>
      <a href="addgallery.php">Add Gallery</a>
      <a href="deletegallery.php">Delete Gallery</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Blood Group 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addbloodgroup.php">Add Blood Group</a>
      <a href="upbloodgroup.php">Update Blood Group</a>
      <a href="deletebloodgroup.php">Delete Blood Group</a>
	  <a href="viewbloodgroup.php">View Blood Group</a>
    </div>
  </div> 
 
  	<div class="dropdown">
    	<button class="dropbtn">Advertisement 
   		   <i class="fa fa-caret-down"></i>
    	</button>
   		<div class="dropdown-content">
      		<a href="addadvertise.php">Add Advertisement</a>
     		<a href="deleteadver.php">Delete Advertisement</a>
			 <a href="viewadver.php">View Advertisement</a>
    	</div>
 	</div> 
   <div class="dropdown">
    	<button class="dropbtn"> Users
   		   <i class="fa fa-caret-down"></i>
    	</button>
   		<div class="dropdown-content">
      		<a href="approveuser.php">Approve Users</a>
     		<a href="viewuser.php">View Users</a>
    	</div>
 	</div> 
   <div class="dropdown">
    	<button class="dropbtn"> Requests
   		   <i class="fa fa-caret-down"></i>
    	</button>
   		<div class="dropdown-content">
      		<a href="approverequest.php">Approve requests</a>
     		<a href="viewrequest.php">View requests</a>
    	</div>
 	</div> 
   <div class="navbar">
  <a href="donation.php">Donation</a>

<div class="navbar">
  <a href="contactus.php">Enquiry</a>


</div>
</div>

</div>
</body>
</html>