<?php

/*
	Archivo php
	Nombre: USUARIOS_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú mostrar datos usuario actual
*/

	
	class USUARIOS_SHOWCURRENT{//clase mostrar usuario actual
		var $tupla; //muestra los valores de la tupla
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

			<!-- formulario -->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post'>
			
				<!-- texto -->
				<h1 class="tituloFormulario"><?php echo $strings['Informacion detallada']; ?>   <img width="42" height="42" src="../View/Icons/info.png"/></h1>
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!--formulario login -->
								<label class="my-0 font-weight-normal"><?php echo $strings['login']?></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'login' id = 'login' size="15" value = '<?php echo $this->tupla['login']; ?>' readonly><br>
						 	</div>
						</div>
					
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario contraseña-->
								<label class="my-0 font-weight-normal"><?php echo $strings['password']?></label>
							</div>
							<div class="card-body">
								<input type = 'password' size="20" class="form-control-plaintext" name = 'password' id = 'password' value = '<?php echo $this->tupla['password']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario dni -->
								<label class="my-0 font-weight-normal"><?php echo $strings['DNI']?></label>
							</div>
							<div class="card-body">
								<input type = 'text' name = 'dni' class="form-control-plaintext" size="9" id = 'dni' value = "<?php echo $this->tupla['DNI']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario nombre -->
								<label class="my-0 font-weight-normal"><?php echo $strings['Nombre']?></label>
							</div>
							<div class="card-body">
								<input type = 'text' name = 'nombre' class="form-control-plaintext" id = 'nombre' size="30" value = '<?php echo $this->tupla['nombre']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario apellidos-->
								<label class="my-0 font-weight-normal"><?php echo $strings['Apellidos']?></label>
							</div>
							<div class="card-body">
								<input type = 'text' size="50" class="form-control-plaintext" name = 'apellidos' id = 'apellidos' value = '<?php echo $this->tupla['apellidos']; ?>' readonly><br>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario telefono -->
								<label class="my-0 font-weight-normal"><?php echo $strings['Telefono']?></label>
							</div>
							<div class="card-body">
								<input type = 'text' size="11" name = 'telefono' id = 'telefono' class="form-control-plaintext"value = "<?php echo $this->tupla['telefono']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario email-->
								<label class="my-0 font-weight-normal"><?php echo $strings['email']?></label>
							</div>
							<div class="card-body">
								<input type = 'email' size="60" class="form-control-plaintext" name = 'email' id = 'email' value = '<?php echo $this->tupla['email']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario cumpleaños -->
								<label class="my-0 font-weight-normal" class="form-control-plaintext"><?php echo $strings['Fecha de nacimiento']?></label>
							</div>
							<div class="card-body">
								<input type = 'date' name = 'fechaNacimiento' class="form-control-plaintext" id = 'fechaNacimiento' value= "<?php echo $this->tupla['FechaNacimiento']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario foto-->
								<label class="my-0 font-weight-normal"><?php echo $strings['Foto personal']?></label>
							</div>
							<div class="card-body">
							<img src="<?php echo $this->tupla['fotopersonal'];?>" width="150" height="150" alt="<?php echo $strings['imagen'];?>"/>
							<input type = 'text'  style="visibility:hidden" class="form-control-plaintext" name = 'fotoPersonal' id = 'fotoPersonal' size=50 value="<?php echo $this->tupla['fotopersonal']?>">
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario sexo-->
								<label class="my-0 font-weight-normal"><?php echo $strings['sexo']?></label>
							</div>
							<div class="card-body">
								<input type= 'text' id='sexo' class="form-control-plaintext" name="sexo" value= '<?php if($this->tupla['sexo']=='mujer'){ echo $strings['Mujer']; }else{ echo $strings['Hombre'];} ?>' readonly/>
							</div>
						</div>
					</div>
				</div>
				<br>
				<!-- link -->
				<a href='../Controller/USUARIOS_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
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
