<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center</title>
    <link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">FitZone Fitness Center</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="Home1.php">Home</a></li>
                <li><a href="delet_package.php">Packages</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="trainers.php">Trainers</a></li>
                <li><a href="class.php">Class</a></li>
				<?php
				if ($_COOKIE['user'] == "Admin"){
             echo  ' <li><a href="Admin.php">Admin</a>  </li>';
             echo '  <li></li>';}
				
				
//				elseif  ($_COOKIE['user_type'] == "Customer"){
//             echo  ' <li><a href="Customer.php">Customer</a>  </li>';
//             echo '  <li></li>';}
				
				elseif  ($_COOKIE['user_type'] == "Staff") {
             echo  ' <li><a href="Staff.php">Staff</a>  </li>';
             echo '  <li></li>';}
				
				
				


                ?>
                <li><a href="Log_out.php">Log out</a></li>
				
            </ul>
			
        </div>
    </div>
</body>
</html>
