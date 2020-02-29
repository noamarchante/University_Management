<?php

/*
	Archivo php
	Nombre: Login_View.php
	Autor: 	Noa López Marchante
	Fecha de creación:  21-09-2019
	Función: muestra la vista de login con los campos a cubrir para mandar la información a Login_Controller
*/

	
	class Login{ //clase login

		//constructor de la clase
		function __construct(){	

			//llamada a la función render
			$this->render(); 
		
		}//fin constructor

//-------------------------------------------------------------------------------------------------------------------

		//función render
		function render(){ 

			//llamada a la cabecera
			include '../View/Header.php';  

			?>

<!-- ------------------------------------------------------------------------------------------------------------------ -->
		
			<!--muestra el nombre de la vista--> 
			<h1 class="tituloFormulario"><?php echo $strings['Inicio sesion'];?>  <img src="../View/Icons/login.png" width="42" height="42" alt="<?php echo $strings['Login'];?>" /></h1> 	
			<br>
			<br>
			<form  name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();"> 
			<div class="row justify-content-md-center">
				<!--casilla para el nombre de usuario-->
				<label class="col-sm-2 col-form-label"><?php echo $strings['login']?></label>
				<div class="form-group">
				 	<input class="form-control input-lg" size=15 maxlength=15 type = 'text' name = 'login' placeholder = "<?php echo $strings['Utiliza tu Dni']; ?>" value = '' onblur="comprobarVacio(this) && comprobarTexto(this,15)"><br>
				</div>
			</div>
			<div class="row justify-content-md-center">
				<!--casilla para la contraseña-->
				<label class="col-sm-2 col-form-label"><?php echo $strings['password']?></label>
				<div class="form-group">
					<input class="form-control input-lg" type = 'password' name = 'password' placeholder = "<?php echo $strings['Letras y numeros']; ?>"  size = '20' maxlength=20 value = '' onblur="comprobarVacio(this)  && comprobarTexto(this,20)"  ><br>
				</div>
			</div>

				<div class="row justify-content-md-center">
				<!-- boton de enviar-->
				<button class="mb-4" type="submit" style="background:white;border:white" name="action"><img src="../View/Icons/login.png" width="42" height="42" alt="<?php echo $strings['Login'];?>" /></button>
				</div>
			</form> <!--cierre formulario-->

<!-- ----------------------------------------------------------------------------------------------------------------- -->

			<?php
		
			//llamada al pie
			include '../View/Footer.php'; 

		} //fin metodo render

	} //fin Login

?>
