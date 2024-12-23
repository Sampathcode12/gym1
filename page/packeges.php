<?php
// Check if a cookie named 'user' is set
if (isset($_COOKIE['user'])) {
    echo "The 'user' cookie is available.";
} else {
    echo "The 'user' cookie is not available.";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Package</title>
<style type="text/css">
	
body {
	background-image: url(../Image/allbg.jpg);
			background-repeat:no-repeat; ;
		background-size: cover;
}
</style>

	<!-- USER ADDING -->
	
	<?php
	if(isset($_COOKIE['user'])){
		
		include('header.php');	}
	else{
		include('main_header.php');
	}
	
			include('connect.php');
	$check=false;	
	
	if(isset($_POST['btnSearch']))
	{		
		$getsearchpkgSQL = "SELECT * FROM packages where package_id='".$_POST['txtsearch']."'";
		$picsearchkpkg = mysqli_query($con, $getsearchpkgSQL);
		
		if(mysqli_num_rows($picsearchkpkg))
		{
			while ($raw = mysqli_fetch_array($picsearchkpkg)) 
			{
				$pnam=$raw['package_name'];
				//echo  $raw['package_name'];
				$pdur=$raw['duration_days'];
				$pamo=$raw['price'];
				$ppeaches=$raw['features'];
				$pdescription=$raw['description'];
				$check=true;
				//echo $pnam;
			}
		}
		else
		{		
			echo '<script type="text/javascript">';
        	echo 'alert("No Such Packege!")';
    		echo '</script>';	
		}
			//header( "refresh:1;url=login.php" );

		
	}
	
//	else if(isset($_POST['UP_B'])){
//		if(($_COOKIE['user']=="Admin"))
//	{
//		$pkgUpdateSQL = "UPDATE packages SET duration_days = '".trim($_POST['duration_days'])."',price = '".trim($_POST['Pprice'])."',features ='".trim($_POST['features'])."' ,description ='".trim($_POST['description'])."'WHERE package_name = '".trim($_POST['package_name'])."'";		
//		
//		if(mysqli_query($con, $pkgUpdateSQL))
//		{
//			mysqli_close($con);		
//			echo '<script type="text/javascript">';
//        	echo 'alert("User Recored Updated..!")';
//			'header("Location: Admin.php")';
//    		echo '</script>';	
//			
//		}
//		
//		
//	}
//	}
	?>
	<!-- END OF USER ADDING -->
	
</head>

<body>
<?php 
	//include ("header.php");
	?>
<table width="75%" border="0" cellpadding="2" align="center" vspace="550">
  <tbody>
   <form id="form1" name="form1" method="post" action="packeges.php">
    <tr>
      <td align="center">Welcome to 39PC</td>
    </tr>
    <tr>
      <td align="center"><h2>Search Package
        <input type="text" name="txtsearch" id="txtsearch" placeholder="type packege name here">
        <input type="submit" name="btnSearch" id="btnSearch" value="Sarch Package">
      </h2></td>
    </tr>
    <tr>
      <td>
        <table width="75%" border="0"  align="center">
          <tbody>
            <tr>
              <td width="45%" align="center" style="text-align: center"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-style: normal; font-weight: 900;"><strong>Packege Name</strong></p>
                <p>&nbsp;</p></td>
              <td width="55%" align="center" style="font-size: 16px"><input name="package_name" type="text"  id="package_name" value=<?php if($check){echo $pnam;}?>></td>
            </tr>
            <tr>
              <td height="77" align="center" style="text-align: center"><p><strong>Duration</strong></p>
                <p>&nbsp;</p></td>
              <td height="77" align="center" style="font-size: 16px"><input name="duration_days" type="text"  id="duration_days" value=<?php if($check){echo $pdur;}?>></td>
            </tr>
            <tr>
              <td align="center" style="text-align: center"><p><strong>Amount</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="Pprice" type="text"  id="Pprice" value=<?php if($check){echo $pamo;}?>></td>
            </tr>
            <tr>
              <td align="center" style="text-align: center"><p><strong>Features</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><input name="features" type="text"  id="features" value=<?php if($check){echo $ppeaches;}?>>
				</td>
            </tr>
			  <tr>
              <td align="center" style="text-align: center"><p><strong>Description</strong></p>
                <p>&nbsp;</p></td>
              <td align="center" style="font-size: 16px"><p>
                <input name="description" type="text"  id="description" value=<?php if($check){echo $pdescription;}?>>
              </p>
                <p>&nbsp; </p></td>
<!--
            </tr>
			  <tr>
			    <td align="right" style="text-align: center">&nbsp;</td>
			    <td align="right" style="font-size: 16px"><span style="text-align: center">
			      <input type="submit" name="UP_B" id="UP_B" value="Update">
			    </span>			      <input type="reset" name="reset" id="reset" value="clear"></td>
		    </tr>
-->
          </tbody>
        </table>
     </form>
</table>
</body>
</html>
