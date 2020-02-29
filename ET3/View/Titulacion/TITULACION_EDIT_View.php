<?php

/*
	Archivo php
	Nombre: TITULACION_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú editar
*/

	class TITULACION_EDIT{//clase editar

		var $tupla; //define variable tupla
		
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
			<h1 class="tituloFormulario"><label data-translate="Editar"></label> <img src="../View/Icons/modificar.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobarAddTitulacion()">

				<div class="row justify-content-md-left">
					<!-- formulario codTitulacion -->
					<label class="col-sm-2 col-form-label" data-translate="CODTITULACION"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" size=10 name = 'codTitulacion' id = 'codTitulacion' value = "<?php echo $this->tupla['CODTITULACION']; ?>" readonly><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario codCentro-->
					<label class="col-sm-2 col-form-label" data-translate="CODCENTRO"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'codCentro' id = 'codCentro' data-translate="Letras y numeros" size = '10' maxlength=10 value = '<?php echo $this->tupla['CODCENTRO']; ?>' onblur="comprobarVacio(this) && comprobarTexto(this,10)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label" data-translate="NOMBRETITULACION"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'nombreTitulacion' id = 'nombreTitulacion' data-translate="Solo letras" size = '50' maxlength=50 value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>' onblur="comprobarVacio(this) && comprobarAlfabetico(this,50)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario responsable -->
					<label class="col-sm-2 col-form-label" data-translate="RESPONSABLETITULACION"></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'responsableTitulacion' id = 'responsableTitulacion' size = '60' maxlength=60 data-translate="Solo letras" value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>' onblur="comprobarVacio(this) && comprobarAlfabetico(this,60)" required><br>
					</div>
				</div>

				<!-- salto -->
				<br>
				
				<div class="row justify-content-md-center">
					<!-- link -->
					<a href='../Controller/TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" /> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" /></button>
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