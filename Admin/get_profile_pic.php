<?php
  // Assuming the user ID is passed as a parameter in the URL
  $userId = $_GET['userid'];
  
  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'bloodbank');
  
  // Query the database to retrieve the user's profile picture data
  $query = "SELECT pic FROM donarregistration WHERE donar_id='$userId'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  
  // Set the content type header to image/jpeg
    header('Content-Type: image/jpeg');
    header('Content-Type: image/png');
    header('Content-Type: image/jpg');

  
  // Output the image data to the browser
  echo $row['pic'];
  
  // Close the database connection
  mysqli_close($conn);
?>
