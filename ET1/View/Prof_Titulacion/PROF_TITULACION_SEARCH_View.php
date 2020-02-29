<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú buscar
*/

	class PROF_TITULACION_SEARCH{//clase buscar

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
			<h1><?php echo $strings['Buscar']; ?></h1>

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>

				<!-- formulario DNI-->
				<?php echo $strings['DNI'] . ':' ?><input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '50' value = ''><br>

				<!-- formulario codTitulacion -->
				<?php echo $strings['CODTITULACION'] . ':' ?> <input type = 'text' name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario anhoAcademico -->
				<?php echo $strings['anhoAcademico'] . ':' ?><input type = 'text' name = 'anhoAcademico' id = 'anhoAcademico' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '30' value = '' ><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='SEARCH'><?php echo $strings['Buscar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
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

	} //fin search

?>