<?php

/*
	Archivo php
	Nombre: PROFESOR_SEARCH_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú buscar
*/

	class PROFESOR_SEARCH{ //clase buscar

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
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>

				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = '' onblur="esNoVacio('dni') && comprobarDni('dni')" ><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBREPROFESOR'] . ':' ?><input type = 'text' name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>

				<!-- formulario apellidos-->
				<?php echo $strings['APELLIDOSPROFESOR'] . ':' ?><input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' value = '' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>

				<!-- formulario area -->
				<?php echo $strings['AREAPROFESOR'] . ':' ?> <input type = 'text' name = 'area' id = 'area' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = '' onblur="esNoVacio('area')"><br>

				<!-- formulario departamento -->
				<?php echo $strings['departamento'] . ':' ?><input type = 'text' name = 'departamento' id = 'departamento' size = '40' value = '' onblur="esNoVacio('departamento')"><br>
				
				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='SEARCH'><?php echo $strings['Buscar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
			<!-- link -->
			<a href='../Controller/PROFESOR_Controller.php'> <?php echo $strings['Volver']; ?> </a>

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