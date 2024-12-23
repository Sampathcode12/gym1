<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="form.css">
<title>Untitled Document</title>



<?php
	if(isset($_COOKIE['user'])){
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}
	include('connect.php');
	
					$fb="";
					$un="";
	$getfeedbackSQL="SELECT * FROM tblfeedback ";			

				if(mysqli_query($con,$getfeedbackSQL))
				{
					$pickfb=mysqli_query($con,$getfeedbackSQL);
					echo "<div class='feedbackdiv'>";
						while($raw=mysqli_fetch_array($pickfb))
						{
							echo $raw['F_note'];
							echo "<p align=right>User : ". $raw['U_name']."</p>";
							echo "<hr>";
						}	
					echo "</div>";
				}
		
if(isset($_POST['btnfeedback']))
	{
		if(isset($_COOKIE['user']))
		{			
			
			$fb=$_POST['txtfb'];
			$un=$_COOKIE['user'];
			
			$feedbackAddSQL="INSERT INTO tblfeedback  (F_note,U_name,	Id) VALUES('".$fb."','".$un."','0')";
			

				if(mysqli_query($con,$feedbackAddSQL))
				{
					$fb="";
					$un="";
					echo '<script type="text/javascript">';
					echo 'alert("Feedback Added..!")';
					
					echo '</script>';
					header('Location: feedback.php');
					
					exit;
				}
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("To submit feedback you need to login\nRedirect to Login page..!")';
			echo '</script>';	
			header('Location:login.php');
		}
			$fb="";
			$un="";
	}
	
	


	?>
	

</head>
<div class="form-container">
<body>
<form id="form1" name="form1" method="post" action="feedback.php">
  <p>&nbsp;</p>
  <table width="75%" border="0" cellpadding="2" align="center">
    <tbody>
      <tr>
        <td style="text-align: center"><p>New Feedback (Only 500 Charactors) <span id="fbcount"> 0</span> / 500
        <p>
          <textarea name="txtfb" cols="150" rows="20" required id="txtfb" oninput="countCharacters()"></textarea>
        </p></td>
      </tr>
      <tr>
        <td style="text-align: right"> User Email:<?php if(isset($_COOKIE['user'])){echo ($_COOKIE['user']);}?> </td>
      </tr>
      <tr>
        <td style="text-align: right"><input type="submit" name="btnfeedback" id="btnfeedback" value="Send Feedback" class="button"></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
       <script>
        function countCharacters() 
		   	{
				var textBox = document.getElementById('txtfb');
				var charCount = textBox.value.length;
				document.getElementById('fbcount').innerText = charCount;
				
				if (charCount >= 500) 
				{
                textBox.value = textBox.value.substring(0, 500);  // no more than 500 characters
            	}
        	}
    </script>
    
</form>
</body>
	</div>
</html>