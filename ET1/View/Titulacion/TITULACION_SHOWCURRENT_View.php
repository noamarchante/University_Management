<?php


/*
	Archivo php
	Nombre: TITULACION_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú mostrar todos
*/

	
	class TITULACION_SHOWCURRENT{//clase mostrar Titulacion actual

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
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post'>
			
				<!-- formulario codTitulacion -->
				<?php echo $strings['codTitulacion'] . ':' ?> <input type = 'text' name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = "<?php echo $this->tupla['CODTITULACION']; ?>" readonly><br>

				<!-- formulario codCentro-->
				<?php echo $strings['codCentro'] . ':' ?><input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '50' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>

				<!-- formulario nombre -->
				<?php echo $strings['NOMBRETITULACION'] . ':' ?> 
				<input type = 'text' name = 'nombre' id = 'nombre' placeholder ="<?php echo $strings['Solo letras']?>" size = '30' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>'readonly><br>

				<!-- formulario responsable -->
				<?php echo $strings['RESPONSABLETITULACION'] . ':' ?>
				<input type = 'text' name = 'responsableTitulacion' id = 'responsableTitulacion' placeholder ="<?php echo $strings['Solo letras']?>" size = '40' value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>' readonly><br>

			</form><!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/TITULACION_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
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
