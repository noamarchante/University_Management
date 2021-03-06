<?php

/*
	Archivo php
	Nombre: ESPACIO_DELETE_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú borrar
*/
	
	class ESPACIO_DELETE{//clase borrar

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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' >
			
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!--formulario codEspacio -->
								<label class="my-0 font-weight-normal"><?php echo $strings['CODESPACIO']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codEspacio' id = 'codEspacio' value = '<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codEdificio-->
								<label class="my-0 font-weight-normal"><?php echo $strings['CODEDIFICIO']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codEdificio' id = 'codEdificio' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codCentro -->
								<label class="my-0 font-weight-normal"><?php echo $strings['CODCENTRO']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'codCentro' id = 'codCentro' value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario tipo-->
								<label class="my-0 font-weight-normal"><?php echo $strings['TIPO']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'tipo' id = 'tipo' value = '<?php if($this->tupla['TIPO']=='DESPACHO'){ echo $strings['despacho']; }else if($this->tupla['TIPO']=='LABORATORIO'){ echo $strings['laboratorio'];} else{ echo $strings['pas'];} ?>'readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario superficieEspacio-->
								<label class="my-0 font-weight-normal"><?php echo $strings['superficieEspacio']?></label>
							</div>
      						<div class="card-body">
								<input type = 'number' class="form-control-plaintext" name = 'superficieEspacio' id = 'superficieEspacio' value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' readonly><br>
							</div>
						</div>	

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario numInventarioEspacio -->
								<label class="my-0 font-weight-normal"><?php echo $strings['numInventarioEspacio']?></label>
							</div>
      						<div class="card-body">
								<input type = 'number' class="form-control-plaintext" name = 'numInventarioEspacio' id = 'numInventarioEspacio' value = "<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>" readonly><br>
							</div>
						</div>
				<!-- salto -->
				<br>
				<div class="container">
					<!-- link -->
					<a href='../Controller/ESPACIO_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='DELETE'><img src="../View/Icons/borrar.png" width="42" height="42" alt="<?php echo $strings['Borrar']; ?>"/> </button>
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

	