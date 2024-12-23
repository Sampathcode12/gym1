<?php include ('main_header.php'); ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login and Sign Up</title>
<!--    <link rel="stylesheet" type="text/css" href="form.css"> -->
	<style>
	
	/* General body styling */

body {
	background-image:url("../image/powerful-stylish-bodybuilder-with-tattoo-his-arm-doing-exercises-with-dumbbells-isolated-dark-background.jpg");
	 background-repeat: no-repeat;
        background-size: cover;
	
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content:space-between;
    align-items:flex-start;
    height: 100vh;  Full viewport height 
}


/* Container for the buttons */
.button-container {
    text-align:center;
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

/* Styling for gift-like buttons */
.button {
    width: 25%; /* Full width */
    padding: 15px;
    margin: 10px 0;
    background-color: #e74c3c; /* Festive red color */
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: background-color 0.3s, transform 0.3s;
}

/* Button decoration to resemble a gift */

.button:before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 6px;
    background-color: #c0392b;  Darker red for ribbon 
    transform: translateY(-50%);
}


.button:after {
    content: "";
    position: absolute;
    left: 50%;
    top: 0;
    width: 8px;
    height: 100%;
    background-color: #c0392b; /* Darker red for ribbon */
    transform: translateX(-50%);
}

/* Button hover effect */
.button:hover {
    background-color: #d62c1a; /* Slightly brighter on hover */
    transform: scale(1.05);
}

/* Button active effect */
.button:active {
    background-color: #b72a18; /* Even darker when clicked */
    transform: scale(0.98);
}

/* Responsive design */
@media (max-width: 60px) {
    .button {
        font-size: 16px;
        padding: 12px;
    }

    .button-container {
        padding: 10px;
    }
}

	</style>
	
	
</head>
<body>

    <!-- Include main header -->
	

 

    

    <!-- Container for buttons -->
    <div class="button-container">
    <form action="Login_check.php" id="form1" name="form1" method="post">
		
        <input type="submit" name="Login_B" id="Login_B" value="Login" formaction="login.php" class="button">
        <input type="submit" name="Register_B" id="Register_B" value="Sign Up" formaction="Login_check.php" class="button">
    
</div>


</body>
</html>