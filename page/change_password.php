<?php
// Authenticate using cookie
if (!isset($_COOKIE['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_COOKIE['user_id'];
$username = isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : 'Guest';

include 'connect.php';

$query = "SELECT username, email, phone, address FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    $user = null;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        nav a { margin-right: 10px; text-decoration: none; color: #007BFF; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>

    <nav>
        <a href="home.php">Home</a> |
        <a href="profile.php">Profile</a> |
        <a href="logout.php">Logout</a>
    </nav>

    <?php if ($user): ?>
        <h2>Your Information</h2>
        <table>
            <tr><th>Username</th><td><?php echo htmlspecialchars($user['username']); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($user['email']); ?></td></tr>
            <tr><th>Phone</th><td><?php echo htmlspecialchars($user['phone']); ?></td></tr>
            <tr><th>Address</th><td><?php echo htmlspecialchars($user['address']); ?></td></tr>
        </table>
    <?php else: ?>
        <p>User details not found. Please try again later.</p>
    <?php endif; ?>
</body>
</html>
