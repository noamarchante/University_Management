<?php

/*
	Archivo php
	Nombre: EDIFICIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú editar
*/

	class EDIFICIO_EDIT{//clase editar

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
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post'>

				<!-- formulario codEdificio-->
				<?php echo $strings['CODEDIFICIO'] . ':' ?> <input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '50' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBREEDIFICIO'] . ':' ?>
				<input type = 'text' name = 'nombreEdificio' id = 'nombreEdificio' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>'><br>

				<!-- formulario direccion -->
				<?php echo $strings['direccion'] . ':' ?> <input type = 'text' name = 'direccionEdificio' id = 'direccionEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = "<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>"><br>

				<!-- formulario campus -->
				<?php echo $strings['CAMPUSEDIFICIO'] . ':' ?>
				<input type = 'text' name = 'campusEdificio' id = 'campusEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '40' value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>'><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='EDIT'><?php echo $strings['Editar']; ?> </button>

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

	} //fin editar

?>