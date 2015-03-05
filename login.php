<!doctype html>
<html lang=en>
<head>
<title>The Login page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
</head>
<body>
<div id="container">
<header>
<h1>Aramburo Inn</h1>
<h2>Bienvenido</h2>
<img id="rosette" alt="Rosette" title="Rosette" height="127" 
src="images/rosette-128.png" width="128">
</header>
<div id="container">


<div id="content"><!-- Start of the login page content. -->
<?php 
// This section processes submissions from the login form.
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//connect to database
	require ('mysqli_connect.php');
	// Validate the email address:
	if (!empty($_POST['email'])) {
			$e = mysqli_real_escape_string($dbcon, $_POST['email']);
	} else {
	$e = FALSE;
		echo '<p class="error">You forgot to enter your email address.</p>';
	}
	//Validate the password:
	if (!empty($_POST['psword'])) {
			$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
	} else {
	$p = FALSE;
		echo '<p class="error">You forgot to enter your password.</p>';
	}
	if ($e && $p){//if no problems
// Retrieve the user_id, first_name and user_level for that email/password combination:
		$q = "SELECT user_id, fname, user_level FROM admin WHERE (email='$e' AND psword='$p')";		
		$result = mysqli_query ($dbcon, $q); 
		// Check the result:
		if (@mysqli_num_rows($result) == 1) {//The user input matched the database rcoord
		// Start the session, fetch the record and insert the three values in an array
		session_start();
		$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
$_SESSION['user_level'] = (int) $_SESSION['user_level']; // Changes the 1 or 2 user level to an integer.
$url = ($_SESSION['user_level'] === 1) ? 'admin_page.php' : 'members-page.php'; // Ternary operation to set the URL
header('Location: ' . $url); // Makes the actual page jump. Keep in mind that $url is a relative path.
exit(); // Cancels the rest of the script.
	mysqli_free_result($result);
	mysqli_close($dbcon);
	ob_end_clean(); // Delete the buffer.
	} else { // No match was made.
	echo '<p class="error">The email address and password entered do not match our records.</p>';
	}
	} else { // If there was a problem.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($dbcon);
	} // End of SUBMIT conditional.
?>
<!-- Display the form fields-->
<div id="loginfields">
<?php include ('login_page.inc.php'); ?>
</div><br>

</div>
</div>	
</body>
</html>
