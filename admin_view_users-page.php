<!doctype html>
<html lang=en>
<head>
<title>View users page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">
<?php include("header-admin.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col.php"); ?>
<div id="content"><!-- Start of the page-specific content. -->
<h2>These are the registered users</h2>
<p>
<?php 
// This script retrieves all the records from the users table.
require ('mysqli_connect.php'); // Connect to the database.
// Make the query:
$q = "SELECT CONCAT(lname, ', ', fname) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat FROM users ORDER BY registration_date ASC";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table>
<tr><td align="left"><b>Edit</b></td><td align="left"><b>Delete</b></td><td align="left"><b>Name</b></td><td align="left"><b>Date Registered</b></td></tr>';
// Fetch and print all the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['regdat'] . '</td></tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Public message:
	echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($r) IF.
mysqli_close($dbcon); // Close the database connection.
?>
</p>
</div><!-- End of the page-specific content. -->

</div>
</body>
</html>