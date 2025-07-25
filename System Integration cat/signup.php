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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $conn->insert_id;
        header("Location: portfolio.php");
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Sign Up</title>
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
<ul id="nav-list">
                <li class="nav-sub"><a href="Hom.html" class="nav-link">Home</a></li>
                <li class="nav-sub active"><a href="adminlogin.php" class="nav-link">Admin</a></li>
                <li class="nav-sub"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-sub"><a href="contact.html" class="nav-link">Contact</a></li>
                <li class="nav-sub"><a href="signin.php" class="nav-link">Sign in</a></li>
                
            </ul>
</nav>

<div class="container" style="background-color: rgba(210, 138, 60, 0.99)">
    <h2 class="mb-4 text-center">Sign Up</h2>
    <form id="signup_form" action="signup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <span class="toggle-password position-absolute top-50 end-0 translate-middle-y me-2">👁️</span>
        </div>
        <div class="mb-3 position-relative">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            <span class="toggle-password position-absolute top-50 end-0 translate-middle-y me-2">👁️</span>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        <p class="mt-3">Already have an account? <a href="signin.php">Sign In</a></p>
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

document.getElementById('signup_form').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    // Password validation
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordPattern.test(password)) {
        alert('Password must be at least 8 characters long and contain at least one letter, one number, and one special character.');
        e.preventDefault();
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        e.preventDefault();
    }
});
</script>
<footer>
        <div id="footer" style="background-color: rgba(67, 54, 54, 0.776)">
            <h1 id="uto">Utopia assests market platform - The next BIG thing...................</h1>
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