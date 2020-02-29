<?php


/*
	Archivo php
	Nombre: PROF_TITULACION_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú mostrar todos
*/

	
	class PROF_TITULACION_SHOWCURRENT{//clase mostrar Titulacion actual

		var $tupla; //definir la variable tupla 
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
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>
				<div class="container">
				  <div class="card-deck mb-3 text-center">
				  	<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario DNI-->
							<label class="my-0 font-weight-normal" data-translate="DNI"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' name = 'dni' id = 'dni' size=9 class="form-control-plaintext" value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario codTitulacion -->
							<label class="my-0 font-weight-normal" data-translate="CODTITULACION"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' name = 'codTitulacion' class="form-control-plaintext" size=10 id = 'codTitulacion' value = "<?php echo $this->tupla['CODTITULACION']; ?>" readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario anhoAcademico -->
							<label class="my-0 font-weight-normal" data-translate="anhoAcademico"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' name = 'anhoAcademico' class="form-control-plaintext" size=9 id = 'anhoAcademico' value = '<?php echo $this->tupla['ANHOACADEMICO']; ?>'readonly><br>
						</div>
					</div>
					<div class="container">
						<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
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
