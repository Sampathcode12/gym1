<?php

if(isset($_COOKIE['user'])){
		
		include('header.php');
	}
	else{
		include('main_header.php');
	}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Package Management</title>
<style type="text/css">
    body {
     
		background-color: #F7EFEF;
        background-repeat: no-repeat;
        background-size: cover;
    }
	
	
	<title>Blog Management</title>
   
        body {
          
			
			background-color: #F7EFEF;
           font-family: Arial, Helvetica, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #006400;
            margin-bottom: 20px;
        }

        table {
            width: 75%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
       			 }

        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .form-container {
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            margin: 20px auto;
            width: 75%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
        }
    
	
</style>



<?php
	//include('header.php');
include('connect.php');
$check = false;
	// Fetch all blog names
$blogQuery = "SELECT Blog_name FROM Blog";
$blogResult = mysqli_query($con, $blogQuery);
if ($blogResult) {
    while ($row = mysqli_fetch_assoc($blogResult)) {
        $blogNames[] = $row['Blog_name'];
    }
}

// Search functionality
if (isset($_POST['btnSearch'])) {
    $getsearchpkgSQL = "SELECT * FROM Blog WHERE Blog_Name = '" . $_POST['txtsearch'] . "'";
    $picsearchkpkg = mysqli_query($con, $getsearchpkgSQL);

    if (mysqli_num_rows($picsearchkpkg)) {
        while ($raw = mysqli_fetch_array($picsearchkpkg)) {
            $Blog_name = $raw['Blog_name'];
            $Blog_post = $raw['Blog_post'];
            $Submit_user_name = $raw['Submit_user_name'];
            $Submit_date = $raw['Submit_date'];
                        $check = true;
        }
    } else {
        echo '<script>alert("No Such Blog Nmae!");</script>';
    }
}

// Update functionality
if (isset($_POST['UP_B']) ) {
    $pkgUpdateSQL = "UPDATE Blog SET Blog_post = '" . trim($_POST['Blog_post']) . "', Submit_user_name = '" . trim($_POST['Submit_user_name']) . "', Submit_date = '" . trim($_POST['Submit_date']) . "' WHERE Blog_name = '" . trim($_POST['Blog_name']) . "'";

    if (mysqli_query($con, $pkgUpdateSQL)) {
        echo '<script>alert("Blog updated successfully!");</script>';
    }
	else{
		 echo '<script>alert("Blog updated Not successfully!");</script>';
		
	}
}

// Delete functionality
elseif (isset($_POST['DEL_B']) ) {
    $pkgDeleteSQL = "DELETE FROM Blog WHERE Blog_name = '" . trim($_POST['Blog_name']) . "'";

    if (mysqli_query($con, $pkgDeleteSQL)) {
        echo '<script>alert("Blogdeleted successfully!");</script>';
        $check = false;
    } else {
        echo '<script>alert("Error deleting Blog.");</script>';
    }
}

// Add new package functionality
if (isset($_POST['ADD_B'])) {
    $Blog_name = trim($_POST['Blog_name']);
    $Blog_post = trim($_POST['Blog_post']);
    $Submit_user_name = trim($_POST['Submit_user_name']);
    $Submit_date = trim($_POST['Submit_date']);
    
    
    $pkgAddSQL = "INSERT INTO Blog (Blog_name, Blog_post, Submit_user_name, Submit_date ) 
                  VALUES ('$Blog_name', '$Blog_post', '$Submit_user_name', '$Submit_date')";

    if (mysqli_query($con, $pkgAddSQL)) {
        echo '<script>alert("Blog added successfully!");</script>';
    } else {
        echo '<script>alert("Error adding Blog.");</script>';
    }
}
	
	
	
?>

</head>

<body>
	
	
	<div class="form-container">

    
		
		
		  <tr><h3>All Blogs</h3></tr>

    <td>
        <div style="width: 25%; height: 75px; overflow-y: scroll; border: 1px solid #ccc; padding: 5px; background-color: #f9f9f9;">
            <?php foreach ($blogNames as $name): ?>
                <p><?php echo htmlspecialchars($name); ?></p>
            <?php endforeach; ?>
        </div>
    </td>
    
    <!-- Search Form -->
		<form id="form1" name="form1" method="post" action="Blog.php">
    <tr>
		
      <td align="center"><h2>Search 
        <input type="text" name="txtsearch" id="txtsearch" placeholder="Type blog name here">
        <input type="submit" name="btnSearch" id="btnSearch" value="Search ">
      </h2></td>
    </tr>
		
		<table width="75%" border="0" cellpadding="2" align="center">
  <tbody>
   <form id="form1" name="form1" method="post" action="">

    <!-- Existing Package Details -->
    <tr>
      <td>
        <table width="75%" border="0" align="center">
          <tbody>

			   <tr>
                <td align="center"><strong>Blog name</strong></td>
               <td align="center"><input name="Blog_name" type="text" id="Blog_name" value="<?php if($check){echo htmlspecialchars($Blog_name);} ?>"></td>

              </tr>
            <tbody>
              <tr></tr>
              <tr >
                <td  align="center"><strong>Blog_post</strong></td>
                
                <td align="center" >
                  
                <textarea  name="Blog_post" cols="30" rows="20" id="Blog_post" ><?php if($check){echo $Blog_post;} ?>
              </textarea></td>
              </tr>
              <tr>
                <td align="center"><strong>Writer name</strong></td>
                <td align="center"><input name="Submit_user_name" type="text" id="Submit_user_name" value="<?php if($check){echo $Submit_user_name;} ?>"></td>
              </tr>
              <tr>
                <td align="center"><strong>Date</strong></td>
                <td align="center"><input name="Submit_date" type="text" id="Submit_date" value="<?php if($check){echo $Submit_date;} ?>"></td>
              </tr>
  <!--
            <tr>
              <td align="center"><strong>Description</strong></td>
              <td align="center"><input name="description" type="text" id="description" value="<?php //if($check){echo $pdescription;} ?>"></td>
            </tr>
-->
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center">
                  
                  
                  <?php
				  if(isset($_COOKIE['user'])){
				  if($_COOKIE['user']=='Admin'){ 
					echo ' <input type="submit" name="ADD_B" id="ADD_B" value="Add ">';
					echo  '<input type="submit" name="UP_B" id="UP_B" value="Update">';
				 echo '<input name="DEL_B" type="submit" id="DEL_B" value="Delet">';
				 
}
				  }
                 ?>
                  </dve>
				
		
    
</body>
		  
	   </html>