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
		private $array;

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
			<div class="alert alert-warning">
				
				<!--comprobacion array -->
				<?php 
				if(!is_array($this->string)){
					?>
					<h3><label data-translate="<?php echo $this->string?>"></label> </h3>
					<?php
					}else{
					foreach($this->string as $array ){
						// foreach($array as $valores){ 
							?>
							<h3> 
							<label data-translate="<?php echo $array['mensajeerror'] ?>"></label><br>
							<?php
						// }
					}
				}
				?>
			</div><!-- cierre texto -->

			<!-- saltos -->
			<br>
			<br>
			<br>

<!-- ------------------------------------------------------------------------------------------------------------ -->

			

	<!--link -->
	<a href=<?php echo $this->volver ?>><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
				
	<?php
				//llamada a footer
				include '../View/Footer.php';

		} //fin metodo render

	}//fin clase message
