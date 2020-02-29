<?php

/*
	Archivo php
	Nombre: PROF_TITULACION_DELETE_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú borrar
*/

	class PROF_TITULACION_DELETE{//clase borrar

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
			<h1 class="tituloFormulario"><?php echo $strings['Borrar']; ?>   <img src="../View/Icons/borrar.png" width="42" height="42"></h1>	
			<!-- formulario -->
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post'>
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario dni-->
								<label class="my-0 font-weight-normal"><?php echo $strings['DNI']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'dni' class="form-control-plaintext" id = 'dni' size=9 value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!--formulario codTitulacion -->
								<label class="my-0 font-weight-normal"><?php echo $strings['CODTITULACION']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'codTitulacion' class="form-control-plaintext" id = 'codTitulacion' size=10 value = '<?php echo $this->tupla['CODTITULACION']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario anhoAcademico -->
								<label class="my-0 font-weight-normal"><?php echo $strings['anhoAcademico']?></label>
							</div>
      						<div class="card-body">
								<input type = 'number' name = 'anhoAcademico' class="form-control-plaintext" id = 'anhoAcademico' size=9 value = '<?php echo $this->tupla['ANHOACADEMICO']; ?>'readonly><br>
							</div>
						</div>

				<!-- salto -->
				<br>
				<div class="container">
					<!-- link -->
					<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/>  </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='DELETE'><img src="../View/Icons/borrar.png" width="42" height="42" alt="<?php echo $strings['Borrar']; ?>"></button>
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

	