<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Page</title>
<style>
/* Reuse the CSS from your first form */
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1; width: 100%; max-width: 400px; margin: auto;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button, input[type=submit], input[type=reset] {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover, input[type=submit]:hover, input[type=reset]:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.container {
  padding: 16px;
}
</style>
</head>
	
	<?php
include('connect.php');

?>
<body>

<h2>Login Form</h2>

<form id="form1" name="form1" method="post" action="Login_check.php">
  <div class="container">
    <label for="U_name"><b>User Email</b></label>
    <input type="text" name="U_nameT" id="U_nameT" placeholder="Enter your email" required>

    <label for="U_password"><b>Password</b></label>
    <input type="password" name="U_passwordT" id="U_passwordT" placeholder="Enter your password" required>

    <input type="submit" name="Login_B" id="Login_B" value="Login">
    <input type="reset" name="reset" id="reset" value="Clear">
  </div>
  <div class="container" style="background-color:#f1f1f1; text-align: center;">
    <input type="submit" name="Register_B" id="Register_B" value="Sign up">
  </div>
</form>

</body>
</html>
