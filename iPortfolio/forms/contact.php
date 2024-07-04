<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "details";

// Create connection
$conn = new mysqli($server, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // SQL query to insert data into your database table
  $sql = "INSERT INTO submission (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

  if ($conn->query($sql) === TRUE) {
    // On successful insertion, show a success message
    echo "<script>alert('Message sent successfully!');</script>";
  } else {
    // If there's an error, display an error message
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
  }
}

// Close connection
$conn->close();
?>
