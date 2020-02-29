<!--
	Archivo php
	Nombre: users_menuLateral.php
	Autor: 	Noa López Marchante
	Fecha de creación: 21/09/2019 
	Función: vista del menú lateral de la página
-->

		<!--contenedor de enlaces -->
		<nav>

			<!-- lista no ordenada -->
			<ul>
		
				<!-- lista de elementos-->
				<li>
					<!-- enlace -->
					<a href='../Controller/PROFESOR_Controller.php'><?php echo $strings['Gestion de profesores']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->
				
				<!-- lista de elementos-->
				<li>

					<!-- enlace a administración de usuarios -->
					<a href="../Controller/USUARIOS_Controller.php"> <?php echo $strings['Gestion de usuarios']; ?></a>

				</li> <!-- cierre lista -->

				<!-- lista de elementos-->
				<li>

					<!-- enlace administración de centros -->
					<a href='../Controller/CENTRO_Controller.php'><?php echo $strings['Gestion de centros']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li>
					<!-- enlace administración de edificios -->
					<a href='../Controller/EDIFICIO_Controller.php'><?php echo $strings['Gestion de edificios']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li>
					<!-- enlace adminsitración de espacios-->
					<a href='../Controller/ESPACIO_Controller.php'><?php echo $strings['Gestion de espacios']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li>
					<!-- enlace administración de titulaciones-->
					<a href='../Controller/TITULACION_Controller.php'><?php echo $strings['Gestion de titulaciones']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li>
					<!-- enlace administración de la relación de profesor espacio -->
					<a href='../Controller/PROF_ESPACIO_Controller.php'><?php echo $strings['Gestion de prof_espacio']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->

				<li>
					<!-- enlace administración de la relación profesor titulación-->
					<a href='../Controller/PROF_TITULACION_Controller.php'><?php echo $strings['Gestion de prof_titulacion']; ?>
					</a>
				</li> <!-- cierre lista de elementos-->
								
			</ul> <!-- cierre lista no ordenada -->

		</nav> <!-- cierre contenedor -->