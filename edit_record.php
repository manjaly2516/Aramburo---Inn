<?php											
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
header("Location: login.php");
exit();
}
?>
<!doctype html>
<html lang=en>
<head>
<title>Edit a room</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
p { text-align:center; }
input.fl-left { float:left; }
#submit { float:left; }
</style>
</head>
<body>
<div id="container">
<?php include('includes/header_admin.inc'); ?>
<div id="content"><!-- Start of the page-specific content. -->
<h2>Edit a Rom</h2>
<?php 
// After clicking the Edit link in the found_record.php page, the editing interface appears 
// The code looks for a valid user ID, either through GET or POST:
if ( (isset($_GET['ref_num'])) && (is_numeric($_GET['ref_num'])) ) { // From view_users.php
$id = $_GET['ref_num'];
} elseif
( (isset($_POST['ref_num'])) && (is_numeric($_POST['ref_num'])) ) { // Form submission.
	$id = $_POST['ref_num'];
} else { // If no valid ID, stop the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	
	exit();
}
require ('./mysqli_connect.php'); 
// Has the form been submitted?
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

// Select the user's information:
$q = "SELECT CONCAT(ref_num, ' ', mini_descr) FROM houses WHERE ref_num=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
	// Get the user's information:
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form:
	echo '<form action="edit_record.php" method="post">
<p><label class="label" for="fname">First Name:</label><input class="fl-left" id="fname" type="text" name="fname" size="30" maxlength="30" value="' . $row[0] . '"></p>
<br><p><label class="label" for="lname">Last Name:</label><input class="fl-left" type="text" name="lname" size="30" maxlength="40" value="' . $row[1] . '"></p>
<br><p><label class="label" for="email">Email Address:</label><input class="fl-left" type="text" name="email" size="30" maxlength="50" value="' . $row[2] . '"></p>
<br><p><input id="submit" type="submit" name="submit" value="Edit"></p>
<br><input type="hidden" name="id" value="' . $id . '" />
</form>';
} else { // The user could not be validated
	echo '<p class="error">This page has been accessed in error.</p>';
}
mysqli_close($dbcon);

?>
</div>
</div>
</body>
</html>