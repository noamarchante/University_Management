<?php

/*
	Archivo php
	Nombre: TITULACION_DELETE_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú borrar
*/

	class TITULACION_DELETE{//clase borrar

		//constructor
		function __construct($tupla){	

			//inicialización variable
			$this->tupla = $tupla;

			//inicialización función render
			$this->render();
		
		}//fin constructor

		//función render
		function render(){

			//header necesita los strings
			include '../View/Header.php'; 

		?>

			<!-- texto -->
			<h1><?php echo $strings['Borrar']; ?></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				<!--formulario codTitulacion -->
				<?php echo $strings['codTitulacion'] . ':' ?>
				<input type = 'text' name = 'codTitulacion' id = 'codTitulacion' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = '<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>

				<!-- formulario codCentro-->
				<?php echo $strings['codCentro'] . ':' ?> <input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '15' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>

				<!-- formulario nombreTitulacion -->
				<?php echo $strings['NOMBRETITULACION'] . ':' ?> 
				<input type = 'text' name = 'nombreTitulacion' id = 'nombreTitulacion' placeholder ="<?php echo $strings['Solo letras']?>" size = '30' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>'readonly><br>

				<!-- formulario responsable -->
				<?php echo $strings['RESPONSABLETITULACION'] . ':' ?> <input type = 'text' name = 'responsableTitulacion' id = 'responsableTitulacion' placeholder = "<?php echo $strings['Solo letras']?>" size = '9' value = "<?php echo $this->tupla['RESPONSABLETITULACION']; ?>" readonly><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='DELETE'><?php echo $strings['Borrar']; ?></button>

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

	} //fin delete

?>

	