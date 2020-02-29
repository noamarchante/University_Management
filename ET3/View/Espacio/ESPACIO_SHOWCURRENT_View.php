<?php

/*
	Archivo php
	Nombre: ESPACIO_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 07/10/2019 
	Función: vista del menú mostrar datos espacio actual
*/

	class ESPACIO_SHOWCURRENT{//clase mostrar espacio actual

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
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post'>
			
			<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!--formulario codEspacio -->
								<label class="my-0 font-weight-normal" data-translate="CODESPACIO"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' size=10 class="form-control-plaintext" name = 'codEspacio' id = 'codEspacio' value = '<?php echo $this->tupla['CODESPACIO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codEdificio-->
								<label class="my-0 font-weight-normal" data-translate="CODEDIFICIO"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' size=10 class="form-control-plaintext" name = 'codEdificio' id = 'codEdificio' value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario codCentro -->
								<label class="my-0 font-weight-normal" data-translate="CODCENTRO"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' size=10 class="form-control-plaintext" name = 'codCentro' id = 'codCentro' value = "<?php echo $this->tupla['CODCENTRO']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario tipo-->
								<label class="my-0 font-weight-normal" data-translate="TIPO"></label>
							</div>
      						<div class="card-body">
		<input type = 'text' class="form-control-plaintext" name = 'tipo' id = 'tipo' <?php if($this->tupla['TIPO']=='DESPACHO'){?> data-translate="despacho" <?php }else if($this->tupla['TIPO']=='LABORATORIO'){?> data-translate="laboratorio"<?php }else{?> data-translate="pas" <?php }?>readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario superficieEspacio-->
								<label class="my-0 font-weight-normal" data-translate="superficieEspacio"></label>
							</div>
      						<div class="card-body">
								<input type = 'number' class="form-control-plaintext" name = 'superficieEspacio' id = 'superficieEspacio' size=4 value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario numInventarioEspacio -->
								<label class="my-0 font-weight-normal" data-translate="numInventarioEspacio"></label>
							</div>
      						<div class="card-body">
								<input type = 'number'  class="form-control-plaintext" name = 'numInventarioEspacio' size=8 id = 'numInventarioEspacio' value = "<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>" readonly><br>
							</div>
						</div>
						<div class="container">
							<!-- link -->
							<a href='../Controller/ESPACIO_Controller.php'> <img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/></a>
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
