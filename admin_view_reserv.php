
<!doctype html>
<html lang=en>
<head>
<title>Admin View Reserves</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
p{ text-align:center; }
table { width:860px; border-collapse:collapse; }
td { padding-left:5px; padding-right:5px; }
#content h3 { text-align:center; font-size:130%; font-weight:bold; }
</style>
</head>
<body>
 
	  <h1>welcome admin</h1>
	  Choose option from Below to take action!!!!
	  Create new Booking click <a href="../registration.php"> Here</a>
	  <?php 
// This code fetches all the records from the houses table.
require ('mysqli_connect.php'); // Connect to the database.
//set the number of rows per display page
$pagerows = 4;
// Has the total number of pages already been calculated?
if (isset($_GET['p']) && is_numeric
($_GET['p'])) {//already been calculated
$pages=$_GET['p'];
}else{//use the next block of code to calculate the number of pages
//First, check for the total number of records
$q = "SELECT COUNT(id) FROM roomdetail";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$records = $row[0];
//Now calculate the number of pages
if ($records > $pagerows){ //if the number of records will fill more than one page
//Calculatethe number of pages and round the result up to the nearest integer
$pages = ceil ($records/$pagerows);
}else{
$pages = 1;
}
}//page check finished. Declare which record to start with
if (isset($_GET['s']) && is_numeric
($_GET['s'])) {//already been calculated
$start = $_GET['s'];
}else{
$start = 0;
}
// Make the query:
$q = "SELECT id, username, checkin_date, checkout_date, room_type, no_of_room, amount FROM roomdetail ORDER BY id ASC LIMIT $start, $pagerows";		
$result = @mysqli_query ($dbcon, $q); // Run the query.
//$houses = mysqli_num_rows($result);
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table>
<tr>
<td><b>Code</b></td>
<td><b>Usuario</b></td>
<td><b>Checkin</b></td>
<td><b>Checkout</b></td>
<td><b>Tipo de Hab</b></td>
<td><b>Número</b></td>
<td><b>Precio</b></td>
</tr>';
// Fetch and print all the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td>' . $row['id'] . '</td>
	<td>' . $row['username'] . '</td>
	<td>' . $row['checkin_date'] . '</td>
	<td>' . $row['checkout_date'] . '</td>
	<td>' . $row['room_type'] . '</td>
	<td>' . $row['no_of_room'] . '</td>
	<td>' . $row['amount'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Message:
	echo '<p class="error">The record could not be retrieved. We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/houses
$q = "SELECT COUNT(ref_num) FROM roomdetail";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$houses = $row[0];
mysqli_close($dbcon); // Close the database connection.
echo "<p>Total found: $houses</p>";
if ($pages > 1) {
echo '<p>';
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
echo '<a href="admin_view_reserv.php?s=' . ($start - $pagerows) . '&p=' . $pages . '">Previous</a> ';
}
//Create a Next link
if ($current_page != $pages) {
echo '<a href="admin_view_reserv.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Next</a> ';
}
echo '</p>';
}
?>
	  
	  </div>
</body>
</html>
