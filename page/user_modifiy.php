<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style type="text/css">
	
body {
	background-color:white;
			background-repeat:no-repeat; ;
		background-size: cover;
}
</style>

	<!-- USER ADDING -->
	
	<?php
include('connect.php');

// Initialize variables
$Use_name = $Email = $Address = $Contact = $Birthday = $user_type = $package_name = "";
$check = false;

// Search button functionality
if (isset($_POST['btnSearch'])) {
    $getsearchpkgSQL = "SELECT * FROM user_info WHERE User_email = '" . $_POST['User_search'] . "' OR Use_name = '" . $_POST['User_search'] . "'";
    $picsearchkpkg = mysqli_query($con, $getsearchpkgSQL);

    if (mysqli_num_rows($picsearchkpkg)) {
        while ($raw = mysqli_fetch_array($picsearchkpkg)) {
            $Use_name = $raw['Use_name'];
            $Email = $raw['User_email'];
            $Address = $raw['Address'];
            $Contact = $raw['Contact'];
            $Birthday = $raw['Birthday'];
            $user_type = $raw['user_type'];
            $package_name = $raw['package_name'];
            $check = true;
        }
    } else {
        echo '<script>alert("No Such User!");</script>';
    }
}

// Update button functionality
if (isset($_POST['UpdateBT'])) {
    $UserUpdateSQL = "UPDATE user_info SET 
        User_email = '" . trim($_POST['User_email']) . "',
        Address = '" . trim($_POST['Address']) . "',
        Contact = '" . trim($_POST['Contact']) . "',
        Birthday = '" . trim($_POST['Birthday']) . "',
        user_type = '" . trim($_POST['user_type']) . "',
        package_name = '" . trim($_POST['package_name']) . "' 
        WHERE Use_name = '" . trim($_POST['Use_name']) . "'";

    if (mysqli_query($con, $UserUpdateSQL)) {
        echo '<script>alert("User Record Updated Successfully!");</script>';
    } else {
        echo '<script>alert("Error updating record: ' . mysqli_error($con) . '");</script>';
    }
}

// Delete button functionality
if (isset($_POST['btnDeleteUser'])) {
    $usernameToDelete = $_POST['Use_name'];
    $useremailToDelete = $_POST['User_email'];

    $deleteUserSQL = "DELETE FROM user_info WHERE Use_name = '$usernameToDelete'";
    $deleteUserloginSQL = "DELETE FROM login WHERE User_email = '$useremailToDelete'";

    if (mysqli_query($con, $deleteUserSQL)) {
        if (mysqli_query($con, $deleteUserloginSQL)) {
            echo '<script>alert("User record deleted successfully.");</script>';
            header('Location: user_modifiy.php');
            exit;
        } else {
            echo '<script>alert("Error deleting user login record.");</script>';
        }
    } else {
        echo '<script>alert("Error deleting user record.");</script>';
    }
}

// Clear button functionality
if (isset($_POST['btnClear'])) {
    $Use_name = $Email = $Address = $Contact = $Birthday = $user_type = $package_name = "";
    $check = false;
}
?>

	<!-- END OF USER ADDING -->
	
</head>

<body>
<?php 
	//include ("header.php");
	?>
<table width="75%" border="0" cellpadding="2" align="center" vspace="550">
  <tbody>
  <form id="form1" name="form1" method="post" action="user_modifiy.php">
    
    <tr>
      <td align="center"><h2>Search user
        <input type="text" name="User_search" id="User_search" placeholder="type user Email here">
        <input type="submit" name="btnSearch" id="btnSearch" value="Sarch user">
      </h2></td>
    </tr>
    <tr>
      <td>
        <table width="75%" border="0"  align="center">
          <tbody>
			  
            <tr>
              <td width="45%" align="center" style="text-align: center"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-style: normal; font-weight: 900;"><strong>User Name</strong></p>
                <p>&nbsp;</p></td>
              <td width="55%" align="center" style="font-size: 16px"><input name="Use_name" type="text"  id="Use_name" value=<?php if($check){echo $Use_name;}?>></td>
            </tr>
			
			  
            <tr>
              <td height="77" align="center" style="text-align: center"><p><strong>Email</strong></p>
                <p>&nbsp;</p></td>
              <td height="77" align="center" style="font-size: 16px"><input name="User_email" type="text"  id="User_email" value=<?php if($check){echo $Email;}?>></td>
            </tr>
			  
            <tr>
              <td align="center" style="text-align: center"><p><strong>Address</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="Address" type="text"  id="Address" value=<?php if($check){echo $Address;}?>></td>
            </tr>
			 
            <tr>
              <td align="center" style="text-align: center"><p><strong>Contact</strong></p>
                <p>&nbsp;</p></td>
				
              <td align="center" style="font-size: 16px"><input name="Contact" type="text"  id="Contact" value=<?php if($check){echo $Contact;}?>></td>
            </tr>
		  
			  <tr>
              <td align="center" style="text-align: center"><p><strong>Birthday</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="Birthday" type="text"  id="Birthday" value=<?php if($check){echo $Birthday;}?>></td>
            </tr>
			  <tr>
				 
              <td align="center" style="text-align: center"><p><strong>user type</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><select name="user_type" id="user_type" >
                <option value=<?php if($check){echo $user_type;}?>><?php if($check){echo $user_type;}?></option>                
              </select></td>
            </tr>
		  
			  <tr>
              <td align="center" style="text-align: center"><p><strong>package _name</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><select name="package_name" id="package_name" >
                <option value=<?php if($check){echo $package_name;}?>><?php if($check){echo $package_name;}?></option>                
              </select></td>
            </tr>
		  
            <tr>
              <td colspan="2" align="center"><p>
                <input type="submit" name="UpdateBT" id="UpdateBT" value="Update User">
                  <input type="submit" name="btnClear" id="btnClear" value="Clear">
				  <input type="submit" name="btnDeleteUser" id="btnDeleteUser" value="user delet">
              </p></td>
            </tr>
          </tbody>
        </table>
  </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>