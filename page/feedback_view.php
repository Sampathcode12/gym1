<!-- view_feedback.php -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<style>

    /* Button styling for <button> and <a> */
.button {
    background-color: #2e8b57; /* Green button */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none; /* Remove underline from links */
    display: inline-block; /* Allow for better alignment */
}

.button:hover {
    background-color: #1e6b43; /* Darker green on hover */
}

</style>

<title>View Feedback</title>

<?php
    // Include header and database connection
   // include('header.php');
    include('connect.php');

    // Fetch feedback data from the database
    $getfeedbackSQL = "SELECT * FROM tblfeedback";
    $pickfb = mysqli_query($con, $getfeedbackSQL);

    // Check if there is any feedback data
    if(mysqli_num_rows($pickfb) > 0) {
        echo "<div class='feedbackdiv'>";
        echo "<table border='0' style='width:50%; margin-top: 20px;'> <br>";
        echo "<tr><th>user name</th><th>Feedback</th></tr>";

        // Loop through the feedback data and display it
        while($raw = mysqli_fetch_array($pickfb)) {
            echo "<tr>";
            // echo "<td>" . $raw['Id'] . "</td>";
             echo "<td>" . $raw['U_name'] . "</td>";
            echo "<td>" . $raw['F_note'] .  " </td>";
         
            // echo "<td>" . $raw['created_at'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>No feedback available</p>";
    }

    // Close the database connection
    mysqli_close($con);
?>

</head>
<body>

   <form id="form1" name="form1" method="post" >  
    <input type="submit" name="feedback.php" id="feedback.php" value="Back" class="button" formaction="feedback.php" align="right">
   </form>
  

                                    
</body>
</html>
