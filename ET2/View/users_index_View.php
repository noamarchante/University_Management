<?php

/*
	Archivo php
	Nombre: users_index_View.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21-09-2019  
	Función: vista de la pantalla inicial
*/

	class Index { //clase índice

		//constructor
		function __construct(){ 

			//llamada a la función render
			$this->render(); 

		}//fin constructor

		//función render
		function render(){ 
	
			//llamada al array de strings en español
			include '../Locale/Strings_SPANISH.php'; 

			//llamada a la cabecera
			include '../View/Header.php'; 

?>
			<!-- Contenedores con la información a mostrar en pantalla principal -->
			<div class="jumbotron">
        		<div class="container">
          			<h1 class="display-3"><?php echo $strings['BIENVENIDO A LA ARQUITECTURA BASE DE IU'];?></h1>
          			<p><?php echo $strings['Portal de gestion que permite almacenar y consultar informacion'];?></p>
				</div>
				<div class="row">
          			<div class="col-md-4">
						<h2><?php echo $strings['Formularios'];?></h2>
						<ul class="list-group">
  							<li class="list-group-item">
								<p><?php echo $strings['Completos formularios que permiten almacenar toda la informacion necesaria sobre las entidades'];?>
							 		<img src="../View/img/formulario.png" class="rounded float-right" height="84" width="106">
								</p>
							</li>
						</ul>
					</div>
         			<div class="col-md-4">
						<h2><?php echo $strings['Entidades'];?></h2>
						<ul class="list-group">
  							<li class="list-group-item">
							  <img src="../View/img/persona.jpg" class="rounded float-right" height="42" width="42"><?php echo $strings['Usuarios'];?></img>
							  </li>
  							<li class="list-group-item">
							  <img src="../View/img/edificio.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Edificios'];?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/img/espacio.jpg" class="rounded float-right" height="42" width="42"><?php echo $strings['Espacios'];?></img>
							</li>
  							<li class="list-group-item">
							  <img src="../View/img/centro.jpg" class="rounded float-right" height="42" width="42"><?php echo $strings['Centros']?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/img/titulacion.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Titulacion'];?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/img/profesor.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Profesores'];?></img>
							</li>
						</ul>
          			</div>
          			<div class="col-md-4">
            			<h2><?php echo $strings['Funcionalidades'];?></h2>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="../View/Icons/añadir.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Añadir'];?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/buscar.jpg" class="rounded float-right" height="42" width="42"><?php echo $strings['Buscar'];?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/borrar.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Borrar'];?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/modificar.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Editar'];?></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/info.png" class="rounded float-right" height="42" width="42"><?php echo $strings['Informacion detallada'];?></img>
							</li>
						</ul>
          			</div>
       			 </div>
      		</div>
<?php
			//llamada al pie
			include '../View/Footer.php'; 

?>

<!-- ---------------------------------------------------------------------------------------------------------------- -->

<?php
		}//fin función render

	}//fin clase

?>