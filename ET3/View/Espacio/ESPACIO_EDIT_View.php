<?php

/*
	Archivo php
	Nombre: ESPACIO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú editar
*/
	
	class ESPACIO_EDIT{//clase editar

		var $tupla; //define la variable tupla
		
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
			<h1 class="tituloFormulario"><label data-translate="Editar"></label>   <img src="../View/Icons/modificar.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post'  onsubmit="return comprobarAddEspacio()">
			
				<div class="row justify-content-md-left">
					<!--formulario codEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="CODESPACIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEspacio' id = 'codEspacio' size=10  value = '<?php echo $this->tupla['CODESPACIO']; ?>'readonly><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codEdificio-->
					<label class="col-sm-2 col-form-label" data-translate="CODEDIFICIO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codEdificio' id = 'codEdificio' data-translate="Letras y numeros" size = '10' maxlength=10 value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label" data-translate="CODCENTRO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' data-translate="Letras y numeros" size = '10' maxlength=10 value = "<?php echo $this->tupla['CODCENTRO']; ?>" onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">	
					<label class="col-sm-2 col-form-label" data-translate="TIPO"></label>
					<div class="form-group">
						<!-- formulario tipo -->
						<select name="tipo" id="tipo" required class="form-control input-lg" onchange="comprobarVacio(this)">
							<option <?php if($this->tupla['TIPO']=='LABORATORIO'){?> selected="true" <?php } ?> value="LABORATORIO" data-translate="laboratorio"></option>
		       			 	<option <?php if($this->tupla['TIPO']=='DESPACHO'){?> selected="true" <?php } ?> value="DESPACHO" data-translate="despacho"></option>
							<option <?php if($this->tupla['TIPO']=='PAS'){?> selected="true" <?php } ?> value="PAS" data-translate="pas"></option>
						</select>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario superficieEspacio-->
					<label class="col-sm-2 col-form-label" data-translate="superficieEspacio"></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'superficieEspacio' id = 'superficieEspacio' data-translate="Solo numeros" size = '4' maxlength=4 value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' onblur="comprobarVacio(this) && comprobarReal(this,3,1,4)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario numInventarioEspacio -->
					<label class="col-sm-2 col-form-label" data-translate="numInventarioEspacio"></label>
					<div class="form-group">
						<input type = 'number' class="form-control input-lg" name = 'numInventarioEspacio' id = 'numInventarioEspacio' data-translate="Solo numeros" size = '8' maxlenth=8 value = "<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>" onblur="comprobarVacio(this) && comprobarReal(this,3,1,8)" required><br>
					</div>
				</div>
				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/ESPACIO_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/>  </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar']; ?>"/> </button>
				</div>
			</form> <!-- cierre formulario-->
				
		
			

			<!-- saltos -->
			<br>
			<br>
			<br>

		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin editar

?>