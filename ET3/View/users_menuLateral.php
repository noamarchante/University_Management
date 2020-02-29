<!--
	Archivo php
	Nombre: users_menuLateral.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019 
	Función: vista del menú lateral de la página
-->
<div class="code-wrap code-box box">
	<nav class="navbar navbar-expand-sm bg-light justify-content-center" style="margin-top:-4.75em;position:relative;width:100%;">
	<ul class="navbar-nav" > 
					<!-- lista de elementos-->
					<li class="nav-item">
						<!-- enlace a administraciÃ³n de usuarios -->
						<a class="nav-link" style="color:black; font-family:roboto" href="../Controller/USUARIOS_Controller.php" >
						<label data-translate="USUARIOS"></label>    <img src="../View/img/persona.png" width="22" height="22">   
						</a>

					</li> <!-- cierre lista -->
					<!-- lista de elementos-->
					<li class="nav-item">
						<!-- enlace -->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/PROFESOR_Controller.php'>
						<label data-translate="PROFESORES"></label>    <img src="../View/img/profesor.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->
					
					<li class="nav-item">
						<!-- enlace administraciÃ³n de edificios -->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/EDIFICIO_Controller.php'>
						<label data-translate="EDIFICIOS"></label>    <img src="../View/img/edificio.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->
					
					<!-- lista de elementos-->
					<li class="nav-item">
						<!-- enlace administraciÃ³n de centros -->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/CENTRO_Controller.php'>
						<label data-translate="CENTROS"></label>    <img src="../View/img/centro.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->

					<li class="nav-item"> 
						<!-- enlace adminsitraciÃ³n de espacios-->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/ESPACIO_Controller.php'>
						<label data-translate="ESPACIOS"></label>    <img src="../View/img/espacio.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->

					<li class="nav-item">
						<!-- enlace administraciÃ³n de titulaciones-->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/TITULACION_Controller.php'>
						<label data-translate="TITULACIONES"></label>   <img src="../View/img/titulacion.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->

					<li class="nav-item">
						<!-- enlace administraciÃ³n de la relaciÃ³n de profesor espacio -->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/PROF_ESPACIO_Controller.php'>
						<label data-translate="PROFESOR_ESPACIO"></label>    <img src="../View/img/profesor.png" width="22" height="22"><img src="../View/img/espacio.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->

					<li class="nav-item">
						<!-- enlace administraciÃ³n de la relaciÃ³n profesor titulaciÃ³n-->
						<a class="nav-link" style="color:black; font-family:roboto" href='../Controller/PROF_TITULACION_Controller.php'>
						<label data-translate="PROFESOR_TITULACION"></label>    <img src="../View/img/profesor.png" width="22" height="22"><img src="../View/img/titulacion.png" width="22" height="22">   
						</a>
					</li> <!-- cierre lista de elementos-->
				</ul>

	</nav>
</div>