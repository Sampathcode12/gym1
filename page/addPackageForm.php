<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add New Package</title>
<style type="text/css">
    body {
        background-image: url(../Image/allbg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<?php
include('connect.php'); // Include your database connection

// Add new package functionality
if (isset($_POST['ADD_B'])) {
    $package_name = trim($_POST['package_name']);
    $duration_days = trim($_POST['duration_days']);
    $price = trim($_POST['price']);
    $features = trim($_POST['features']);
    $description = trim($_POST['description']);
    
    $pkgAddSQL = "INSERT INTO packages (package_name, duration_days, price, features, description) 
                  VALUES ('$package_name', '$duration_days', '$price', '$features', '$description')";

    if (mysqli_query($con, $pkgAddSQL)) {
        echo '<script>alert("Package added successfully!");</script>';
    } else {
        echo '<script>alert("Error adding package.");</script>';
    }
}
?>
</head>

<body>
<table width="75%" border="0" cellpadding="2" align="center">
  <tbody>
   <form id="addPackageForm" name="addPackageForm" method="post" action="addPackageForm.php">
    <tr>
      <td align="center"><h2>Add New Package</h2></td>
    </tr>
    <tr>
      <td>
        <table width="75%" border="0" align="center">
          <tbody>
            <tr>
              <td align="center"><strong>Package Name</strong></td>
              <td align="center"><input name="package_name" type="text" id="package_name" required></td>
            </tr>
            <tr>
              <td align="center"><strong>Duration (Days)</strong></td>
              <td align="center"><input name="duration_days" type="number" id="duration_days" required></td>
            </tr>
            <tr>
              <td align="center"><strong>Price</strong></td>
              <td align="center"><input name="price" type="number" step="0.01" id="price" required></td>
            </tr>
            <tr>
              <td align="center"><strong>Features</strong></td>
              <td align="center"><input name="features" type="text" id="features" required></td>
            </tr>
            <tr>
              <td align="center"><strong>Description</strong></td>
              <td align="center"><textarea name="description" id="description" required></textarea></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td align="center">
				  <input type="submit" name="ADD_B" id="ADD_B" value="Add Package">
<!--
                <?php if ($_COOKIE['user'] == "Admin"): ?>
                  <input type="submit" name="ADD_B" id="ADD_B" value="Add Package">
                <?php endif; ?>
-->
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
   </form>
  </tbody>
</table>
</body>
</html>
