<?php
	
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Trainer Search</title>
<style type="text/css">
    body {
        background-image: url(../Image/allbg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
	
	<style type="text/css">
    body {
        background-image: url(../Image/allbg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
	
	
	<title>Blog Management</title>
   
        body {
            background-image: url(../Image/allbg.jpg);
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
	
	if ($_COOKIE["user"]){
		//echo($_COOKIE["user"]);
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}
	
include('connect.php');
$check = false;

// Search functionality
if (isset($_POST['btnSearch'])) {
    $getsearchpkgSQL = "SELECT * FROM Trainers WHERE T_id  = '" . $_POST['txtsearch'] . "'";
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
?>

</head>
	
<body>
	<div class="form-container">
<table width="75%" border="0" cellpadding="2" align="center">
  <tbody>
   <form id="form1" name="form1" method="post" action="">
    
    <!-- Search Form -->
    <tr>
      <td align="center"><h2>Search Trainer
        <input type="text" name="txtsearch" id="txtsearch" placeholder="Type trainer name here">
        <input type="submit" name="btnSearch" id="btnSearch" value="Search">
      </h2></td>
    </tr>

    <!-- Display Trainer Details if found -->
    <tr>
      <td>
        <table width="75%" border="0" align="center">
          <tbody>
            <tr>
              <td align="center"><strong>Email</strong></td>
              <td align="center"><input name="email" type="text" id="email" value="<?php if($check){echo $email;} ?>" readonly></td>
            </tr>
            <tr>
              <td align="center"><strong>Name</strong></td>
              <td align="center"><input name="Trainer_name" type="text" id="Trainer_name" value="<?php if($check){echo $Trainer_name;} ?>" readonly></td>
            </tr>
            <tr>
              <td align="center"><strong>Experience</strong></td>
              <td align="center"><input name="Trainer_ex_year" type="text" id="Trainer_ex_year" value="<?php if($check){echo $Trainer_ex_year;} ?>" readonly></td>
            </tr>
            <tr>
              <td align="center"><strong>Specialization</strong></td>
              <td align="center"><input name="Trainer_spetial" type="text" id="Trainer_spetial" value="<?php if($check){echo $Trainer_spetia;} ?>" readonly></td>
            </tr>
            <tr>
              <td align="center"><strong>Number</strong></td>
              <td align="center"><input name="Number" type="text" id="Number" value="<?php if($check){echo $Number;} ?>" readonly></td>
            </tr>
            <tr>
              <td align="center"><strong>Expertise Path</strong></td>
              <td align="center"><input name="expertise_path" type="text" id="expertise_path" value="<?php if($check){echo $expertise_path;} ?>" readonly></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
   </form>
  </tbody>
</table>
		</dve>
</body>
</html>
