<?php

/*
	Archivo php
	Nombre: USUARIOS_SHOWCURRENT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 24/09/2019 
	Función: vista del menú mostrar datos usuario actual
*/

	
	class USUARIOS_SHOWCURRENT{//clase mostrar usuario actual

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
				<h1 class="tituloFormulario"><label data-translate="Informacion detallada"></label>   <img width="42" height="42" src="../View/Icons/info.png"/></h1>
				<div class="container">
					<div class="card-deck mb-3 text-center">
						<div class="card mb-4 shadow-sm">
      						<div class="card-header">
								<!--formulario login -->
								<label class="my-0 font-weight-normal"  data-translate="login"></label>
							</div>
      						<div class="card-body">
								<input type = 'text' class="form-control-plaintext" name = 'login' id = 'login' size="15" value = '<?php echo $this->tupla['login']; ?>' readonly><br>
						 	</div>
						</div>
					
						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario contraseña-->
								<label class="my-0 font-weight-normal"  data-translate="password"></label>
							</div>
							<div class="card-body">
								<input type = 'password' size="20" class="form-control-plaintext" name = 'password' id = 'password' value = '<?php echo $this->tupla['password']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario dni -->
								<label class="my-0 font-weight-normal"  data-translate="DNI"></label>
							</div>
							<div class="card-body">
								<input type = 'text' name = 'dni' class="form-control-plaintext" size="9" id = 'dni' value = "<?php echo $this->tupla['DNI']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario nombre -->
								<label class="my-0 font-weight-normal"  data-translate="Nombre"></label>
							</div>
							<div class="card-body">
								<input type = 'text' name = 'nombre' class="form-control-plaintext" id = 'nombre' size="30" value = '<?php echo $this->tupla['nombre']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario apellidos-->
								<label class="my-0 font-weight-normal"  data-translate="Apellidos"></label>
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
								<label class="my-0 font-weight-normal"  data-translate="Telefono"></label>
							</div>
							<div class="card-body">
								<input type = 'text' size="11" name = 'telefono' id = 'telefono' class="form-control-plaintext"value = "<?php echo $this->tupla['telefono']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario email-->
								<label class="my-0 font-weight-normal"  data-translate="email"></label>
							</div>
							<div class="card-body">
								<input type = 'email' size="60" class="form-control-plaintext" name = 'email' id = 'email' value = '<?php echo $this->tupla['email']; ?>' readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario cumpleaños -->
								<label class="my-0 font-weight-normal" class="form-control-plaintext"  data-translate="Fecha de nacimiento"></label>
							</div>
							<div class="card-body">
								<input type = 'date' name = 'fechaNacimiento' class="form-control-plaintext" id = 'fechaNacimiento' value= "<?php echo $this->tupla['FechaNacimiento']; ?>" readonly><br>
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario foto-->
								<label class="my-0 font-weight-normal"  data-translate="Foto personal"></label>
							</div>
							<div class="card-body">
							<img src="<?php echo $this->tupla['fotopersonal'];?>" width="150" height="150"/>
							<input type = 'text'  style="visibility:hidden" class="form-control-plaintext" name = 'fotoPersonal' id = 'fotoPersonal' size=50 value="<?php echo $this->tupla['fotopersonal']?>">
							</div>
						</div>

						<div class="card mb-4 shadow-sm">
							<div class="card-header">
								<!-- formulario sexo-->
								<label class="my-0 font-weight-normal"  data-translate="sexo"></label>
							</div>
							<div class="card-body">
								<input type= 'text' id='sexo' class="form-control-plaintext" name="sexo" <?php if($this->tupla['sexo']=='mujer'){ ?> data-translate="Mujer" value = "<?php $this->tupla['sexo'] ?>" <?php }else{ ?> data-translate="Hombre" value = "<?php $this->tupla['sexo'] ?>" <?php } ?> readonly/>
							</div>
						</div>
					</div>
				</div>
				<br>
				<!-- link -->
				<a href='../Controller/USUARIOS_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42"/> </a>
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
