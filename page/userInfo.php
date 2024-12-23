<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registration - Step 1</title>
       <link rel="stylesheet" type="text/css" href="registe.css"> <!-- Link to external CSS -->

</head>
<body>

<form method="post" action="packageSelection.php" class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <div class="form-section">
        <label for="txtUname">User Name:</label>
        <input name="txtUname" type="text" required id="txtUname" placeholder="User name">
    </div>

    <div class="form-section">
        <label for="txtemail">Email:</label>
        <input name="txtemail" type="email" required id="txtemail" placeholder="Your email">
    </div>

    <div class="form-section">
        <label for="txtpassword">Password:</label>
        <input name="txtpassword" type="password" required id="txtpassword" placeholder="Password">
    </div>

    <div class="form-section">
        <label for="txtaddress">Address:</label>
        <textarea name="txtaddress" required id="txtaddress" placeholder="Your address"></textarea>
    </div>

    <div class="form-section">
        <label for="txtcontact">Contact:</label>
        <input name="txtcontact" type="text" required id="txtcontact" placeholder="Contact number">
    </div>

    <div class="form-section">
        <label for="txtdob">Date of Birth:</label>
        <input name="txtdob" type="date" required id="txtdob" max="">
    </div>

    <!-- User Type Selection for Admin -->
    <?php
	if (isset($_COOKIE['user']) && $_COOKIE['user'] == "Admin"): ?>
    <div class="form-section">
        <label for="txtUserType">User Type:</label>
        <select name="txtUserType" id="txtUserType">
            <option value="Admin">Admin</option>
            <option value="Customer">Customer</option>
            <option value="Staff">Staff</option>
        </select>
    </div>
    <?php endif; ?>

    <div class="form-actions">
        <button type="submit" name="submitUser" class="registerbtn">Next: Select Package</button>
    </div>
</form>

<?php
if (isset($_COOKIE['user']) && ($_COOKIE['user'] == "Admin" || $_COOKIE['user_type'] == "Staff")) {

    echo '<form method="post" action="user_modifiy.php" class="container">';
    echo '<div class="form-actions">';
    echo '<input type="submit" name="submitUser" value="Modify" class="modifybtn">';
    echo '</div>';
    echo '</form>';
}
?>
	
	<script>
    // Set the max attribute to 18 years before today
    const today = new Date();
    const eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate()).toISOString().split('T')[0];
    document.getElementById('txtdob').setAttribute('max', eighteenYearsAgo);
</script>

</body>
</html>
