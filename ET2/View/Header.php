<?php
	
	/*
	Archivo php
	Nombre: Header.php
	Autor: 	Noa López Marchante 
	Fecha de creación: 21-09-2019  
	Función: cabecera de página
*/

	//llamada a la función de autenticación
	include_once '../Functions/Authentication.php'; 

	//si el idioma no está escogido
	if (!isset($_SESSION['idioma'])) { 

		//por defecto se selecciona español
		$_SESSION['idioma'] = 'SPANISH'; 
	}

	//llamada al array de strings del idioma seleccionado
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php'; 

?>

<!-- ------------------------------------------------------------------------------------------------------------------ -->

<!--comienzo fichero html-->
<html> 

	<!-- cabecera -->
	<head> 
		
		<!-- titulo de la página -->
		<title>Ejemplo arquitectura IU </title>

		<!-- Enlace a la hoja de estilos general del proyecto -->
		<link rel="stylesheet" href="../View/css/estilo.css">
		<link rel="stylesheet" href="../View/bootstrap/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,700,900&display=swap" rel="stylesheet">
		<!-- tipo de codificación -->
		<meta charset="UTF-8"> 

		<!-- titulo de la página -->
		<title><?php echo $strings['Ejemplo arquitectura IU']; ?></title>
		
		<script type="text/javascript" src="../View/tcal/tcal.js"></script> 
		<!-- <script type="text/javascript" src="../View/js/md5.js"></script> -->
		<script type="text/javascript" src="../View/js/validaciones.js"></script> 
		<script type="text/javascript" src="../View/bootstrap/js/bootstrap.min.js"></script> 
	 	
		<!--<script type="text/javascript" src="../View/js/comprobar.js"></script> -->
		<!-- <link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" /> -->
		<link rel="stylesheet" type="text/css" href="../View/tcal/tcal.css" media="screen">

	<!-- cierre de la cabecera-->
	</head> 
	
	<!-- cuerpo del fichero-->
	<body> 
		<!-- cabecera-->
		<!-- CABECERA -->
		<header class="navbar navbar-expand-md navbar-light bg-light">
			<p class="navbar-brand" ><?php echo $strings['Portal de Gestion']; ?></p>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<?php
					//si no está autenticado
					if (!IsAuthenticated()){
						//muestra mensaje
					?>
						<p><?php echo $strings['Usuario no autenticado'];?></p>
					<?php
					} else {
					?>
						<p><?php echo $strings['login'] . ' : ' . $_SESSION['login'] . '<br>'; ?></p>
					<?php
					}
					?>
				</li>
				<!-- BOTÓN REGISTRAR -->
				<li class="nav-item">
					<!-- link-->
					<form class="form-inline mt-2 mt-md-0" action="../Controller/Register_Controller.php" method="get">
						<button type="submit" style ="background:#f8f9fa;border:#f8f9fa"><img src="../View/Icons/usuario.png" width="42" height="42"/></button>
					</form>
				</li>
			</ul>
			<!-- CAMBIO DE IDIOMA -->
			<form class="form-inline mt-2 mt-md-0" name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
				<button type="submit" style ="background:#f8f9fa;border:#f8f9fa"  name="idioma" value="SPANISH" ><img src="../View/Icons/espana.png" alt="<?php echo $strings['Cambiar idioma a español']?>" width="32" height="32"/></button>
				<button type="submit" style ="background:#f8f9fa;border:#f8f9fa" name="idioma" value="ENGLISH" ><img src="../View/Icons/reinounido.png" alt="<?php echo $strings['Cambiar idioma a ingles']?>" width="32" height="32"/></button>
				<button type="submit" style ="background:#f8f9fa;border:#f8f9fa" name="idioma" value="GALLAECIAN" ><img src="../View/Icons/galicia.png" alt="<?php echo $strings['Cambiar idioma a gallego']?>" width="32" height="25"/></button>
			</form>
			<?php
			if (IsAuthenticated()){
				//si está autenticado
			?>
				<form class="form-inline mt-2 mt-md-0" action="../Functions/Desconectar.php" method="get">
					<button type="submit" style ="background:#f8f9fa;border:#f8f9fa"><img src='../View/Icons/logout.png'  width="32" height="32"/></button>
				</form>	
			<?php
			}//fin comprobación autenticación
			?>
		</header>
			<?php
				//si está autenticado
				if (IsAuthenticated()){

					//llamada a users_menuLateral.php
					include '../View/users_menuLateral.php';
				
				}//fin comprobación autenticación
			?>
			<!-- apertura agrupaciÃ³n contenido-->
			<main role="main" class="container">

<!-- ---------------------------------------------------------------------------------------------------------------- -->
			<!-- apertura etiqueta de sindicación-->
			<article>