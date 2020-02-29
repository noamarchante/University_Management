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
		
		<!-- tipo de codificación -->
		<meta charset="UTF-8"> 

		<!-- titulo de la página -->
		<title><?php echo $strings['Ejemplo arquitectura IU']; ?></title>

		
		<script type="text/javascript" src="../View/js/tcal.js"></script> 
		<script type="text/javascript" src="../View/js/md5.js"></script>
		<script type="text/javascript" src="../View/js/validaciones.js"></script> 

	 	
		<!--<script type="text/javascript" src="../View/js/comprobar.js"></script> -->
		<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />

	<!-- cierre de la cabecera-->
	</head> 
	
	<!-- cuerpo del fichero-->
	<body> 
		<!-- apertura agrupación contenido-->
		<div id="modal" style="display:none">

			<!-- apertura agrupación contenido-->
	  		<div id="contenido-interno">

	  			<!-- agrupación contenido-->
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>

	  			<!-- apertura agrupación contenido-->
	  			<div id="mensajeError"></div>

	  			<!-- link-->
				<a id="cerrar" href="#" onclick="cerrarModal();">

					<!-- imagen-->
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>

				</a><!-- cierre link-->

			</div><!-- cierre agrupación contenido-->

		</div><!-- cierre agrupación contenido-->

		<!-- cabecera-->
		<header>

			<!-- texto-->
			<p style="text-align:center">

				<!-- tam texto predefinido-->
				<h1> <?php echo $strings['Portal de Gestión']; ?> </h1>

			</p> <!-- cierre tam texto-->
	
			<!-- apertura agrupación contenido-->
			<div width: 50%; align="left">

				<!-- cuestionario-->
				<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
					<?php echo $strings['idioma']; ?>

					<!-- agrupación opciones cuestionario-->
					<select name="idioma" onChange='this.form.submit()'> 

						<!-- opciones cuestionario-->
		      	  		<option value="SPANISH"> </option>
						<option value="ENGLISH"><?php echo $strings['INGLES']; ?></option>
		       	 		<option value="SPANISH"><?php echo $strings['ESPAÑOL']; ?></option>
		       	 		<option value="GALLAECIAN"><?php echo $strings['GALLEGO']; ?></option>

					</select><!-- cierre agrupación opciones cuestionario-->

				</form><!-- cierre cuestionario-->

			</div><!-- cierre agrupación contenido-->

<!-- -------------------------------------------------------------------------------------------------------------------- -->

			<?php
	
				//si está autenticado
				if (IsAuthenticated()){
					
					//muestra mensaje
					echo $strings['login'] . ' : ' . $_SESSION['login'] . '<br>';
			?>	

<!-- ------------------------------------------------------------------------------------------------------------------ -->	

			<!-- apertura agrupación contenido-->
			<div width: 50%; align="right">

				<!-- link-->
				<a href='../Functions/Desconectar.php'>

					<!-- imagen-->
					<img src='./sign-error.png'>

				</a><!-- cierre link-->

			</div> <!-- cierre agrupación contenido-->

<!-- --------------------------------------------------------------------------------------------------------------- -->

			<?php
	
				//en otro caso
				}else{

					//muestra mensaje
					echo $strings['Usuario no autenticado']; 
					
					/*echo 	'<form name=\'registerForm\' action=\'../Controller/Register_Controller.php\' method=\'post\'>
					<input type=\'submit\' name=\'action\' value=\'REGISTER\'>
					</form>';*/
			?>

<!-- ----------------------------------------------------------------------------------------------------------------- -->

			<!-- link-->
			<a href='../Controller/Register_Controller.php'> <?php echo $strings['Registrar']; ?>  </a>

<!-- ----------------------------------------------------------------------------------------------------------------------------- -->

			<?php

				} //fin comprobación autenticación

			?>

<!-- ------------------------------------------------------------------------------------------------------------- -->

		</header> <!-- cierre cabecera-->

		<!-- apertura agrupación contenido-->
		<div id = 'main'>

<!-- ------------------------------------------------------------------------------------------------------------------- -->

			<?php

				//session_start();

				//si está autenticado
				if (IsAuthenticated()){

					//llamada a users_menuLateral.php
					include '../View/users_menuLateral.php';
				
				}//fin comprobación autenticación

			?>

<!-- ---------------------------------------------------------------------------------------------------------------- -->
			<!-- apertura etiqueta de sindicación-->
			<article>
