<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú añadir
*/

	class PROF_TITULACION_ADD{ //clase añadir

		//constructor
		function __construct(){

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
			<h1><?php echo $strings['Añadir']; ?></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>

				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '30' value = ''><br>
				
				<!-- formulario codTitulacion -->
				<?php echo $strings['CODTITULACION'] . ':' ?> <input type = 'text' name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario anhoAcademico-->
				<?php echo $strings['anhoAcademico'] . ':' ?> <input type = 'number' name = 'anhoAcademico' id = 'anhoAcademico' placeholder = "<?php echo $strings['Solo numeros'];?>" size = '50' value = ''><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='ADD'><?php echo $strings['Añadir']; ?></button>

			</form> <!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/PROF_TITULACION_Controller.php'> <?php echo $strings['Volver']; ?>  </a>

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

	} //fin add

?>

	