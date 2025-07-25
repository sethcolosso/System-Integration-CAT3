<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: portfolio.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email address.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Resources/Fonts.css">
    <link rel="stylesheet" href="Resources/Common.css">
    <link rel="stylesheet" href="Resources/Page 2.css">
    <style>
        .container {
            max-width: 500px;
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus {
            box-shadow: 0 5px 10px rgba(0, 123, 255, 0.5);
            border-color: #80bdff;
        }
        .toggle-password {
            cursor: pointer;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="adminlogin.php">Admin login</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="hom.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="residential.html">inpatient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="commercial.html">outpatient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="land.html">teleconsultation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="background-color: rgba(210, 138, 60, 0.99)">
    <h2 class="mb-4 text-center">Sign In</h2>
    <form action="signin.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <span class="toggle-password position-absolute top-50 end-0 translate-middle-y me-2">👁️</span>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>
<script>
document.querySelectorAll('.toggle-password').forEach(function(toggle) {
    toggle.addEventListener('click', function() {
        const input = this.previousElementSibling;
        if (input.type === 'password') {
            input.type = 'text';
            this.textContent = '🙈';
        } else {
            input.type = 'password';
            this.textContent = '👁️';
        }
    });
});
</script>
<footer>
        <div id="footer" style="background-color: rgba(67, 54, 54, 0.776)">
            <h1 id="uto">Utopia healthcare platform - The next BIG thing...................</h1>
            <hr id="footer-rule">
            <div id="footer-icon-holder">
                <a href="https://www.reddit.com/">    <img src="Resources/Images/Footer/r.png" class="footer-icon"></a>
                <a href="https://www.facebook.com/"><img src="Resources/Images/Footer/f.png" class="footer-icon"></a>
                <a href="https://plus.google.com/">    <img src="Resources/Images/Footer/g.png" class="footer-icon"></a>
                <a href="https://twitter.com/">        <img src="Resources/Images/Footer/t.png" class="footer-icon"></a>
                <a href="https://www.youtube.com/">    <img src="Resources/Images/Footer/y.png" class="footer-icon"></a>
            </div>
            <h3>&copy; Utopia organization, 2025</h3>
        </div>
    </footer>
    
    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/01/20/11/20250120110711-9XRAPH8Y.js"></script>
</body>
</html>