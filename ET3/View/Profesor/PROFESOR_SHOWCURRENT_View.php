<?php

/*
	Archivo php
	Nombre: PROFESOR_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú mostrar datos profesor actual
*/

	class PROFESOR_SHOWCURRENT{ //clase showall

		var $tupla; //define la variable tupla
		
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
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post'>
			
			<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario dni -->
								<label class="my-0 font-weight-normal" data-translate="DNI"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" readonly name = 'dni' size=9 id = 'dni' value = "<?php echo $this->tupla['DNI']; ?>"><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario nombre -->
								<label class="my-0 font-weight-normal" data-translate="NOMBREPROFESOR"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext"  size=15 name = 'nombre' id = 'nombre'  value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario apellidos-->
								<label class="my-0 font-weight-normal" data-translate="APELLIDOSPROFESOR"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'apellidos' class="form-control-plaintext" id = 'apellidos' size=30 value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario area -->
								<label class="my-0 font-weight-normal" data-translate="AREAPROFESOR"></label>
							</div>
      						<div class="card-body">
								<input type = 'number' class="form-control-plaintext" size=60 readonly name = 'area' id = 'area' value = "<?php echo $this->tupla['AREAPROFESOR']; ?>" ><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario departamento-->
								<label class="my-0 font-weight-normal" data-translate="departamento"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'departamento' id = 'departamento'  size=60 value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' readonly><br>
							</div>
						</div>

				<div class="container">
					<!-- link -->
					<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" /> </a>
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
