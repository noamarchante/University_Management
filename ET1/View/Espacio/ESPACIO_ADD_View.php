<?php

/*
	Archivo php
	Nombre: ESPACIO_ADD_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú añadir
*/

	
	class ESPACIO_ADD{//clase añadir

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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post'>
			
				<!--formulario codEspacio -->
				<?php echo $strings['CODESPACIO'] . ':' ?> <input type = 'text' name = 'codEspacio' id = 'codEspacio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>
				
				<!-- formulario codEdificio-->
				<?php echo $strings['CODEDIFICIO'] . ':' ?> <input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '15' value = ''><br>

				<!-- formulario codCentro -->
				<?php echo $strings['CODCENTRO'] . ':' ?> <input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '9' value = ''><br>

				<!-- formulario tipo-->
				<select name="tipo" id ='TIPO'>
				<option value="despacho"><?php echo $strings['despacho']; ?></option>
		        <option value="laboratorio"><?php echo $strings['laboratorio']; ?></option>
		        <option value="pas"><?php echo $strings['pas']; ?></option>
				</select> 
				<br>
				<!-- formulario superficieEspacio-->
				<?php echo $strings['superficieEspacio'] . ':' ?> <input type = 'number' name = 'superficieEspacio' id = 'superficieEspacio' placeholder = "<?php echo $strings['Solo numeros'];?>" size = '50' value = ''><br>

				<!-- formulario numInventarioEspacio -->
				<?php echo $strings['numInventarioEspacio'] . ':' ?> <input type = 'number' name = 'numInventarioEspacio' min='0' max='999999999' id = 'numInventarioEspacio' placeholder = "<?php echo $strings['Solo numeros']; ?>" value = ''><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='ADD'><?php echo $strings['Añadir']; ?></button>

			</form> <!-- cierre formulario-->
				
			<!-- link -->
			<a href='../Controller/ESPACIO_Controller.php'> <?php echo $strings['Volver']; ?>  </a>

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

	