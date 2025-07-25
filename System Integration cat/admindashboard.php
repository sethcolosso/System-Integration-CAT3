<?php
session_start(); // Start session at the top of the file

// Check if admin is logged in
if (!isset($_SESSION['idno'])) {
    // Redirect to the login page if not logged in
    header("Location: adminlogin.php");
    exit();
}

include("connect.php"); // Make sure you include the database connection file
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url("images/bg5.jpg");
        }

        #nav {
            background-color: white;
            opacity: .8;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-padded app-navbar p-t-md">
    <a class="navbar-brand" href="#">
        <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>
    <div class="text-center d-none d-md-block" id="nav">
        <ul class="nav nav-pills">
            <li class="pull-right"><a class="nav-link font-weight-bold" href="index.php">Home</a></li>
            <li class="pull-right"><a class="nav-link font-weight-bold" href="contact.php">Contact</a></li>
            <li class="pull-right"><a class="nav-link font-weight-bold" href="about.php">About</a></li>
            <li class="pull-right"><a class="nav-link font-weight-bold" href="add.php">Add House</a></li>
            <li class="pull-right"><a class="nav-link font-weight-bold" href="adminlogout.php">Log out</a></li>
        </ul>
    </div>
</nav>

<!-- Admin Dashboard -->
<div class="container mt-5" style="background-color: white;">
    <h2>Admin Dashboard</h2>

    <!-- Room Data Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Room No</th>
                    <th>Cost</th>
                    <th>Regno</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch rooms data from the database
                $sql = "SELECT * FROM room";
                $result = mysqli_query($conn, $sql);

                // Check if there are any rows in the result
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['roomno']) . "</td>
                                <td>" . htmlspecialchars($row['cost']) . "</td>
                                <td>" . htmlspecialchars($row['regno']) . "</td>
                                <td>" . htmlspecialchars($row['description']) . "</td>
                                <td><a href='edit.php?id=" . urlencode($row['roomno']) . "' class='btn btn-warning'>Edit</a></td>
                                <td><a href='del.php?id=" . urlencode($row['roomno']) . "' class='btn btn-danger'>Delete</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No rooms found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
