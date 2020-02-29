<!-- Archivo test
    Nombre: ESPACIO_VALIDACION_test.php
    Autor:  Noa López Marchante
    Fecha de creación: 13/12/2019 
    Función: test funciones de validación usuario-->
<link rel="stylesheet" href="../View/bootstrap/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../View/css/estilo.css" />
<script type="text/javascript" src="../View/bootstrap/js/bootstrap.min.js"></script> 
<script src="/path/to/bootstrap-hover-dropdown.min.js"></script>

<?php
// crear el array principal de test
	$ERRORS_array_test = array();
	$ERRORS_array_test1 = array();
	$ERRORS_array_test2 = array();
	$ERRORS_array_test3 = array();
// incluimos aqui tantos ficheros de test como entidades
$ERRORS_array_test = array();
include '../test/Global_test.php';
$ERRORS_array_test1 =$ERRORS_array_test;

$ERRORS_array_test = array();
include '../test/USUARIOS_test.php';
include '../test/EDIFICIO_test.php';
include '../test/CENTRO_test.php';
include '../test/ESPACIO_test.php';
include '../test/TITULACION_test.php';
include '../test/PROFESOR_test.php';
include '../test/PROF_TITULACION_test.php';
include '../test/PROF_ESPACIO_test.php';
$ERRORS_array_test2 = $ERRORS_array_test;
$errores=0;
$ERRORS_array_test = array();
include '../test/USUARIOS_VALIDACION_test.php';
include '../test/PROFESOR_VALIDACION_test.php';
include '../test/CENTRO_VALIDACION_test.php';
include '../test/ESPACIO_VALIDACION_test.php';
include '../test/PROF_ESPACIO_VALIDACION_test.php';
include '../test/PROF_TITULACION_VALIDACION_test.php';
include '../test/TITULACION_VALIDACION_test.php';
include '../test/EDIFICIO_VALIDACION_test.php';

$ERRORS_array_test3 =$ERRORS_array_test;
foreach ($ERRORS_array_test1 as $test)
	{
	
	 if ($test['resultado']=='FALSE'){
		 $errores++;
	 }
	}
	foreach ($ERRORS_array_test2 as $test)
	{
	
	 if ($test['resultado']=='FALSE'){
		 $errores++;
	 }
	}
	foreach ($ERRORS_array_test3 as $test)
	{
	
	 if ($test['resultado']=='FALSE'){
		 $errores++;
	 }
	}
?>


<h2 style="background-color:yellow;text-align:center;border:double">De <?php echo count($ERRORS_array_test1)+count($ERRORS_array_test2)+ count($ERRORS_array_test3); ?> tests hay <?php echo $errores;echo " errores"?> </h2>
<br>

<?php
// presentacion de resultados
?>
<h1 class="tituloFormulario">Pruebas Globales</h1>
<table class="table">
<thead class="thead-dark">
	<tr>
		<th scope="col">
			Error testeado
		</th>
		<th scope="col">
			Valor Esperado
		</th>
		<th scope="col">
			Valor Obtenido
		</th>
		<th scope="col">
			Resultado
		</th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach ($ERRORS_array_test1 as $test)
	{
	
	 if ($test['resultado']=='FALSE'){
		?>
			
		<tr style="background: red;">	
				
			
			<?php
			}else{ 
?>

	<tr>

	<?php
	}
	?>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>

			<?php  echo $test['resultado'];?>
		</td>
	</tr>
<?php	
	}
?>
</tbody>
</table>



<?php


?>

<h1 class="tituloFormulario">Pruebas Unitarias</h1>
<table class="table">
<thead class="thead-dark">
	<tr>
		<th scope="col">
			Entidad
		</th>
		<th scope="col">
			Método
		</th>
		<th scope="col">
			Error testeado
		</th>
		<th scope="col">
			Valor esperado
		</th>
		<th scope="col">
			Valor obtenido
		</th>
		<th scope="col">
			Resultado
		</th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach ($ERRORS_array_test2 as $test)
	{
	
	 if ($test['resultado']=='FALSE'){
		?>
			
		<tr style="background: red;">	
				
			
			<?php
			}else{ 
?>

	<tr>

	<?php
	}
	?>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>

			<?php  echo $test['resultado'];?>
		</td>
	</tr>
<?php	
	}
?>
</tbody>
</table>



<?php

?>

<h1 class="tituloFormulario">Pruebas Validación</h1>
<table class="table">
<thead class="thead-dark">
	<tr>
		<th scope="col">
			Entidad
		</th>
		<th scope="col">
			Atributo
		</th>
		<th scope="col">
			Error testeado
		</th>
		<th scope="col">
			Valor esperado
		</th>
		<th scope="col">
			Valor obtenido
		</th>
		<th scope="col">
			Resultado
		</th>
	</tr>
	</thead>
	<tbody>
<?php
	foreach ($ERRORS_array_test3 as $test)
	{
	
	 if ($test['resultado']=='FALSE'){
		?>
			
		<tr style="background: red;">	
				
			
			<?php
			}else{ 
?>

	<tr>

	<?php
	}
	?>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['atributo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>

			<?php  echo $test['resultado'];?>
		</td>
	</tr>
<?php	
	}
?>
</tbody>
</table>