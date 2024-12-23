<?php
session_start();

if (isset($_POST['submitUser'])) {
    $_SESSION['username'] = $_POST['txtUname'];
    $_SESSION['User_email'] = $_POST['txtemail'];
    $_SESSION['password'] = $_POST['txtpassword'];
    $_SESSION['address'] = $_POST['txtaddress'];
    $_SESSION['contact'] = $_POST['txtcontact'];
    $_SESSION['dob'] = $_POST['txtdob'];
   // echo(( md5(['txtpassword'])));
    // Store user type based on cookie or default to "Customer"
    $_SESSION['user_type'] = isset($_COOKIE['user']) && $_COOKIE['user'] == 'Admin' ? $_POST['txtUserType'] : 'Customer';
} else {
    header("Location: userInfo.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Registration - Step 2</title>
<style>
    body {
        background-image: url(../Image/allbg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</head>
<body>
<h2 style="text-align: center;">Select Your Package</h2>

<form method="post" action="saveUser.php" style="width: 50%; margin: auto; background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 8px;">
    <div style="margin-bottom: 10px;">
        <label for="select"><strong>Package:</strong></label>
        <select name="package" id="select" style="width: 100%;">
          
            <?php
			//if(isset($_SESSION['user_type']))
            include('connect.php');
            $getpkgSQL = "SELECT * FROM packages";
            $pickpkg = mysqli_query($con, $getpkgSQL);
            while ($row = mysqli_fetch_array($pickpkg)) {
                echo "<option value='" . htmlspecialchars($row['package_name']) . "'>" . htmlspecialchars($row['package_name']) . "</option>";
            }
            ?>
        </select>
    </div>
    
    <div style="text-align: center;">
        <button type="submit" name="submitPackage" style="padding: 10px 20px;">Submit and Register</button>
    </div>
</form>

</body>
</html>
