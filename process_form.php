<?php
// Database connection settings
$servername = "mysqltestdb-naidugariabbayi-cdb0.i.aivencloud.com";
$username = "avnadmin"; // Replace with your MySQL username
$password = "AVNS_JeB2Yrl_h1maCPUHsQr"; // Replace with your MySQL password
$dbname = "defaultdb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Escape user inputs for security
  $first_name = $conn->real_escape_string($_POST['first-name']);
  $last_name = $conn->real_escape_string($_POST['last-name']);
  $address = $conn->real_escape_string($_POST['address']);
  $state = $conn->real_escape_string($_POST['state']);
  $pincode = $conn->real_escape_string($_POST['pincode']);
  $country = $conn->real_escape_string($_POST['country']);
  $mobile_number = $conn->real_escape_string($_POST['mobile-number']);

  // SQL query to insert data into database
  $sql = "INSERT INTO customers (first_name, last_name, address, state, pincode, country, mobile_number)
          VALUES ('$first_name', '$last_name', '$address', '$state', '$pincode', '$country', '$mobile_number')";

  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>
