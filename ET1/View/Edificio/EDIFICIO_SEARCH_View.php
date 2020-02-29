<?php

/*
	Archivo php
	Nombre: EDIFICIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú editar
*/
 
	class EDIFICIO_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post'>

				<!-- formulario codEdificio -->
				<?php echo $strings['CODEDIFICIO'] . ':' ?> <input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBREEDIFICIO'] . ':' ?> <input type = 'text' name = 'nombreEdificio' id = 'nombreEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = ''><br>

				<!-- formulario direccion-->
				<?php echo $strings['direccion'] . ':' ?> <input type = 'text' name = 'direccionEdificio' id = 'direccionEdificio' placeholder = "<?php echo $strings['Letras y numeros'];?>" size = '50' value = ''><br>

				<!-- formulario campus -->
				<?php echo $strings['CAMPUSEDIFICIO'] . ':' ?> <input type = 'text' name = 'campusEdificio' id = 'campusEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>
				
				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='SEARCH'><?php echo $strings['Buscar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
			<!-- link -->
			<a href='../Controller/EDIFICIO_Controller.php'> <?php echo $strings['Volver']; ?> </a>

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