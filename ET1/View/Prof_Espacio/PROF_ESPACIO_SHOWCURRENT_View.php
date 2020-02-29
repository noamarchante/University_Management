<?php

/*
	Archivo php
	Nombre: PROF_ESPACIO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú mostrar datos espacio actual
*/

	class PROF_ESPACIO_SHOWCURRENT{//clase mostrar espacio actual

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
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>
			
				<!-- formulario DNI-->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '15' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>

				<!--formulario codEspacio -->
				<?php echo $strings['CODESPACIO'] . ':' ?>
				<input type = 'text' name = 'codEspacio' id = 'codEspacio' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = '<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>

			</form><!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/PROF_ESPACIO_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
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
