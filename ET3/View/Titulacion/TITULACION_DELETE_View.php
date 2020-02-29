<?php

/*
	Archivo php
	Nombre: TITULACION_DELETE_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 08/10/2019 
	Función: vista del menú borrar
*/

	class TITULACION_DELETE{//clase borrar

		var $tupla; //define la variable tupla
		
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
			<h1 class="titulacionFormulario"><label data-translate="Borrar">   <img src="../View/Icons/borrar.png" width="42" height="42"></h1>	

			<!-- formulario -->
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post'>
			
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!--formulario codTitulacion -->
								<label class="my-0 font-weight-normal" data-translate="CODTITULACION"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codTitulacion' id = 'codTitulacion' size=10 value = '<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codCentro-->
								<label class="my-0 font-weight-normal" data-translate="CODCENTRO"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codCentro' id = 'codCentro'  size=10 value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario nombreTitulacion -->
								<label class="my-0 font-weight-normal" data-translate="NOMBRETITULACION"></label> 
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'nombreTitulacion' id = 'nombreTitulacion' size=50 value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>'readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario responsable -->
								<label class="my-0 font-weight-normal" data-translate="RESPONSABLETITULACION"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'responsableTitulacion' id = 'responsableTitulacion' size=60 value = "<?php echo $this->tupla['RESPONSABLETITULACION']; ?>" readonly><br>
							</div>
						</div>
				<!-- salto -->
				<br>
				<div class="container">
					<a href='../Controller/TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='DELETE'><img src="../View/Icons/borrar.png" width="42" height="42" /> </button>
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

	} //fin delete

?>

	