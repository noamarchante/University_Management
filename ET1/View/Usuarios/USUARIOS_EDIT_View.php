<?php

/*
	Archivo php
	Nombre: USUARIOS_EDIT_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 23/09/2019 
	Función: vista del menú de editar
*/

	
	class USUARIOS_EDIT{ //clase editar

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

			<!-- texto -->
			<h1><?php echo $strings['Editar']; ?></h1>	
			<!-- formulario -->
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 <!--formulario login -->
				<?php echo $strings['login'] . ':' ?>
				 <input type = 'text' name = 'login' id = 'login' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = '<?php echo $this->tupla['login']; ?>' onblur="esNoVacio('login')  && comprobarDni('login')" readonly><br>

				<!-- formulario contraseña-->
				<?php echo $strings['password'] . ':' ?> <input type = 'password' name = 'password' id = 'password' placeholder = "<?php echo $strings['Letras y numeros']; ?>" size = '15' value = '<?php echo $this->tupla['password']; ?>' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" ><br>

				<!-- formulario dni -->
				<?php echo $strings['DNI'] . ':' ?> <input type = 'text' name = 'dni' id = 'dni' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" size = '9' value = "<?php echo $this->tupla['DNI']; ?>" onblur="esNoVacio('dni') && comprobarDni('dni')" ><br>

				<!-- formulario nombre -->
				<?php echo $strings['Nombre'] . ':' ?>
				<input type = 'text' name = 'nombre' id = 'nombre' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '30' value = '<?php echo $this->tupla['nombre']; ?>' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>

				<!-- formulario apellidos-->
				<?php echo $strings['Apellidos'] . ':' ?> <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = "<?php echo $strings['Solo letras']; ?>" size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>


				<!-- formulario telefono -->
				<?php echo $strings['Telefono'] . ':' ?> <input type = 'number' name = 'telefono' min='0' max='999999999' id = 'telefono' placeholder = "<?php echo $strings['Solo numeros']; ?>" size = '9' value = "<?php echo $this->tupla['telefono']; ?>" onblur="esNoVacio('telefono')" ><br>

				<!-- formulario email -->
				<?php echo $strings['email'] . ':' ?>
				<input type = 'email' name = 'email' id = 'email' size = '40' value = '<?php echo $this->tupla['email']; ?>' onblur="esNoVacio('email')  && comprobarEmail('email')" ><br>
				
				<!-- formulario cumpleaños -->
				<?php echo $strings['Fecha de nacimiento'] . ':' ?> <input type = 'date' name = 'fechaNacimiento' id = 'fechaNacimiento' value= "<?php echo $this->tupla['FechaNacimiento'];?>"> <br>

				<!-- formulario foto-->
				<?php echo $strings['Foto personal'] . ':' ?><input type='text' name= 'fotoPersonal' id='fotoPersonal' size='40' value = "<?php echo $this->tupla['fotopersonal'];?>"><br>

				<!-- formulario sexo-->
				<select name="sexo">
				<option <?php if($this->tupla['sexo']=='hombre'){?> selected="true" <?php } ?> value="hombre"><?php echo $strings['Hombre']; ?></option>
		        <option <?php if($this->tupla['sexo']=='mujer'){?> selected="true" <?php } ?> value="mujer"><?php echo $strings['Mujer']; ?></option>
				</select> 

				<!-- salto -->
				<br>

				<!-- botón -->
				<button type='submit' name='action' value='EDIT'><?php echo $strings['Editar']; ?></button>

			</form> <!-- cierre formulario-->
				
		
			<!-- link -->
			<a href='../Controller/USUARIOS_Controller.php'> <?php echo $strings['Volver']; ?> </a>

			<!-- saltos -->
			<br>
			<br>
			<br>

			<!-- formulario -->
			<form name = 'Form' action='../Functions/Desconectar.php' method='post'>

				<!--botón -->
				<input type='submit' name='action' value='<?php echo $strings['Desconectar']; ?>'>

			</form><!-- cierre formulario -->
		
<!-- ------------------------------------------------------------------------------------------------------------ -->	

		<?php

			//llamada a footer
			include '../View/Footer.php';
			
		} //fin metodo render

	} //fin editar

?>