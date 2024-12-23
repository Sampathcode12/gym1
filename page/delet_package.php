<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Package Management</title>
<link rel="stylesheet" type="text/css" href="form.css">

<?php
	if(isset($_COOKIE['user'])){
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}
	
include('connect.php');
$check = false;
		$blogQuery = "SELECT package_name FROM packages";
$blogResult = mysqli_query($con, $blogQuery);
if ($blogResult) {
    while ($row = mysqli_fetch_assoc($blogResult)) {
        $packages_name[] = $row['package_name'];
    }
}

// Search functionality
	if(isset($_COOKIE['user']))
{
if (isset($_POST['btnSearch'])) {
    $getsearchpkgSQL = "SELECT * FROM packages WHERE package_name = '" . $_POST['txtsearch'] . "'";
    $picsearchkpkg = mysqli_query($con, $getsearchpkgSQL);

    if (mysqli_num_rows($picsearchkpkg)) {
        while ($raw = mysqli_fetch_array($picsearchkpkg)) {
            $pnam = $raw['package_name'];
            $pdur = $raw['duration_days'];
            $pamo = $raw['price'];
            $ppeaches = $raw['features'];
            $pdescription = $raw['description'];
            $check = true;
        }
    } else {
        echo '<script>alert("No Such Package!");</script>';
    }
}

// Update functionality
if (isset($_POST['UP_B']) ) {
    $pkgUpdateSQL = "UPDATE packages SET duration_days = '" . trim($_POST['duration_days']) . "', price = '" . trim($_POST['Pprice']) . "', features = '" . trim($_POST['features']) . "', description = '" . trim($_POST['description']) . "' WHERE package_name = '" . trim($_POST['package_name']) . "'";

    if (mysqli_query($con, $pkgUpdateSQL)) {
        echo '<script>alert("Package updated successfully!");</script>';
    }
}

// Delete functionality
elseif (isset($_POST['DEL_B']) ) {
    $pkgDeleteSQL = "DELETE FROM packages WHERE package_name = '" . trim($_POST['package_name']) . "'";

    if (mysqli_query($con, $pkgDeleteSQL)) {
        echo '<script>alert("Package deleted successfully!");</script>';
        $check = false;
    } else {
        echo '<script>alert("Error deleting package.");</script>';
    }
}

// Add new package functionality
if (isset($_POST['ADD_B'])) {
    $package_name = trim($_POST['package_name']);
    $duration_days = trim($_POST['duration_days']);
    $price = trim($_POST['Pprice']);
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
	}
	else{
		
		echo '<script type="text/javascript">';
			echo 'alert("To see the Pckage information you need to login\nRedirect to Login page..!")';
			echo '</script>';	
			header("refresh:1;url=login.php");
	}
	
?>

</head>
<body>
    <div class="form-container" style="background-color:white" >
        <form id="form1" name="form1" method="post" action="">
					<h3>All Package Names</h3>
							<tr>
    <td>
        <div style="width: 50%; height: 75px; overflow-y: scroll; border: 1px solid #ccc; padding: 5px; background-color: #f9f9f9;">
            <?php foreach ($packages_name as $name): ?>
                <p><?php echo htmlspecialchars($name); ?></p>
            <?php endforeach; ?>
        </div>
    </td>
			</tr>
    
            <h2>Search Package</h2>
            <div align="center" >
                <input type="text" name="txtsearch" id="txtsearch" placeholder="Type package name here">
                <input type="submit" name="btnSearch" id="btnSearch" value="Search Package">
            </div>

            <!-- Existing Package Details -->
            <table>
                <tbody>
					
			
	
					
	                <tr>
                        <td><strong>Package Name</strong></td>
                        <td><input name="package_name" type="text" id="package_name" value="<?php if ($check) { echo $pnam; } ?>"></td>
                    </tr>
					


                        <td><strong>Duration (Days)</strong></td>
                        <td><input name="duration_days" type="text" id="duration_days" value="<?php if ($check) { echo $pdur; } ?>"></td>
                    </tr>
                    <tr>
                        <td><strong>Price</strong></td>
                        <td><input name="Pprice" type="text" id="Pprice" value="<?php if ($check) { echo $pamo; } ?>"></td>
                    </tr>
                    <tr>
                        <td><strong>Features</strong></td>
                        <td><textarea name="features" type="text" id="features"><?php if ($check) { echo $ppeaches; } ?></textarea></td>
                    </tr>
                    <tr>
                        <td><strong>Description</strong></td>
                        <td><textarea name="description" type="text" id="description" ><?php if ($check) { echo $pdescription; } ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <?php
							if ($_COOKIE['user'] == "Admin" || $_COOKIE['user_type'] == "Staff"){
                            
                                echo '<input type="submit" name="UP_B" id="UP_B" value="Update">';
                                echo '<input name="DEL_B" type="submit" id="DEL_B" value="Delete">';
                                echo '<input type="submit" name="ADD_B" id="ADD_B" value="Add Package">';
                            
							}
							else{
								
								
							}
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>