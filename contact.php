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
	<h3>Arrange a Viewing</h3>
     	<div class="cntr">
     <strong>Dirección:</strong> Centro de S.L.P, <b>Tel:</b> 01111 800777
	<br>&nbsp;<strong>Para reserver:</strong> use esta forma.</div>
<div id="form">
 
<form action="contact_handler.php" method="post" >
	
	<h3 >Llene todo lo que tenga asterisco</h3>
<!--Start of the text fields-->
			<label for="username"><span class="red">*</span>Nombre: </label>
       		<input id="username" name="username" size="30"><br>
				
       		<br><label for="useremail" ><span class="red">*</span>Email:</label>
       		<input id="useremail" name="useremail" size="30"><br>
 
    		<br><label for="phone" ><span class="red">*</span>Teléfono:</label>
    		<input id="phone" name="phone" size="30"><br><br> 
<h3>Número de Referencia de la habitación</h3>
		 	
		 		<label for="ref_num" ><span class="red">*</span>Número de Referencia de la habitación: </label>
       		<input id="ref_num" name="ref_num" size="30"><br><br>
       		
	<h3>¿Algún requerimiento especial?</h3>
<textarea id="comment" name="comment" rows="8" cols="40"></textarea>
<br>
<!--The submit button goes hereE-->
<input id="sb" value="Send" title="Send" alt="Send" type="submit"><br>
</form>
</div>	
</div>	
<br class="clear">
</div><!--End of the feedback form content--><footer>
footer goes here
</footer>
</div>
</body>
</html>
