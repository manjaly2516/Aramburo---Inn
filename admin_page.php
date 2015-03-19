
<!doctype html>
<html lang=en>
<head>
<title>Admin page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<link rel="stylesheet" type="text/css" href="admin_form.css">
<style type="text/css">
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_admin_found.inc'); ?>
</header>

	<div id="content"><!--Start of admin page content-->
<?php
// This code is a query that INSERTs a house in the houses table
// Check that the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Initialize an errors array
// Check for location
	
// Has a price been entered?	
if (empty($_POST['price'])){
$errors[] ='You forgot to enter the price.' ;
}
elseif (!empty($_POST['price'])) {			
//Remove unwanted characters
//Use regex to ensure that the remaining characters are digits
$price = preg_replace('/\D+/', '', ($_POST['price']));
}	
// Check for a type
	if (empty($_POST['type'])) {
		$errors[] = 'You forgot to select the type of house.';
	} else {
		$type = trim($_POST['type']);
	}
// Check for brief description
	if (empty($_POST['mini_descr'])) {
			 $errors[] = 'You forgot to enter the brief description';
	} else { $mini_descr = strip_tags(($_POST['mini_descr']));
	}
	// Check for number of bedrooms
	if (empty($_POST['n_room'])) {
			 $errors[] = 'You forgot to enter the number';
	} else { $n_room = strip_tags(($_POST['n_room']));
	}
	// Check if a thumbnail url has been entered
	if (empty($_POST['thumb'])) {
				$errors[] = 'You forgot to enter the thumbnail url';
	} else {
		$thumb = ($_POST['thumb']);
	}
	// Check for status of the house
	if (empty($_POST['status'])) {
				$errors[] = 'You forgot to enter the status of the house';
	} else {
		$status = ($_POST['status']);
	}
if (empty($errors)) { // If the query ran OK
	// Register the house in the database
		require ('mysqli_connect.php'); // Connect to the database
		// Make the query:
		$q = "INSERT INTO houses (ref_num, price, type, mini_descr, n_room, thumb, status) VALUES (' ', '$price', '$type', '$mini_descr', '$n_room', '$thumb', '$status' )";		
		$result = @mysqli_query ($dbcon, $q); // Make the query
		if ($result) { // If it ran OK.
		echo '<h2>The room was successfully registered</h2><br>';
		} else { // If the query did not run OK
		// Error message:
			echo '<h2>System Error</h2>
			<p class="error">The room could not be added due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
	} else { // Display the errors
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditionals
?>


<h2>Add a Room</h2>
<form  action="admin_page.php" method="post">

<p>
	<label class="label" for="price">
	<b>Price:</b></label>
	<input id="price" type="text" name="price" size="15" maxlength="15" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">
</p>

<p>
	<label class="label" for="type"><b>Type:</b></label>	

<select name="type" >
	<option value="">- Select -</option>
	<option value="Vista al Centro">Vista al Centro</option>
	<option value="Sin Vista al Centro">Sin Vista al Centro</option>
</p>

<p>
	<label class="label" for="thumb">
	<b>Image:</b></label>
	<input id="thumb" type="text" name="thumb" size="15" maxlength="50" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">
</p>

<p>
	<label class="label" for="mini_descr">
	<b>Brief Description:</b></label>
	<textarea name="mini_descr" rows="3" cols="40"></textarea>
</p>

<p>
	<label class="label" for="n_room">
	<b>Number of rooms of this type:</b></label>
	<input id="n_room" type="text" name="n_room" size="15" maxlength="15" value="<?php if (isset($_POST['n_room'])) echo $_POST['n_room']; ?>">
</p>

<p>
	<label class="label">
	<b>URL for Full Description:</b></label>
	<input id="full_spec" type="text" name="full_spec" size="45" maxlength="45" value="<?php if (isset($_POST['full_spec'])) echo $_POST['full_spec']; ?>">
</p>

<p>
	<label class="label" for="status"><b>Status:</b></label>

<select name="status" >
	<option value="">- Select -</option>
	<option value="Available">Available</option>
	<option value="Sold">Full</option>
	</select>
</p>
	
	<div id="submit">
	<p><input id="submit" type="submit" name="submit" value="Add"></p>
	</div>
</form><!--End of the admin page content-->

<div>
	<br class="clear">
</div>	
</div>

<div>
</div>
</div>
</body>
</html>