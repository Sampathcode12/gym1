<?php
	if($_COOKIE['user']){
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}
?>

<?php




include('connect.php');
// Booking functionality

			$blogQuery = "SELECT Cname FROM classtb";
$blogResult = mysqli_query($con, $blogQuery);
if ($blogResult) {
    while ($row = mysqli_fetch_assoc($blogResult)) {
        $class_name[] = $row['Cname'];
    }
}
if (isset($_POST['book_class'])) {
    $class_name = trim($_POST['class_name']);
    $user_name = trim($_POST['user_name']);
    $booking_date = trim($_POST['booking_date']);
    $booking_time = trim($_POST['booking_time']);
	
	$classSQL= "INSERT INTO classtb VALUES(user_name) classtb  VALUES ($user_name)";

    $bookingSQL = "INSERT INTO bookings (class_name, booking_date, booking_time,user_name) 
                   VALUES ('$class_name', '$booking_date', '$booking_time','$user_name')";

    if (mysqli_query($con, $bookingSQL)) {
        echo '<script>alert("Class booked successfully!");</script>';
		header("refresh:1;url=bookin.php");
    } else {
        echo '<script>alert("Error booking class.");</script>';
    }
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="form.css">
	
	
	
</style>
<title>Untitled Document</title>
	
	
</head>
<div class="form-container">
<body>
	<h2>Book a Class</h2>
<form id="bookingForm" name="bookingForm" method="post" action="bookin.php">
    <table>
        <tr>
            <td><strong>Class Name</strong></td>
            <td>
                <select name="class_name" id="class_name" required>
                    <?php foreach ($class_name as $name): ?>
                        <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Your Name</strong></td>
            <td><input name="user_name" type="text" id="user_name" placeholder="Enter user name"></td>
        </tr>
        <tr>
            <td><strong>Date</strong></td>
            <td><input name="booking_date" type="date" id="booking_date" required></td>
        </tr>
        <tr>
            <td><strong>Time</strong></td>
            <td><input name="booking_time" type="time" id="booking_time" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="book_class" id="book_class" value="Book Class"></td>
        </tr>
    </table>
</form>

</body>
	</div>
</html>