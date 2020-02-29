<?php


/*
	Archivo php
	Nombre: CENTRO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú mostrar todos
*/

	
	class CENTRO_SHOWCURRENT{//clase mostrar centro actual

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
			<h1 class="tituloFormulario"><?php echo $strings['Informacion detallada']; ?>   <img src="../View/Icons/info.png" width="42" height="42"></h1>
			
			<!-- formulario -->
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post'>
			
			<div class="container">
				  <div class="card-deck mb-3 text-center">
				  	<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario codCentro -->
							<label class="my-0 font-weight-normal"><?php echo $strings['CODCENTRO']?></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" name = 'codCentro' id = 'codCentro' size=10 value = "<?php echo $this->tupla['CODCENTRO']; ?>" readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario codEdificio-->
							<label class="my-0 font-weight-normal"><?php echo $strings['CODEDIFICIO']?></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" name = 'codEdificio' id = 'codEdificio' size=10 value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario nombre -->
							<label class="my-0 font-weight-normal"><?php echo $strings['NOMBRECENTRO']?></label> 
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" name = 'nombreCentro' id = 'nombreCentro' size=50 value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>'readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario direccion -->
							<label class="my-0 font-weight-normal"><?php echo $strings['DIRECCIONCENTRO']?></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" name = 'direccionCentro' id = 'direccionCentro' size=150 value = "<?php echo $this->tupla['DIRECCIONCENTRO']; ?>" readonly ><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario responsable -->
							<label class="my-0 font-weight-normal"><?php echo $strings['responsable']?></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" name = 'responsableCentro' id = 'responsableCentro' size=60 value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' readonly><br>
						</div>
					</div>
					<div class="container">
						<!-- link -->
						<a href='../Controller/CENTRO_Controller.php'>  <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
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
