<?php

/*
	Archivo php
	Nombre: EDIFICIO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú mostrar actual
*/
	
	class EDIFICIO_SHOWCURRENT{//clase mostrar edificio actual

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
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post'>
			
				<!-- formulario codEdificio-->
				<?php echo $strings['CODEDIFICIO'] . ':' ?> <input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBREEDIFICIO'] . ':' ?>
				<input type = 'text' name = 'nombreEdificio' id = 'nombreEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' readonly><br>

				<!-- formulario direccion -->
				<?php echo $strings['direccion'] . ':' ?> <input type = 'text' name = 'direccionEdificio' id = 'direccionEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = "<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>" readonly><br>

				<!-- formulario campus -->
				<?php echo $strings['CAMPUSEDIFICIO'] . ':' ?>
				<input type = 'text' name = 'campusEdificio' id = 'campusEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '40' value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' readonly><br>

			</form><!-- cierre formulario-->
				
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

	} //fin mostrar actual
