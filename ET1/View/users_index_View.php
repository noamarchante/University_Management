<?php

/*
	Archivo php
	Nombre: users_index_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019  
	Función: vista de la pantalla inicial
*/

	class Index { //clase índice

		//constructor
		function __construct(){ 

			//llamada a la función render
			$this->render(); 

		}//fin constructor

		//función render
		function render(){ 
	
			//llamada al array de strings en español
			include '../Locale/Strings_SPANISH.php'; 

			//llamada a la cabecera
			include '../View/Header.php'; 

?>
			<H1> <?php echo $strings['BIENVENIDO A LA ARQUITECTURA BASE DE IU'];?> </H1>
			<br>
<?php

			//llamada al pie
			include '../View/Footer.php'; 

?>

<!-- ---------------------------------------------------------------------------------------------------------- -->

			<!-- saltos -->
			<br>
			<br>
			<br>

			<!--formulario -->
			<form name = 'Form' action='../Functions/Desconectar.php' method='post'>

				<!--botón -->
				<input type='submit' name='action' value='<?php echo $strings['Desconectar']; ?>'>

			</form> <!-- cierre formulario -->

<!-- ---------------------------------------------------------------------------------------------------------------- -->

<?php
		}//fin función render

	}//fin clase

?>