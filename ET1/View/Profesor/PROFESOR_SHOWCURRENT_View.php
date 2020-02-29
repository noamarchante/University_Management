<?php

/*
	Archivo php
	Nombre: PROFESOR_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú mostrar datos profesor actual
*/

	class PROFESOR_SHOWCURRENT{ //clase showall

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
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>
			
				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' readonly name = 'dni' id = 'dni' size = '9' value = "<?php echo $this->tupla['DNI']; ?>"><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBREPROFESOR'] . ':' ?>
				<input type = 'text' name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras'] ?>" size = '30' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" readonly><br>

				<!-- formulario apellidos-->
				<?php echo $strings['APELLIDOSPROFESOR'] . ':' ?><input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras'] ?>" size = '50' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" readonly><br>

				<!-- formulario area -->
				<?php echo $strings['AREAPROFESOR'] . ':' ?> <input type = 'text' readonly name = 'area' id = 'area' size = '9' value = "<?php echo $this->tupla['AREAPROFESOR']; ?>" ><br>

				<!-- formulario departamento-->
				<?php echo $strings['departamento'] . ':' ?><input type = 'text' name = 'departamento' id = 'departamento' size = '40' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' onblur="esNoVacio('departamento')" readonly><br>

			</form><!-- cierre formulario-->
				
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

	} //fin mostrar actual
