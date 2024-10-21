<?php
// Get the donor ID from the URL parameter
$donor_id = $_GET['useid'];
$conn = mysqli_connect('localhost', 'root', '', 'bloodbank');

// Query the database for the PDF data
$sql_select  = "SELECT donar_id,name,gender,age,mobile,b_id,email,pwd,pic,medical_certificate  FROM donarregistration WHERE donar_id = $donor_id";
$result = mysqli_query($conn, $sql_select);
if (mysqli_num_rows($result) > 0) {
  // Loop through the rows and insert them into the destination table
  while ($row = mysqli_fetch_assoc($result)) {
    $donar_id = $row['donar_id'];
    $name = $row["name"];
    $gender = $row["gender"];
    $age = $row["age"];
    $mobile = $row["mobile"];
    $b_id = $row["b_id"];
    $email = $row["email"];
    $pwd = $row["pwd"];
    $pic = $row["pic"];
    $medical_certificate =$row["medical_certificate"];
    $sql_insert = "INSERT INTO donors (donar_id, name, gender, age, mobile, b_id, email, pwd, pic, medical_certificate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt, "isssssssss", $donar_id, $name, $gender, $age, $mobile, $b_id, $email, $pwd, $pic, $medical_certificate);
    // $sql_insert = "INSERT INTO donors  VALUES ('$donar_id', '$name', '$gender','$age','$mobile','$b_id','$email','$pwd','$pic','$medical_certificate')";
    if (mysqli_stmt_execute($stmt)) {
      echo "Record inserted successfully.";
    } else {
      echo "Error inserting record: " . mysqli_stmt_error($stmt);
    }

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
     $mail->Body    = '<h1>You are approved as a donor</h1><br/>';
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
$sql_delete = "DELETE FROM donarregistration WHERE donar_id = $donor_id";
if (mysqli_query($conn, $sql_delete)) {
  echo  "<script>alert('Donor Approved');</script>";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}


?>

