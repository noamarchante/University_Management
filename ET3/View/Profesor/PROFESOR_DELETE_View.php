<?php

/*
	Archivo php
	Nombre: PROFESOR_DELETE_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 5/10/2019 
	Función: vista del menú eliminar
*/

	class PROFESOR_DELETE{//clase borrar

		var $tupla; //definición de la variable tupla
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
			<h1 class="tituloFormulario"><label data-translate="Borrar"></label>   <img src="../View/Icons/borrar.png" width="42" height="42"></h1>	
			
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
								<input type = 'text' name = 'dni' class="form-control-plaintext" id = 'dni' value = "<?php echo $this->tupla['DNI']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario nombre -->
								<label class="my-0 font-weight-normal" data-translate="NOMBREPROFESOR"></label> 
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'nombre' class="form-control-plaintext" id = 'nombre' value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario apellidos-->
								<label class="my-0 font-weight-normal" data-translate="APELLIDOSPROFESOR"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'apellidos' class="form-control-plaintext" id = 'apellidos' value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario area -->
								<label class="my-0 font-weight-normal" data-translate="AREAPROFESOR"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'area' class="form-control-plaintext" id = 'area' value = "<?php echo $this->tupla['AREAPROFESOR']; ?>" readonly ><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!-- formulario departamento -->
								<label class="my-0 font-weight-normal" data-translate="departamento"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' name = 'departamento' class="form-control-plaintext" id = 'departamento' value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' readonly><br>
							</div>
						</div>
				
				<div class="container">
					<a href='../Controller/PROFESOR_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" /></a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='DELETE'><img src="../View/Icons/borrar.png" width="42" height="42"/></button>
				</div>
			</form><!-- cierre formulario-->
				
			<br>
			<br>
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin delete

?>

	