<?php


/*
	Archivo php
	Nombre: TITULACION_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú mostrar todos
*/

	
	class TITULACION_SHOWCURRENT{//clase mostrar Titulacion actual

		var $tupla; //definir variable tupla
		//constructor
		function __construct($tupla){

			//inicialización variables	
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
			<h1 class="tituloFormulario"><label data-translate="Informacion detallada"></label>   <img src="../View/Icons/info.png" width="42" height="42"></h1>
			
			<!-- formulario -->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post'>
			
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codTitulacion -->
								<label class="my-0 font-weight-normal" data-translate="CODTITULACION"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codTitulacion' id = 'codTitulacion' size=10 value = "<?php echo $this->tupla['CODTITULACION']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codCentro-->
								<label class="my-0 font-weight-normal" data-translate="CODCENTRO"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codCentro' id = 'codCentro' size=10 value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario nombre -->
								<label class="my-0 font-weight-normal" data-translate="NOMBRETITULACION"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'nombre' size=50 id = 'nombre' value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>'readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario responsable -->
								<label class="my-0 font-weight-normal" data-translate="RESPONSABLETITULACION"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'responsableTitulacion' id = 'responsableTitulacion' size=60 value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>' readonly><br>
							</div>
						</div>

				<div class="container">
					<!-- link -->
					<a href='../Controller/TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/>  </a>
				</div>
			</form><!-- cierre formulario-->
		
<!-- saltos -->
			<br>
			<br>
			<br>
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin mostrar actual
