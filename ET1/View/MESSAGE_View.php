<?php

/*
	Archivo php
	Nombre: MESSAGE_View.php
	Autor: 	Noa López Marchante
	creación: 21-09-2019
	Función: vista que muestra los mensajes de confirmación y error
*/

	
	class MESSAGE{ //clase mensaje

		//definición de variables
		private $string; 
		private $volver;

//---------------------------------------------------------------------------------------------------------------------

		//constructor de la clase
		function __construct($string, $volver){ 

			//inicialización de variables
			$this->string = $string;
			$this->volver = $volver;

			//inicialización función render
			$this->render();

		}//fin constructor

//-----------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){ 

			//llamada al array de strings en el idioma seleccionado
			include '../Locale/Strings_'.$_SESSION['idioma'].'.php'; 
			
			//llamada a la cabecera
			include '../View/Header.php'; 

?>

<!-- ------------------------------------------------------------------------------------------------------------------------ -->

			<!-- saltos -->
			<br>
			<br>
			<br>

			<!-- texto -->
			<p>
				
				<!-- texto tam -->
				<H3> <?php echo $strings[$this->string]; ?> </H3>

			</p><!-- cierre texto -->

			<!-- saltos -->
			<br>
			<br>
			<br>

<!-- ------------------------------------------------------------------------------------------------------------ -->

			<?php

				//muestra un link 
				echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";

				//llamada a footer
				include '../View/Footer.php';

		} //fin metodo render

	}//fin clase message
