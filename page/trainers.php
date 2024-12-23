<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Package Management</title>
<style type="text/css">
    body {
        background-image: url(../Image/allbg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
	<style type="text/css">
    body {
/*        background-image: url(../Image/allbg.jpg);*/
        background-repeat: no-repeat;
        background-size: cover;
    }
	<title>Package Management</title>
   
        body {
           
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #006400;
            margin-bottom: 20px;
        }

        table {
            width: 75%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .form-container {
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            margin: 20px auto;
            width: 75%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
        }
    
	
</style>


<?php
	//include('header.php');
	
	if(isset($_COOKIE['user'])){
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}
include('connect.php');
$check = false;
	
	$blogQuery = "SELECT Trainer_name FROM Trainers";
$blogResult = mysqli_query($con, $blogQuery);
if ($blogResult) {
    while ($row = mysqli_fetch_assoc($blogResult)) {
        $Trainers_name[] = $row['Trainer_name'];
    }
}

// Search functionality
	if(isset($_COOKIE['user']))
{
	if (isset($_POST['btnSearch'])) {
    $getsearchpkgSQL = "SELECT * FROM Trainers WHERE Trainer_name = '" . $_POST['txtsearch'] . "'";
    $picsearchkpkg = mysqli_query($con, $getsearchpkgSQL);

    if (mysqli_num_rows($picsearchkpkg)) {
        while ($raw = mysqli_fetch_array($picsearchkpkg)) {
			$email = $raw['email'];
            $Trainer_name = $raw['Trainer_name'];
            $Trainer_ex_year = $raw['Trainer_ex_year'];
            $Trainer_spetia = $raw['Trainer_spetial'];
            $Number = $raw['Number'];
            $expertise_path = $raw['expertise_path'];
            $check = true;
        }
    } else {
        echo '<script>alert("No Such data!");</script>';
    }
}

// Update functionality
if (isset($_POST['UP_B']) ) {
	echo ("its work");
    $pkgUpdateSQL = "UPDATE Trainers  SET email = '" . trim($_POST['email']) . "', Trainer_ex_year = '" . trim($_POST['Trainer_ex_year']) . "', Trainer_spetial = '" . trim($_POST['Trainer_spetial']) . "', Number = '" . trim($_POST['Number']) . "', expertise_path = '" . trim($_POST['expertise_path']) . "' WHERE Trainer_name = '" . trim($_POST['Trainer_name']) . "'";

    if (mysqli_query($con, $pkgUpdateSQL)) {
        echo '<script>alert("data updated successfully!");</script>';
    }
}

// Delete functionality
elseif (isset($_POST['DEL_B']) ) {
    $pkgDeleteSQL = "DELETE FROM Trainers WHERE Trainer_name = '" . trim($_POST['Trainer_name']) . "'";

    if (mysqli_query($con, $pkgDeleteSQL)) {
        echo '<script>alert("data deleted successfully!");</script>';
        $check = false;
    } else {
        echo '<script>alert("Error deleting Trainer.");</script>';
    }
}

// Add new package functionality
 if (isset($_POST['ADD_B'])) {
        $email = trim($_POST['email']);
        $Trainer_name = trim($_POST['Trainer_name']);
        $Trainer_ex_year = trim($_POST['Trainer_ex_year']);
        $Trainer_spetial = trim($_POST['Trainer_spetial']);
        $Number = trim($_POST['Number']);
        $expertise_path = trim($_POST['expertise_path']);

        // Check for duplicate Trainer name
        $checkSQL = "SELECT * FROM Trainers WHERE Trainer_name = '$Trainer_name'";
        $checkResult = mysqli_query($con, $checkSQL);

        if (mysqli_num_rows($checkResult) > 0) {
            // Trainer name already exists
            echo '<script>alert("Error: A trainer with this name already exists. Please choose a different name.");</script>';
        } else {
            $pkgAddSQL = "INSERT INTO Trainers (email, Trainer_name, Trainer_ex_year, Trainer_spetial, Number, expertise_path) 
                          VALUES ('$email', '$Trainer_name', '$Trainer_ex_year', '$Trainer_spetial', '$Number', '$expertise_path')";

            if (mysqli_query($con, $pkgAddSQL)) {
                echo '<script>alert("Trainer added successfully!");</script>';
            } else {
                echo '<script>alert("Error adding Trainer.");</script>';
            }
        }
    }	
	}
	
	else{
		
		echo '<script type="text/javascript">';
			echo 'alert("To see the trainer information you need to login\nRedirect to Login page..!")';
			echo '</script>';	
			header("refresh:1;url=login.php");
	}
?>

</head>
<div class="form-container">
<body>
<form id="form1" name="form1" method="post" action="">
		
      
<tr><h3>All Trainer Names</h3></tr>
<tr>
    <td>
        <div style="width: 25%; height: 75px; overflow-y: scroll; border: 1px solid #ccc; padding: 5px; background-color: #f9f9f9;">
            <?php foreach ($Trainers_name as $name): ?>
                <p><?php echo htmlspecialchars($name); ?></p>
            <?php endforeach; ?>
        </div>
    </td>
</tr
	   
	   
	   
	   
       
    <!-- Search Form -->
    <tr>
      <td align="center"><h2>Search Trainer
        <input type="text" name="txtsearch" id="txtsearch" placeholder="Type trainer name here">
        <input type="submit" name="btnSearch" id="btnSearch" value="Search ">
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
              <td align="center"><strong>Email</strong></td>
              <td align="center"><input name="email" type="text" id="email" value="<?php if($check){echo $email;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Name</strong></td>
              <td align="center"><input name="Trainer_name" type="text" id="Trainer_name" value="<?php if($check){echo $Trainer_name;} ?>"></td>
            </tr>
			  <tr>
              <td align="center"><strong>Exppeariyance</strong></td>
              <td align="center"><input name="Trainer_ex_year" type="text" id="Trainer_ex_year" value="<?php if($check){echo $Trainer_ex_year;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Spetial</strong></td>
              <td align="center"><input name="Trainer_spetial" type="text" id="Trainer_spetial" value="<?php if($check){echo $Trainer_spetia;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Number</strong></td>
              <td align="center"><input name="Number" type="text" id="Number" value="<?php if($check){echo $Number;} ?>"></td>
            </tr>
            <tr>
              <td align="center"><strong>Expertise_path</strong></td>
              <td><textarea align="center" input name="expertise_path" type="text" id="expertise_path"><?php if($check){echo $expertise_path;} ?></textarea></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td align="center">
				    <?php
				  if(isset($_COOKIE['user'])){
                            if ($_COOKIE['user'] == "Admin" || $_COOKIE['user_type'] == "Staff") {
                 echo   ' <input type="submit" name="UP_B" id="UP_B" value="Update">';
                 echo '<input type="submit" name="DEL_B" id="DEL_B"value="Delet">';
				echo	'<input type="submit" name="ADD_B" id="ADD_B" value="Add Trainer">';
                            }
				  }
                            
							else{
								
								
							}
                            ?>
                
                  
				</td>
			  </tr>
			</div>
		  </body>
	   </form
	   ></html>
