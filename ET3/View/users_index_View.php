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
	
			// //llamada al array de strings en español
			// include '../Locale/Strings_SPANISH.php'; 

			//llamada a la cabecera
			include '../View/Header.php'; 

?>
			<!-- Contenedores con la información a mostrar en pantalla principal -->
			<div class="jumbotron" style="margin-top:4em">
        		<div class="container">
          			<h1 class="display-3"><label data-translate="BIENVENIDO A LA ARQUITECTURA BASE DE IU"></label></h1>
          			<p><label data-translate="Portal de gestion que permite almacenar y consultar informacion"></label></p>
				</div>
				<div class="row">
          			<div class="col-md-4">
						<h3><label data-translate="Formularios"></label></h3>
						<ul class="list-group">
  							<li class="list-group-item">
								<p><label data-translate="Completos formularios que permiten almacenar toda la informacion necesaria sobre las entidades"></label>
							 		<img src="../View/img/formulario.png" class="rounded float-right" height="84" width="106">
								</p>
							</li>
						</ul>
					</div>
         			<div class="col-md-4">
						<h3><label data-translate="Entidades"></label></h3>
						<ul class="list-group">
  							<li class="list-group-item">
							  <img src="../View/img/persona.png" class="rounded float-right" height="42" width="42"><label data-translate="Usuarios"></label></img>
							  </li>
  							<li class="list-group-item">
							  <img src="../View/img/edificio.png" class="rounded float-right" height="42" width="42"><label data-translate="Edificios"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/img/espacio.png" class="rounded float-right" height="42" width="42"><label data-translate="Espacios"></label></img>
							</li>
  							<li class="list-group-item">
							  <img src="../View/img/centro.png" class="rounded float-right" height="42" width="42"><label data-translate="Centros"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/img/titulacion.png" class="rounded float-right" height="42" width="42"><label data-translate="Titulacion"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/img/profesor.png" class="rounded float-right" height="42" width="42"><label data-translate="Profesores"></label></img>
							</li>
						</ul>
          			</div>
          			<div class="col-md-4">
            			<h3><label data-translate="Funcionalidades"></label></h3>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="../View/Icons/añadir.png" class="rounded float-right" height="42" width="42"><label data-translate="Añadir"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/buscar.png" class="rounded float-right" height="42" width="42"><label data-translate="Buscar"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/borrar.png" class="rounded float-right" height="42" width="42"><label data-translate="Borrar"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/modificar.png" class="rounded float-right" height="42" width="42"><label data-translate="Editar"></label></img>
							</li>
							<li class="list-group-item">
								<img src="../View/Icons/info.png" class="rounded float-right" height="42" width="42"><label data-translate="Informacion detallada"></label></img>
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