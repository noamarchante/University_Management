<?php


/*
	Archivo php
	Nombre: PROF_TITULACION_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú mostrar todos
*/

	
	class PROF_TITULACION_SHOWCURRENT{//clase mostrar Titulacion actual

		//constructor
		function __construct($tupla){

			//inicialización variables	
			$this->tupla = $tupla;

			//inicialización función render
			$this->render();
		
		}//fin constructor

//--------------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){

			//header necesita los strings
			include '../View/Header.php'; 
		?>

<!-- ------------------------------------------------------------------------------------------------------------ -->

			<!-- texto -->
			<h1><?php echo $strings['Informacion detallada']; ?></h1>
			
			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>
			
				<!-- formulario DNI-->
				<?php echo $strings['DNI'] . ':' ?><input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '50' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>

				<!-- formulario codTitulacion -->
				<?php echo $strings['CODTITULACION'] . ':' ?> <input type = 'text' name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = "<?php echo $this->tupla['CODTITULACION']; ?>" readonly><br>

				

				<!-- formulario anhoAcademico -->
				<?php echo $strings['anhoAcademico'] . ':' ?> 
				<input type = 'text' name = 'anhoAcademico' id = 'anhoAcademico' placeholder ="<?php echo $strings['Solo numeros']?>" size = '30' value = '<?php echo $this->tupla['ANHOACADEMICO']; ?>'readonly><br>

			</form><!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/PROF_TITULACION_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
<!-- saltos -->
			<br>
			<br>
			<br>

			<!-- formulario -->
			<form name = 'Form' action='../Functions/Desconectar.php' method='post'>

				<!--botón -->
				<input type='submit' name='action' value='<?php echo $strings['Desconectar']; ?>'>

			</form><!-- cierre formulario -->
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin mostrar actual
