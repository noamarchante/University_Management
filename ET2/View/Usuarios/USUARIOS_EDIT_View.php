<?php

/*
	Archivo php
	Nombre: USUARIOS_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 23/09/2019 
	Función: vista del menú de editar
*/

	
	class USUARIOS_EDIT{ //clase editar
		var $tupla; //variable que define las tuplas
		//constructor
		function __construct($tupla){

			//inicialización de variables
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
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' enctype="multipart/form-data" onsubmit="return comprobarAddUsuario()">
				<!-- texto -->
				<h1 class="tituloFormulario"><?php echo $strings['Editar']; ?>   <img width="42" height="42" src="../View/Icons/modificar.png" width="42" height="42"></h1>	
				<div class="row justify-content-md-left">
					<!--formulario login -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['login']?></label>
					<div class="form-group">
						<input type = 'text' name = 'login' id = 'login'class="form-control input-lg" size=15 maxlength="15" value = '<?php echo $this->tupla['login']; ?>' onblur="comprobarVacio(this) && comprobarDni(this)"S readonly><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario contraseña-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['password']?></label>
					<div class="form-group">
						<input type = 'password' name = 'password' id = 'password' class="form-control input-lg" placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '20' maxlength="20" value = '<?php echo $this->tupla['password']; ?>' onblur="comprobarVacio(this)  && comprobarTexto(this,128)" required><br>
					</div>
				</div>	

				<div class="row justify-content-md-left">
					<!-- formulario nombre -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Nombre']?></label>
					<div class="form-group">
						<input type = 'text' name = 'nombre' class="form-control input-lg" id = 'nombre' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' maxlength="30" value = '<?php echo $this->tupla['nombre']; ?>' onblur="comprobarVacio(this)  && comprobarAlfabetico(this,30)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario apellidos-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Apellidos']?></label>
					<div class="form-group">
						<input type = 'text' class="form-control input-lg" name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' maxlength="50" value = '<?php echo $this->tupla['apellidos']; ?>' onblur="comprobarVacio(this)  && comprobarAlfabetico(this,50)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario dni -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['DNI']?></label>
					<div class="form-group">
						<input type = 'text' name = 'dni' id = 'dni' class="form-control input-lg" placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' maxlength="9" value = "<?php echo $this->tupla['DNI']; ?>" onblur="comprobarVacio(this) && comprobarDni(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario telefono -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Telefono']?></label>
					<div class="form-group">
						<input type = 'telf' name = 'telefono' class="form-control input-lg" maxlength="11" id = 'telefono' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '11' value = "<?php echo $this->tupla['telefono']; ?>" onblur="comprobarVacio(this) && comprobarTelf(this)" required><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario email -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['email']?></label>
					<div class="form-group">
						<input type = 'email' name = 'email' class="form-control input-lg" id = 'email' size = '60' maxlength="60" placeholder = "<?php echo $strings['Introduce tu email']; ?>" value = '<?php echo $this->tupla['email']; ?>' onblur="comprobarVacio(this)  && comprobarEmail(this)"required ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario cumpleaños -->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Fecha de nacimiento']?></label>
					<div class="form-group">
						<input type = 'text' name = 'fechaNacimiento' class="tcal" readonly id = 'fechaNacimiento' value= "<?php echo $this->tupla['FechaNacimiento'];?>" required  onblur="comprobarVacio(this)"> <br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario foto-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['Foto personal']?></label>
					<div class="form-group">
						<img src="<?php echo $this->tupla['fotopersonal'];?>" width="300" height="300" alt="<?php echo $strings['imagen'];?>"/>
						<input type='file' size=50 maxlength="50" name= 'fotoPersonal' class="form-control input-lg" id='fotoPersonal' placeholder = "<?php echo $strings['Foto personal']; ?>" value = ""  onblur="comprobarVacio(this)" ><br>
					</div>
				</div>

				<div class="row justify-content-md-left">
					<!-- formulario sexo-->
					<label class="col-sm-2 col-form-label"><?php echo $strings['sexo'];?></label>
					<div class="form-group">
						<select name="sexo" class="form-control input-lg" required  onblur="comprobarVacio(this)">
							<option <?php if($this->tupla['sexo']=='hombre'){?> selected="true" <?php } ?> value="hombre"><?php echo $strings['Hombre']; ?></option>
							<option <?php if($this->tupla['sexo']=='mujer'){?> selected="true" <?php } ?> value="mujer"><?php echo $strings['Mujer']; ?></option>
						</select> 
					</div>
				</div>
				
				<div class="row justify-content-md-left">
					<!-- link -->
					<a href='../Controller/USUARIOS_Controller.php'><img src="../View/Icons/volver.png" width="42" height="42" alt="<?php echo $strings['Volver']; ?>"/> </a>
					<!-- botón -->
					<button type='submit'  class="button" name='action' value='EDIT'><img src="../View/Icons/modificar.png" width="42" height="42" alt="<?php echo $strings['Editar']; ?>"/></button>
				</div>
			</form> <!-- cierre formulario-->
				
		
			

			<!-- saltos -->
			<br>
			<br>
			<br>
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin editar

?>