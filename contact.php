<!doctype html>
<html lang=en>
<head>
<title>Contact page - Devon Real Estate</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="ie8.css">
<![endif]-->
<style type="text/css">
span.red { 	color:red; }
div.cntr { text-align:center; }
form { margin-left:15px; font-weight:bold; 	color:black; }
#midcol h3 { font-size:130%; text-align:center;}
form { 	margin-left:30px; }
form h3 { text-align:center; }
label { width:250px; float:left; text-align:right; }
input { float:left; }
textarea { margin-left:190px; }
#sb { margin-left:330px; }
</style>
<!--Add conditional Javascript-->
<!--[if lte IE 8]><script src="html5.js">
</script>
<![endif]-->
</head>
<body>
<div id="container">
<header>
<h1>Aramburo Inn</h1>
<h2>Nuestros hoteles son lo mejor</h2>
<img id="rosette" alt="Rosette" title="Rosette" height="127" 
src="images/rosette-128.png" width="128">
</header>
<div id="content">
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div><!--end of side menu column-->
<div id="midcol">
	<h3>Reservas</h3>
     	<div class="cntr">
     <strong>Dirección:</strong> Centro de S.L.P, <b>Tel:</b> 01111 800777
	<br>&nbsp;<strong>Para reserver:</strong> use esta forma.</div>

<?php 
// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['ref_num'])) && (is_numeric($_GET['ref_num'])) ) { // From view_users.php
$id = $_GET['ref_num'];
} elseif
( (isset($_POST['ref_num'])) && (is_numeric($_POST['ref_num'])) ) { // Form submission.
	$id = $_POST['ref_num'];
} else { // If no valid ID, stop the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	
	exit();
}
require ('mysqli_connect.php');

$q = "SELECT CONCAT(ref_num, ' ', mini_descr) FROM houses WHERE ref_num=$id";
$result = @mysqli_query ($dbcon , $q);
	if (mysqli_num_rows($result) == 1) { 
		$row = mysqli_fetch_array ($result, MYSQLI_NUM);
		echo "<h3>Reservando habitación $row[0] </h3>";
		echo '<form action="contact.php" method="post" >
		<h3 >Llene todo lo que tenga asterisco</h3>
		<label for="clientName"><span class="red">*</span>Nombre: </label>
		<input id="clientName" name="clientname" size="30"><br>
		<br><label for="clientemail" ><span class="red">*</span>Email:</label>
		<input id="clientemail" name="clientemail" size="30"><br>
		<br><label for="phone" ><span class="red">*</span>Teléfono:</label>
		<input id="phone" name="phone" size="30"><br><br>
		<h3>¿Algún requerimiento especial?</h3>
		<textarea id="comment" name="comment" rows="8" cols="40"></textarea>
		<br>
		<input id="sb" value="Send" title="Send" alt="Send" type="submit"><br>
		</form>
		';
}
?>


</div>	
<br class="clear">
</div><!--End of the feedback form content--><footer>
footer goes here
</footer>
</div>
</body>
</html>
