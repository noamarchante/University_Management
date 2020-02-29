<?php

/*
	Archivo php
	Nombre: CENTRO_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú editar
*/

	class CENTRO_EDIT{//clase editar
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
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobarAddCentro()">

				<div class="row justify-content-md-left">
					<!-- formulario codCentro -->
					<label class="col-sm-2 col-form-label" data-translate="CODCENTRO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' size=10 value = "<?php echo $this->tupla['CODCENTRO']; ?>"readonly><br>
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
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label" data-translate="NOMBRECENTRO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombreCentro' id = 'nombreCentro' data-translate="Solo letras" size = '50' maxlength=50 value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>' onblur="comprobarVacio(this) && comprobarAlfabetico(this,50)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario direccion -->
					<label class="col-sm-2 col-form-label" data-translate="DIRECCIONCENTRO"> </label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'direccionCentro' id = 'direccionCentro' data-translate="Letras y numeros" size = '150' maxlength=150 value = "<?php echo $this->tupla['DIRECCIONCENTRO']; ?>" onblur="comprobarVacio(this) && comprobarTexto(this,150)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario responsable -->
					<label class="col-sm-2 col-form-label" data-translate="responsable"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'responsableCentro' id = 'responsableCentro' data-translate="Solo letras" size = '60' maxlength=60 value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/CENTRO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar']; ?>"/></button>
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