<?php


/*
	Archivo php
	Nombre: CENTRO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú mostrar todos
*/

	
	class CENTRO_SHOWCURRENT{//clase mostrar centro actual

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
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post'>
			
				<!-- formulario codCentro -->
				<?php echo $strings['CODCENTRO'] . ':' ?> <input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = "<?php echo $this->tupla['CODCENTRO']; ?>" readonly><br>

				<!-- formulario codEdificio-->
				<?php echo $strings['CODEDIFICIO'] . ':' ?><input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBRECENTRO'] . ':' ?> 
				<input type = 'text' name = 'nombreCentro' id = 'nombreCentro' placeholder ="<?php echo $strings['Solo letras']?>" size = '30' value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>'readonly><br>

				<!-- formulario direccion -->
				<?php echo $strings['DIRECCIONCENTRO'] . ':' ?> <input type = 'text' name = 'direccionCentro' id = 'direccionCentro' placeholder ="<?php echo $strings['Letras y numeros']?>" size = '9' value = "<?php echo $this->tupla['DIRECCIONCENTRO']; ?>" readonly ><br>

				<!-- formulario responsable -->
				<?php echo $strings['responsable'] . ':' ?>
				<input type = 'text' name = 'responsableCentro' id = 'responsableCentro' placeholder ="<?php echo $strings['Solo letras']?>" size = '40' value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' readonly><br>

			</form><!-- cierre formulario-->
				
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

	} //fin mostrar actual
