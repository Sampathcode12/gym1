<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="form.css">
<title>Feedback Page</title>

<?php
    if(isset($_COOKIE['user'])){
        include('header.php');
    } else {
        include('main_header.php');
    }
    include('connect.php');

    $fb = "";
    $un = "";

    // Handle the feedback submission
    if(isset($_POST['btnfeedback'])) {
        if(isset($_COOKIE['user'])) {
            $fb = $_POST['txtfb'];
            $un = $_COOKIE['user'];

            // Insert the feedback into the database
            $feedbackAddSQL = "INSERT INTO tblfeedback (F_note, U_name, Id) VALUES('".$fb."', '".$un."', '0')";

            if(mysqli_query($con, $feedbackAddSQL)) {
                $fb = "";
                $un = "";
                echo '<script type="text/javascript">';
                echo 'alert("Feedback Added!")';
                echo '</script>';
                header('Location: feedback.php');
                exit;
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("To submit feedback, you need to login. Redirecting to Login page...")';
            echo '</script>';    
            header('Location:login.php');
        }
        $fb = "";
        $un = "";
    }
?>

</head>
<body>
    <div class="form-container">
        <form id="form1" name="form1" method="post" action="feedback.php">
            <p>&nbsp;</p>
            <table width="75%" border="0" cellpadding="2" align="center">
                <tbody>
                    <tr>
                        <td style="text-align: center">
                            <p>New Feedback (Only 500 Characters) <span id="fbcount"> 0</span> / 500</p>
                            <p>
                                <textarea name="txtfb" cols="150" rows="20" required id="txtfb" oninput="countCharacters()"></textarea>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right">User Email: <?php if(isset($_COOKIE['user'])){ echo ($_COOKIE['user']); } ?> </td>
                    </tr>
                    <tr>
                        <td style="text-align: right">
                            <input type="submit" name="btnfeedback" id="btnfeedback" value="Send Feedback" class="button">
                        </td>
                        <td style="text-align: right">
						<!-- <a href="feedback.php"><input type="button" value="back" class="button" ></a> -->
						<input type="submit" name="btnfeedback" id="btnfeedback" value="view Feedback" class="button" formaction="feedback_view.php">
                           
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
            <script>
                function countCharacters() {
                    var textBox = document.getElementById('txtfb');
                    var charCount = textBox.value.length;
                    document.getElementById('fbcount').innerText = charCount;

                    // Limit to 500 characters
                    if (charCount >= 500) {
                        textBox.value = textBox.value.substring(0, 500);  // no more than 500 characters
                    }
                }
            </script>
        </form>
    </div>
</body>
</html>
