<?php

/*
	Archivo php
	Nombre: TITULACION_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú añadir
*/

	class TITULACION_ADD{ //clase añadir

		//constructor
		function __construct(){

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
			<h1><?php echo $strings['Añadir']; ?></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post'>

				<!-- formulario codTitulacion -->
				<?php echo $strings['codTitulacion'] . ':' ?> <input type = 'text' name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario codCentro -->
				<?php echo $strings['codCentro'] . ':' ?> <input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '30' value = ''><br>

				<!-- formulario nombreTitulacion-->
				<?php echo $strings['NOMBRETITULACION'] . ':' ?> <input type = 'text' name = 'nombreTitulacion' id = 'nombreTitulacion' placeholder = "<?php echo $strings['Solo letras'];?>" size = '50' value = ''><br>

				<!-- formulario responsableTitulacion -->
				<?php echo $strings['RESPONSABLETITULACION'] . ':' ?> <input type = 'text' name = 'responsableTitulacion' id = 'responsableTitulacion' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '9' value = ''><br>


				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='ADD'><?php echo $strings['Añadir']; ?></button>

			</form> <!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/TITULACION_Controller.php'> <?php echo $strings['Volver']; ?>  </a>

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

	} //fin add

?>

	