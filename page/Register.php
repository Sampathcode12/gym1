<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New User</title>
<style type="text/css">
	
body {
	background-image: url(../Image/allbg.jpg);
			background-repeat:no-repeat; ;
		background-size: cover;
}
</style>

	<!-- USER ADDING -->
	
	<?php
	if(isset($_POST['Register']))
	{
		include('connect.php');

		$email=$_POST['Email'];
		$pw=MD5($_POST['Password']);

		if($_COOKIE['user']!="Admin")
		{
			$ut="Customer";
		}
		else
		{
		$ut=$_POST['txtUserType'];
		}
		
		
		$uname=$_POST['Name'];
		$address=$_POST['Address'];
		$contact=$_POST['Rel'];
		$dob=$_POST['DofB'];



		$userAddSQL="INSERT INTO usertbl VALUES('".$email."','".$pw."','".$ut."')";
		$userInfoAddSQL="INSERT INTO userinfotbl VALUES('".$uname."','".$email."','".$address."','".$contact."','".$dob."')";

		if(mysqli_query($con,$userAddSQL))
		{
			mysqli_query($con,$userInfoAddSQL);
			
			echo '<script type="text/javascript">';
        	echo 'alert("New User Added..!")';
    		echo '</script>';	
			
			header( "refresh:1;url=login.php" );

		}
		else
		{
			echo '<script type="text/javascript">';
        	echo 'alert("Error in New user Adding process.")';
    		echo '</script>';	
		}
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
    <tr>
      <td> </td>
    </tr>
    <tr>
      <td><form id="form1" name="form1" method="post" action="newUser.php">
        <table width="75%" border="0"  align="center">
          <tbody>
            <tr>
              <td width="45%" align="center" style="text-align: center"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-style: normal; font-weight: 900;"><strong>User Name</strong></p>
                <p>&nbsp;</p></td>
              <td width="55%" align="center" style="font-size: 16px"><input name="Name" type="text" required id="Name" placeholder="user name"></td>
            </tr>
            <tr>
              <td height="77" align="center" style="text-align: center"><p><strong>Email</strong></p>
                <p>&nbsp;</p></td>
              <td height="77" align="center" style="font-size: 16px"><input name="txtemail" type="email" required id="Email" placeholder="your email"></td>
            </tr>
            <tr>
              <td align="center" style="text-align: center"><p><strong>Password</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="txtpassword" type="text" required id="Password"></td>
            </tr>
            <tr>
              <td align="center" style="text-align: center"><p><strong>Address</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><textarea name="Address" required id="Address"></textarea></td>
            </tr>
            <tr>
              <td align="center" style="text-align: center"><p><strong>Contact</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="Tel" type="text" required id="Tel"></td>
            </tr>
            <tr>
              <td align="center" style="text-align: center">Package</td>
              
              
              <td align="center" style="font-size: 16px"><select name="select" id="select">


                                        <?php              
				  						include('dbcode.php');
                                        $getpkgSQL = "SELECT * FROM pkgtbl";
                                        $pickpkg = mysqli_query($con, $getpkgSQL);
                                        while ($raw = mysqli_fetch_array($pickpkg)) {
                                            echo "<option value='" . htmlspecialchars($raw['pName']) . "'>" . htmlspecialchars($raw['pName']) . "</option>";
                                        }
                                        ?>
              </select>
              
              </td>
            </tr>
            <tr>
              <td align="center" style="text-align: center"><p><strong>Date of Birth</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="DofB" type="date" required="required" id="DofB"></td>
            </tr>
            
                <?php 
				if(($_COOKIE['user']=="Admin"))
				{
					echo '<tr>';
					echo '<td align="center" style="text-align: center"><p><strong>User Type</strong></p>';
					echo '<p>&nbsp;</p></td>';
					echo '<td align="center" style="font-size: 16px"><select name="txtUserType" id="txtUserType">';
					echo '<option value="Admin">Admin</option>';
					echo '<option value="Customer">Customer</option>';
					echo '<option value="Staff">Staff</option>';
					echo '</select></td>';
					echo '</tr>';
				}
				?>
             
        
            <tr>
              <td colspan="2" align="center"><p>
                <input type="submit" name="Register" id="Register" value="Sign In">
                <input  type="reset" name="button" id="button" value="Clear">
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
</body>
</html>