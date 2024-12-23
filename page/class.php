<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Class Management</title>
<link rel="stylesheet" type="text/css" href="form.css">
	<?php
				  
			
				  if(isset($_POST['booking']))
	{
		if(isset($_COOKIE['user']))
		{
			
			header('Location:bookin.php');
		}
					  
					  else{
			echo '<script type="text/javascript">';
			echo 'alert("To submit feedback you need to login\nRedirect to Login page..!")';
			echo '</script>';	
			header('Location:login.php');
		}
				  }
			
				  ?>

<?php
	if(isset($_COOKIE['user'])){
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}
	
include('connect.php');
$check = false;
			$blogQuery = "SELECT Cname FROM classtb";
$blogResult = mysqli_query($con, $blogQuery);
if ($blogResult) {
    while ($row = mysqli_fetch_assoc($blogResult)) {
        $class_name[] = $row['Cname'];
    }
}

// Search functionality
if (isset($_POST['btnSearch'])) {
    $getsearchpkgSQL = "SELECT * FROM classtb WHERE Cname = '" . $_POST['txtsearch'] . "'";
    $picsearchkpkg = mysqli_query($con, $getsearchpkgSQL);

    if (mysqli_num_rows($picsearchkpkg)) {
        while ($raw = mysqli_fetch_array($picsearchkpkg)) {
            $Cname = $raw['Cname'];
            $date = $raw['date'];
            $time = $raw['time'];
            $Trainer_name = $raw['Trainer_name'];
            $description = $raw['description'];
            $check = true;
        }
    } else {
        echo '<script>alert("No Such data!");</script>';
    }
}

// Update functionality
if (isset($_POST['UP_B']) ) {
    $pkgUpdateSQL = "UPDATE classtb SET date = '" . trim($_POST['date']) . "', time = '" . trim($_POST['time']) . "', Trainer_name = '" . trim($_POST['Trainer_name']) . "', description = '" . trim($_POST['description']) . "' WHERE Cname = '" . trim($_POST['Cname']) . "'";

    if (mysqli_query($con, $pkgUpdateSQL)) {
        echo '<script>alert("class updated successfully!");</script>';
    }
}

// Delete functionality
elseif (isset($_POST['DEL_B']) ) {
    $pkgDeleteSQL = "DELETE FROM classtb WHERE Cname = '" . trim($_POST['Cname']) . "'";

    if (mysqli_query($con, $pkgDeleteSQL)) {
        echo '<script>alert("class deleted successfully!");</script>';
        $check = false;
    } else {
        echo '<script>alert("Error deleting class.");</script>';
    }
}

// Add new package functionality
if (isset($_POST['ADD_B'])) {
    $Cname = trim($_POST['Cname']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    $Trainer_name = trim($_POST['Trainer_name']);
    $description = trim($_POST['description']);
    
    $pkgAddSQL = "INSERT INTO classtb (Cname, date, time,Trainer_name, description) 
                  VALUES ('$Cname', '$date', '$time', '$Trainer_name', '$description')";

    if (mysqli_query($con, $pkgAddSQL)) {
        echo '<script>alert("class added successfully!");</script>';
    } else {
        echo '<script>alert("Error adding class.");</script>';
    }
}
	

?>

</head>
<div class="form-container" style="background-color: white">
<body>

   <form id="form1" name="form1" method="post" action="class.php">
    
      
  
	   <tr><h3>All class</h3></tr>

    <td>
        <div style="width: 25%; height: 75px; overflow-y: scroll; border: 1px solid #ccc; padding: 5px; background-color: #f9f9f9;">
            <?php foreach ($class_name as $name): ?>
                <p><?php echo htmlspecialchars($name); ?></p>
            <?php endforeach; ?>
        </div>
    </td>

    
    <!-- Search Form -->
    <tr>
      <td align="center"><h2>Search class
        <input type="text" name="txtsearch" id="txtsearch" placeholder="Type class name here">
        <input type="submit" name="btnSearch" id="btnSearch" value="Search Class">
      </h2></td>
    </tr>
<table width="75%" border="0" cellpadding="2" align="center">
  <tbody>
    <!-- Existing Package Details -->
    <tr>
      <td>
        <table width="75%" border="0" align="center">
          <tbody>
            <tr>
              <td align="center"><strong>class Name</strong></td>
              <td align="center"><input name="Cname" type="text" id="Cname" value="<?php if($check){echo $Cname;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Date</strong></td>
              <td align="center"><textarea name="date" type="text" id="date" ><?php if($check){echo $date;} ?></textarea></td>
            </tr>
            <tr>
              <td align="center"><strong>Time</strong></td>
              <td align="center"><input name="time" type="text" id="time" value="<?php if($check){echo $time;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Trainer Name</strong></td>
              <td align="center"><input name="Trainer_name" type="text" id="Trainer_name" value="<?php if($check){echo $Trainer_name;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Duration</strong></td>
              <td align="center"><input name="description" type="text" id="description" value="<?php if($check){echo $description;} ?>"></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td align="center">
				  	  <input type="submit" name="booking" id="booking" value="Booking"  >
				  
                  
               <?php 
				  if(isset($_COOKIE['user'])){
				  if ($_COOKIE['user'] == "Admin" || $_COOKIE['user_type'] == "Staff"){
					 
				echo ' <input type="submit" name="UP_B" id="UP_B" value="Update">';
                 echo '<input name="DEL_B" type="submit" id="DEL_B" value="Delete">';
				echo	'<input type="submit" name="ADD_B" id="ADD_B" value="Add ">';

				  }
											 }
				  
				  ?>
				</td>
			  </tr>
			</tbody>
		  </table>
		  </form>
	   </body>
	   </div>