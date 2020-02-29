<?php

/*
	Archivo php
	Nombre: ESPACIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú editar
*/
	
	class ESPACIO_EDIT{//clase editar

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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				<!--formulario codEspacio -->
				<?php echo $strings['CODESPACIO'] . ':' ?>
				<input type = 'text' name = 'codEspacio' id = 'codEspacio' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = '<?php echo $this->tupla['CODESPACIO']; ?>'readonly><br>

				<!-- formulario codEdificio-->
				<?php echo $strings['CODEDIFICIO'] . ':' ?> <input type = 'text' name = 'codEdificio' id = 'codEdificio' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '15' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' ><br>

				<!-- formulario codCentro -->
				<?php echo $strings['CODCENTRO'] . ':' ?> <input type = 'text' name = 'codCentro' id = 'codCentro' placeholder = "<?php echo $strings['Letras y numeros']?>" size = '9' value = "<?php echo $this->tupla['CODCENTRO']; ?>" ><br>

				<!-- formulario tipo -->
				<select name="TIPO" id="TIPO">
				<option <?php if($this->tupla['TIPO']=='LABORATORIO'){?> selected="true" <?php } ?> value="laboratorio"><?php echo $strings['laboratorio']; ?></option>
		        <option <?php if($this->tupla['TIPO']=='DESPACHO'){?> selected="true" <?php } ?> value="despacho"><?php echo $strings['despacho']; ?></option>
				<option <?php if($this->tupla['TIPO']=='PAS'){?> selected="true" <?php } ?> value="pas"><?php echo $strings['pas']; ?></option>
				</select>
				<br>

				<!-- formulario superficieEspacio-->
				<?php echo $strings['superficieEspacio'] . ':' ?><input type = 'number' name = 'superficieEspacio' id = 'superficieEspacio' placeholder = "<?php echo $strings['Solo numeros']?>" size = '50' value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>'><br>

				<!-- formulario numInventarioEspacio -->
				<?php echo $strings['numInventarioEspacio'] . ':' ?> <input type = 'number' name = 'numInventarioEspacio' id = 'numInventarioEspacio'placeholder = "<?php echo $strings['Solo numeros']?>" size = '9' value = "<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>" ><br>

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='EDIT'><?php echo $strings['Editar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
			<!-- link -->
			<a href='../Controller/ESPACIO_Controller.php'> <?php echo $strings['Volver']; ?> </a>

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