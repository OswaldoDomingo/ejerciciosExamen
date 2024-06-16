
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>CITAS V 4.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<?php 

$tema = isset($_COOKIE['tema']) ? $_COOKIE['tema'] : 'claro';
if($tema == 'oscuro'){ ?>
		<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$cssOscuro ?>" />
    <?php }else { ?>
        
		<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$cssClaro ?>" />
		
    <?php } ?>
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-11">
					<h1 class="text-center"><b>CITAS</b></h1>	
				</div>
				<div class="col-md-1">
				
				</div>
			</div>
		</div>
	</div>
	
	<?php	
	if (!isset($menu)) {
	    $menu = 'menuInvitado.php';
	}
	include $menu;
    ?>
    

			<div class="contenido">
			<?php echo $contenido ?>
			</div>

	
	<div class="container-fluid pie p-2 my-5">
		<div class="container">
			<h5 class="text-center"> Tus citas al alcance de la mano</h5>
		</div>
	</div>

</body>
</html>                                   