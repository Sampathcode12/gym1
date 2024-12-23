<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
</head>
<body>
<?php
include('connect.php');

if (isset($_POST['Login_B'])) {
    session_start();
    $un = $_POST['U_nameT']; // User input for email/username
    $pw = $_POST['U_passwordT']; // User input for password

    // Check if the username is "Admin"
    if ($un == "Admin") {
        // Verify if the password matches "123" for the Admin user
        if ($pw == "123") {
            // Set session and cookie for admin
            setcookie("user", $un, time() + 3600);
            $_SESSION['User_email'] = $un; // Assign "Admin" as the email
            $_SESSION['user_type'] = "Admin"; // Set user type to Admin
            header('Location: admin.php');
            exit;
        } else {
            echo "<script>alert('Incorrect password for Admin');</script>";
            header("refresh:1;url=login.php");
        }
    } else {
        // Check the database for non-admin users
        $userCheckSQL = "SELECT * FROM login WHERE User_email = '$un'";
        $userFound = mysqli_query($con, $userCheckSQL);

        if (mysqli_num_rows($userFound) > 0) {
            $row = mysqli_fetch_assoc($userFound); // Fetch user details
            $dbPassword = $row['U_password']; // Password from DB
            $userType = $row['user_type']; // User type from DB
//			$hpasword= md5($pw);
//			echo(md5($dbPassword));
//			echo("<br>");
//			echo($dbPassword);
			
			
			

            // Verify the provided password (assuming the password in DB is stored as plain text or hash)
            if ($dbPassword == $pw) {
                // Set cookies and session for authenticated user
                setcookie("user", $un, time() + 3600);
                setcookie("user_type", $userType, time() + 3600);

                $_SESSION['User_email'] = $un; // Save user's email in session
                $_SESSION['user_type'] = $userType; // Save user's type in session

                header('Location: Home1.php');
                exit;
            } else {
                echo "<script>alert('Incorrect password');</script>";
                header("refresh:1;url=login.php");
            }
        } else {
            echo "<script>alert('User not found');</script>";
            header("refresh:1;url=login.php");
        }
    }
} elseif (isset($_POST['Register_B'])) {
    // Redirect to the registration page if Register button is clicked
    header('Location: userinfo.php');
    exit;
}
?>
</body>
</html>
