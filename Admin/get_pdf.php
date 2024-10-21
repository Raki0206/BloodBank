<?php
// Get the donor ID from the URL parameter
$donor_id = $_GET['useid'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'bloodbank');

// Query the database for the PDF data
$sql = "SELECT medical_certificate FROM donarregistration WHERE donar_id = $donor_id";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
  // Set the appropriate headers for a PDF file
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="medical_certificate.pdf"');

  // Output the PDF data from the database
  $pdf_data = mysqli_fetch_assoc($result)['medical_certificate'];
  echo $pdf_data;
} else {
  // PDF not found in the database
  echo 'PDF not found.';
}

// Close the database connection
mysqli_close($conn);
?>