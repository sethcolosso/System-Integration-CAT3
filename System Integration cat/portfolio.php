<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$user = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone_number = $_POST['phone_number'];
    $country = $_POST['country'];
    $region = $_POST['region'];
    $town = $_POST['town'];
    $gender = $_POST['gender'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, phone_number = ?, country = ?, region = ?, town = ?, gender = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $name, $phone_number, $country, $region, $town, $gender, $user_id);
    $stmt->execute();
    $stmt->close();
}

$stmt = $conn->prepare("SELECT username, email, name, phone_number, country, region, town, gender FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="portfolio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="script.js"></script>
    
</head>
<body>
<div class="background-animation"  ></div>
<nav>
        <div id="nav-wrapper" style="background-color: khaki;">
            <ul id="nav-list">
                <li class="nav-sub"><a href="hom.html" class="nav-link">Home</a></li>
                <li class="nav-sub"><a href="residential.html" class="nav-link">inpatient</a></li>
                <li class="nav-sub"><a href="commercial.html" class="nav-link">outpatient</a></li>
                <li class="nav-sub"><a href="land.html" class="nav-link">Land</a></li>
                <li class="nav-sub"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-sub"><a href="contact.html" class="nav-link">Contact</a></li>
                <li class="nav-sub active"><a href="" class="nav-link"></a></li>
            </ul>
        </div>
    </nav>
<div class="container mt-5">
    <h2>Portfolio</h2>
    <form action="portfolio.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number']); ?>">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>">
        </div>
        <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <input type="text" class="form-control" id="region" name="region" value="<?php echo htmlspecialchars($user['region']); ?>">
        </div>
        <div class="mb-3">
            <label for="town" class="form-label">Town</label>
            <input type="text" class="form-control" id="town" name="town" value="<?php echo htmlspecialchars($user['town']); ?>">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/01/20/11/20250120110711-9XRAPH8Y.js"></script>
    
</body>
</html>