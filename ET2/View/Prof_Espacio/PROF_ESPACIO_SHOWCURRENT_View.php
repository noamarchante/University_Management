<?php

/*
	Archivo php
	Nombre: PROF_ESPACIO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 09/10/2019 
	Función: vista del menú mostrar datos espacio actual
*/

	class PROF_ESPACIO_SHOWCURRENT{//clase mostrar espacio actual

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
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post'>
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario DNI-->
								<label class="my-0 font-weight-normal"><?php echo $strings['DNI']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' size=9 class="form-control-plaintext" name = 'dni' id = 'dni' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!--formulario codEspacio -->
								<label class="my-0 font-weight-normal"><?php echo $strings['CODESPACIO']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'codEspacio' class="form-control-plaintext" id = 'codEspacio' size=10 value = '<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
							</div>
						</div>
						<div class="container">	
							<!-- link -->
							<a href='../Controller/PROF_ESPACIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
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
