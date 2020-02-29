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
		 
		<!-- <script type="text/javascript" src="../View/js/md5.js"></script> -->
		 <script type="text/javascript" src="../View/js/validaciones.js"></script> 
		<script type="text/javascript" src="../View/bootstrap/js/bootstrap.min.js"></script> 
		<script src="/path/to/bootstrap-hover-dropdown.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="../View/js/cookie.js"></script>
    	<script type="text/javascript" src="../View/js/traducciones.js"></script>
	<!-- cierre de la cabecera-->
	</head> 
	
	<!-- cuerpo del fichero-->
	<body> 
		<!-- cabecera-->
		<!-- CABECERA -->
		<header class="navbar  navbar-expand-md navbar-light bg-light" style="margin-bottom:5%;background-image: url('../View/img/banner.jpg');border-bottom:#343a40 outset;position:relative;width:100%;padding-bottom:40px">
			<ul class="navbar-nav mr-auto" style="margin-bottom:-3em">
				<li class="navbar-brand" style="font-family:roboto; text-shadow: #555 1px 1px 2px;font-size: 250%; margin-left: 1.5em;opacity: 0.8"><label data-translate="Portal de Gestion"></label>
									<!-- CAMBIO DE IDIOMA -->
					<form class="form-inline mt-2 mt-md-0" name='idiomaform'>
						<a href="javascript:setCookie('language-selected', 'es'); translatePage();" class="button" name="idioma" value="SPANISH" style="margin-right:5px;" ><img src="../View/Icons/espana.png" width="22" height="22"/></a>
						<a href="javascript:setCookie('language-selected', 'en'); translatePage();" class="button" name="idioma" value="ENGLISH" style="margin-right:5px;"><img src="../View/Icons/reinounido.png" width="22" height="22"/></a>
						<a href="javascript:setCookie('language-selected', 'gl'); translatePage();" class="button" name="idioma" value="GALLAECIAN" style="margin-right:5px;"><img src="../View/Icons/galicia.png" width="22" height="22"/></a>
					</form>
				</li>
			</ul>
				<?php
				//si no está autenticado
				if (!IsAuthenticated()){
					//muestra mensaje
					?>
					<p style="font-family:roboto;font-weight: bold;margin-right:1em" data-translate="Usuario no autenticado"></p>
					<?php
				} else {
					?>
					<p style="font-family:roboto;font-weight: bold;margin-right:1em;"><label data-translate="login"></label> : <?php echo $_SESSION['login']; ?></p>
					<?php
				}
				?>
					<!-- BOTÓN REGISTRAR -->
					<!-- link-->
					<?php
					if (!IsAuthenticated()){
						?>
						<form class="form-inline mt-2 mt-md-0" action="../Controller/Register_Controller.php" method="get">
							<button type="submit" style ="background:#f8f9fa;border:#f8f9fa;"><img src="../View/Icons/registrar.png" width="42" height="42"/></button>
						</form>
					<?php
					}
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