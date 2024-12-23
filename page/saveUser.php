<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Registration - Step 3</title>

</head>
<body>
<?php
session_start();
include('connect.php');

if (isset($_POST['submitPackage'])) {
    $email = $_SESSION['User_email'];
    $password = ($_SESSION['password']);
    $user_type = $_SESSION['user_type'];
    $username = $_SESSION['username'];
    $address = $_SESSION['address'];
    $contact = $_SESSION['contact'];
    $dob = $_SESSION['dob'];
    $package = $_POST['package'];
	 // $hashedPassword = md5($password) ;
    
    // Insert data into usertbl
    $userAddSQL = "INSERT INTO login  VALUES ('$email', '$password','$user_type')";
    $userInfoAddSQL = "INSERT INTO user_info VALUES ('$username', '$email', '$address', '$contact', '$dob','$user_type', '$package')";

    // Execute queries and check success
    if (mysqli_query($con, $userAddSQL) ) {
		echo "done";
		//INSERT INTO usertbl VALUES('".$email."','".$pw."'
		
		if(mysqli_query($con, $userInfoAddSQL)) {
        echo "<script>alert('User registration successful! Redirecting to login page.');</script>";
			
        header("refresh:1;url=login.php");
    } 
	}
	
	else {
        echo "<script>alert('Error registering user. Please try again.');</script>";
        header("refresh:1;url=userInfo.php");
    }
} else {
    header("Location: userInfo.php");
    exit();
	
	

	
}
?>
	</body>
</html>
