<?php

/*
	Archivo php
	Nombre: USUARIOS_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú editar
*/

	class PROFESOR_EDIT{//clase editar

		//constructor
		function __construct($tupla){

			//inicialización de variables
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
			<h1><?php echo $strings['Editar']; ?></h1>

			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>

				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = "<?php echo $this->tupla['DNI']; ?>" onblur="esNoVacio('dni') && comprobarDni('dni')" readonly><br>


				<!-- formulario nombre -->
				<?php echo $strings['NOMBREPROFESOR'] . ':' ?>
				<input type = 'text' name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>

				<!-- formulario apellidos-->
				<?php echo $strings['APELLIDOSPROFESOR'] . ':' ?> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>


				<!-- formulario area -->
				<?php echo $strings['AREAPROFESOR'] . ':' ?> <input type = 'text' name = 'area' id = 'area' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '9' value = "<?php echo $this->tupla['AREAPROFESOR']; ?>" onblur="esNoVacio('area')" ><br>

				<!-- formulario departamento -->
				<?php echo $strings['departamento'] . ':' ?>
				<input type = 'text' name = 'departamento' id = 'departamento' size = '40' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' onblur="esNoVacio('departamento')  && comprobarEmail('departamento')" ><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='EDIT'><?php echo $strings['Editar']; ?></button>

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

	} //fin editar

?>