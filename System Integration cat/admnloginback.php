<?php
include("connect.php");

// Check if form is submitted and data exists
if (isset($_POST['idno']) && isset($_POST['pswd'])) {
    $idno = $_POST['idno'];
    $pass = $_POST['pswd'];

    // Query to check login credentials
    $sql = "SELECT * FROM admin WHERE idno='$idno' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    // If a matching row is found
    if (mysqli_num_rows($result) > 0) {
        session_start();  // Start session

        // Set session variables
        $_SESSION["idno"] = $idno;
        $_SESSION["pass"] = $pass;

        // Redirect to admin dashboard
        header("Location: test.php");
        exit();
    } else {
        // Incorrect login credentials
        echo "<script>alert('Wrong Password or ID. Please try again.');</script>";
        echo "<script>location.href='adminlogin.php';</script>";
    }
} else {
    echo "<script>alert('Please enter both ID and Password.');</script>";
    echo "<script>location.href='adminlogin.php';</script>";
}

// Close connection
mysqli_close($conn);
?>
