<!--
	Archivo php
	Nombre: users_menuLateral.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019 
	Función: vista del menú lateral de la página
-->
<ul class="list-group list-group-flush list-group-horizontal ">
				<!-- lista de elementos-->
				<li class="list-group-item list-group-item-light"  style="text-align:center">
					<!-- enlace -->
					<a class="list-group-item-action" href='../Controller/PROFESOR_Controller.php'>
					<?php echo $strings['Gestion de profesores']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->
				
				<!-- lista de elementos-->
				<li class="list-group-item list-group-item-light" style="text-align:center">
					<!-- enlace a administraciÃ³n de usuarios -->
					<a class="list-group-item-action" href="../Controller/USUARIOS_Controller.php"> 
					<?php echo $strings['Gestion de usuarios']; ?>
					</a>

				</li> <!-- cierre lista -->

				<!-- lista de elementos-->
				<li class="list-group-item list-group-item-light" style="text-align:center">
					<!-- enlace administraciÃ³n de centros -->
					<a class="list-group-item-action" href='../Controller/CENTRO_Controller.php'>
					<?php echo $strings['Gestion de centros']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li class="list-group-item list-group-item-light" style="text-align:center">
					<!-- enlace administraciÃ³n de edificios -->
					<a class="list-group-item-action" href='../Controller/EDIFICIO_Controller.php'>
					<?php echo $strings['Gestion de edificios']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li class="list-group-item list-group-item-light" style="text-align:center"> 
					<!-- enlace adminsitraciÃ³n de espacios-->
					<a class="list-group-item-action" href='../Controller/ESPACIO_Controller.php'>
					<?php echo $strings['Gestion de espacios']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li class="list-group-item list-group-item-light" style="text-align:center">
					<!-- enlace administraciÃ³n de titulaciones-->
					<a class="list-group-item-action" href='../Controller/TITULACION_Controller.php'>
					<?php echo $strings['Gestion de titulaciones']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li class="list-group-item list-group-item-light" style="text-align:center">
					<!-- enlace administraciÃ³n de la relaciÃ³n de profesor espacio -->
					<a class="list-group-item-action" href='../Controller/PROF_ESPACIO_Controller.php'>
					<?php echo $strings['Gestion de prof_espacio']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li class="list-group-item list-group-item-light" style="text-align:center">
					<!-- enlace administraciÃ³n de la relaciÃ³n profesor titulaciÃ³n-->
					<a class="list-group-item-action" href='../Controller/PROF_TITULACION_Controller.php'>
					<?php echo $strings['Gestion de prof_titulacion']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->
			</ul>