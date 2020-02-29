
<?php

/*
	Archivo php
	Nombre: EDIFICIO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 06/10/2019 
	Función: vista del menú mostrar actual
*/
	
	class EDIFICIO_SHOWCURRENT{//clase mostrar edificio actual

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
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post'>
			
				<div class="container">
				  <div class="card-deck mb-3 text-center">
				  	<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario codEdificio-->
							<label class="my-0 font-weight-normal" data-translate="CODEDIFICIO"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" size=10 name = 'codEdificio' id = 'codEdificio' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario nombre -->
							<label class="my-0 font-weight-normal" data-translate="NOMBREEDIFICIO"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" size=50 name = 'nombreEdificio' id = 'nombreEdificio' value = '<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario direccion -->
							<label class="my-0 font-weight-normal" data-translate="direccion"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" size=150 name = 'direccionEdificio' id = 'direccionEdificio' value = "<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>" readonly><br>
						</div>
					</div>

					<div class="card mb-4 shadow-sm">
      					<div class="card-header">
							<!-- formulario campus -->
							<label class="my-0 font-weight-normal" data-translate="CAMPUSEDIFICIO"></label>
						</div>
      					<div class="card-body">
							<input type = 'text' class="form-control-plaintext" size=10 name = 'campusEdificio' id = 'campusEdificio' value = '<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' readonly><br>
						</div>
					</div>
					<div class="container">
						<!-- link -->
						<a href='../Controller/EDIFICIO_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
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
