<?php
// Get the donor ID from the URL parameter
$req_id = $_GET['useid'];
$conn = mysqli_connect('localhost', 'root', '', 'bloodbank');
echo $req_id ;
$sql_select  = "SELECT email FROM requestes WHERE req_id = $req_id";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) > 0) {
  // Loop through the rows and insert them into the destination table
  while ($row = mysqli_fetch_assoc($result)) {

    $email = $row["email"];
// using the PHPMailer module to send Email
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "rajeshrajurajesh1000@gmail.com";                 // SMTP username
$mail->Password = "ndqqmojyiqmxphng";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom("rajeshrajurajesh1000@gmail.com", 'Life Saver Blood Bank');
$mail->addAddress($email);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Regarding request for donor';
$mail->Body    = '<h1>You are Request has been rejected</h1>';
//  $mail->AltBody = 'Your OTP Verification code is: ' . $otp;

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $otp_sent = '';
} else {
}
}
}    

else {
  echo "No rows were returned.";
}

$sql_delete = "DELETE FROM requestes WHERE req_id = $req_id";
if (mysqli_query($conn, $sql_delete)) {
  echo "<script>alert('Request Rejected');</script>";
  
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}


?>