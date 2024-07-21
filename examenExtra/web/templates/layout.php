<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Examen Extraordinaria </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css"
	href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />

</head>
<body>
	<div id="cabecera">
		<h1>Examen Extraordinaria 7S</h1>
	</div>
<?php 
/*
 * Menú
 */
if (!isset($menu))
$menu='menu0.php' ;
 include $menu 
 ?>

<div id="contenido">
<?php echo $contenido ?>
</div>

	<div id="pie">
		<hr />
		<div style = "text-align:center">- pie de página -</div>
	</div>
</body>
</html>
