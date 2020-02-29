<?php

/*
	Archivo php
	Nombre: CENTRO_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú buscar
*/

	class CENTRO_SEARCH{//clase buscar

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
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post'>

				<!-- formulario codCentro -->
				<?php echo $strings['CODCENTRO'] . ':' ?> <input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario codEdificio-->
				<?php echo $strings['CODEDIFICIO'] . ':' ?><input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '50' value = ''><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBRECENTRO'] . ':' ?><input type = 'text' name = 'nombreCentro' id = 'nombreCentro' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '' ><br>

				<!-- formulario direccion -->
				<?php echo $strings['DIRECCIONCENTRO'] . ':' ?> <input type = 'text' name = 'direccionCentro' id = 'direccionCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario responsable -->
				<?php echo $strings['responsable'] . ':' ?><input type = 'text' name = 'responsableCentro' id = 'responsableCentro' size = '40' value = '' ><br>
				
				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='SEARCH'><?php echo $strings['Buscar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
			<!-- link -->
			<a href='../Controller/CENTRO_Controller.php'> <?php echo $strings['Volver']; ?> </a>

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