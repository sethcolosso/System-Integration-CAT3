<?php
$idno=$_POST['idno'];
$name=$_POST['uname'];
$passw=$_POST['paswd'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO admin (idno,username,password)
VALUES ('$idno', '$name','$passw')";
header("location:adminlogin.php");

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

