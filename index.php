<!doctype html>
<html lang=en>
<head>
<title>Real estate home page.</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="transparent.css">
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="ie8.css">
<![endif]-->
<style type="text/css">
#leftcol h3 { margin-bottom:-10px; }
#midcol h3 { margin-top:-10px; }
.black { color:black; }
form { margin-left:15px; font-weight:bold; 	color:black; }
select { margin-bottom:5px; }
h3 { font-size:130%; }
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
<h2>Bienvenido</h2>
<img id="rosette" alt="Rosette" title="Rosette" height="127" 
src="images/rosette-128.png" width="128">
</header>
<div id="content">
<div id="leftcol">
	<h3>Busca tu habitación ideal</h3><br>
	<span class="black"><strong>IMPORTANTE: Selecciona<br>un item en cada categoría.</strong></span><br>
<form action="found_houses.php" method="post">

Precio Máximo<br>
	<select name="price">
	<option value="">- Select -</option>
	<option value="1000">&pound;1,000</option>
	<option value="2000">&pound;2,000</option>
	<option value="3000">&pound;3,000</option>
	</select><br>
Type<br>
	<select name="type">
	<option value="">- Select -</option>
	<option value="Vista al Centro">Vista al Centro</option>
	<option value="Sin Vista al Centro">Sin Vista al Centro</option>
	</select><br>

	<p><input id="submit" type="submit" name="submit" value="Search"></p>
</form></div>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div><!--end of side menu column-->
<div id="midcol">
	<h3>Nuestro hotel esta <br>en el hermoso centro de San Luis Potosí.</h3>
	<img alt="SW England" height="238" src="images/devon-map-crop.jpg" width="345">
</div>
	<br class="clear">
</div><!--End of page content-->
<footer>footer goes here
</footer>
</div>
</body>
</html>
