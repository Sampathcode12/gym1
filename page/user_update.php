<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	// delet funtion
	include('connect.php');
if (isset($_POST['deleteUser'])) {
    $email = $_POST['email'];

    // Delete user from both tables
    $deleteLoginSQL = "DELETE FROM login WHERE email = '$email'";
    $deleteUserInfoSQL = "DELETE FROM user_info WHERE email = '$email'";

    if (mysqli_query($con, $deleteLoginSQL) && mysqli_query($con, $deleteUserInfoSQL)) {
        echo "<script>alert('User deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
}
	
	// update user
	
	
if (isset($_POST['updateUser'])) {
    $email = $_POST['email'];
    $newUsername = $_POST['newUsername'];
    $newAddress = $_POST['newAddress'];
    $newContact = $_POST['newContact'];
    $newDob = $_POST['newDob'];
    $newUserType = $_POST['newUserType'];
    $newPackage = $_POST['newPackage'];

    // Update the user information
    $updateUserInfoSQL = "UPDATE user_info SET 
                          username = '$newUsername', 
                          address = '$newAddress', 
                          contact = '$newContact', 
                          dob = '$newDob', 
                          user_type = '$newUserType', 
                          package = '$newPackage' 
                          WHERE email = '$email'";

    if (mysqli_query($con, $updateUserInfoSQL)) {
        echo "<script>alert('User information updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating user information.');</script>";
    }
}
	
	?>
</head>

<body>
	
</body>
</html>