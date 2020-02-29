<?php
/*
	Archivo test
	Nombre: USUARIOS_VALIDACION_test.php
	Autor: 	Noa López Marchante
	Fecha de creación: 13/12/2019 
	Función: test funciones de validación usuario
*/
function Titulacion_comprobarCodTitulacion_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test = array();
    $TITULACION_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = '';
    $titulacion = new TITULACION_Model($codTitulacion,'','','');
    
    $comp = $titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'CodTitulacion';
$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$TITULACION_array_test1['error_esperado'] = '00003';
$TITULACION_array_test1['error_obtenido'] = '';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$codTitulacion = 'a';
$titulacion = new TITULACION_Model($codTitulacion,'','','');

$comp = $titulacion->Comprobar_CODTITULACION();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'FALSE';
    }else{
        $TITULACION_array_test1['resultado'] = 'OK';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = 'aaaaaaaaaaa989989aaaaaaaaaaaa';
    $titulacion = new TITULACION_Model($codTitulacion,'','','');
    
    $comp = $titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'CodTitulacion';
	$TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos y números';
	$TITULACION_array_test1['error_esperado'] = '00060';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = 'ºº';
    $titulacion = new TITULACION_Model($codTitulacion,'','','');
    
    $comp = $titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $TITULACION_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'CodTitulacion';
$TITULACION_array_test1['error'] = 'CodTitulacion correcto';
$TITULACION_array_test1['error_esperado'] = true;
$TITULACION_array_test1['error_obtenido']='';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$codTitulacion = 'T01';
$titulacion = new TITULACION_Model($codTitulacion,'','','');
$comp = $titulacion->Comprobar_CODTITULACION();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr((string)$TITULACION_array_test1['error_obtenido'],(string)$TITULACION_array_test1['error_esperado']))>0){

    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);
}
/***************************************************************************************************************** */
function Titulacion_comprobarCodCentro_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test = array();
    $TITULACION_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'CodCentro';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = '';
    $titulacion = new TITULACION_Model('',$codCentro,'','');
    
    $comp = $titulacion->Comprobar_CODCENTRO();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'CodCentro';
$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$TITULACION_array_test1['error_esperado'] = '00003';
$TITULACION_array_test1['error_obtenido'] = '';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$codCentro = 'aa';
$titulacion = new TITULACION_Model('',$codCentro,'','');

$comp = $titulacion->Comprobar_CODCENTRO();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'FALSE';
    }else{
        $TITULACION_array_test1['resultado'] = 'OK';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'CodCentro';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = 'aaaaaaaaaaa98998ºaaaaaaaaaaaa';
    $titulacion = new TITULACION_Model('',$codCentro,'','');
    
    $comp = $titulacion->Comprobar_CODCENTRO();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'CodCentro';
	$TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos,números y el "-"';
	$TITULACION_array_test1['error_esperado'] = '00040';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = 'ºº';
    $titulacion = new TITULACION_Model('',$codCentro,'','');
    
    $comp = $titulacion->Comprobar_CODCENTRO();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $TITULACION_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'CodCentro';
$TITULACION_array_test1['error'] = 'CodCentro correcto';
$TITULACION_array_test1['error_esperado'] = true;
$TITULACION_array_test1['error_obtenido']='';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$codCentro = 'C-001';
$titulacion = new TITULACION_Model('',$codCentro,'','');
$comp = $titulacion->Comprobar_CODCENTRO();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr((string)$TITULACION_array_test1['error_obtenido'],(string)$TITULACION_array_test1['error_esperado']))>0){

    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);
}

/***************************************************************************************************************** */
function Titulacion_comprobarNombreTitulacion_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test = array();
    $TITULACION_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Nombre titulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $nombre = '';
    $titulacion = new TITULACION_Model('','',$nombre,'');
    
    $comp = $titulacion->Comprobar_NOMBRETITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'Nombre titulacion';
$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$TITULACION_array_test1['error_esperado'] = '00003';
$TITULACION_array_test1['error_obtenido'] = '';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$nombre = 'aa';
$titulacion = new TITULACION_Model('','',$nombre,'');

$comp = $titulacion->Comprobar_NOMBRETITULACION();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'FALSE';
    }else{
        $TITULACION_array_test1['resultado'] = 'OK';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Nombre titulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $nombre = 'aaaaaaaaaaa98998ºaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $titulacion = new TITULACION_Model('','',$nombre,'');
    
    $comp = $titulacion->Comprobar_NOMBRETITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Nombre titulacion';
	$TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $nombre = 'ºº';
    $titulacion = new TITULACION_Model('','',$nombre,'');
    
    $comp = $titulacion->Comprobar_NOMBRETITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $TITULACION_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'Nombre titulacion';
$TITULACION_array_test1['error'] = 'NombreTitulacion correcto';
$TITULACION_array_test1['error_esperado'] = true;
$TITULACION_array_test1['error_obtenido']='';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$nombre = 'Cccca';
$titulacion = new TITULACION_Model('','',$nombre,'');
$comp = $titulacion->Comprobar_NOMBRETITULACION();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr((string)$TITULACION_array_test1['error_obtenido'],(string)$TITULACION_array_test1['error_esperado']))>0){

    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);
}

/***************************************************************************************************************** */
function Titulacion_comprobarResponsableTitulacion_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test = array();
    $TITULACION_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Responsable titulacion';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $responsable = '';
    $titulacion = new TITULACION_Model('','','',$responsable);
    
    $comp = $titulacion->Comprobar_RESPONSABLETITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'Responsable titulacion';
$TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$TITULACION_array_test1['error_esperado'] = '00003';
$TITULACION_array_test1['error_obtenido'] = '';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$responsable = 'º';
$titulacion = new TITULACION_Model('','','',$responsable);

$comp = $titulacion->Comprobar_RESPONSABLETITULACION();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'FALSE';
    }else{
        $TITULACION_array_test1['resultado'] = 'OK';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Responsable titulacion';
	$TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$TITULACION_array_test1['error_esperado'] = '00002';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $responsable = 'aaaaaaaaaaa98998ºaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $titulacion = new TITULACION_Model('','','',$responsable);
    
    $comp = $titulacion->Comprobar_RESPONSABLETITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Responsable titulacion';
	$TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos';
	$TITULACION_array_test1['error_esperado'] = '00030';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $responsable = 'ºº';
    $titulacion = new TITULACION_Model('','','',$responsable);
    
    $comp = $titulacion->Comprobar_RESPONSABLETITULACION();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $TITULACION_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'Responsable titulacion';
$TITULACION_array_test1['error'] = 'ResponsableTitulacion correcto';
$TITULACION_array_test1['error_esperado'] = true;
$TITULACION_array_test1['error_obtenido']='';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$responsable = 'Cccc';
$titulacion = new TITULACION_Model('','','',$responsable);
$comp = $titulacion->Comprobar_RESPONSABLETITULACION();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr((string)$TITULACION_array_test1['error_obtenido'],(string)$TITULACION_array_test1['error_esperado']))>0){

    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);
}

/***************************************************************************************************************** */
function Titulacion_Comprobar_Atributos_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test = array();
    $TITULACION_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['atributo'] = 'Titulacion';
	$TITULACION_array_test1['error'] = 'Titulacion incorrecto';
	$TITULACION_array_test1['error_esperado'] = '00001';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion='';
    $codCentro='C-0001';
    $nombre = '';
    $responsable='rgrtggrg';
    $titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombre,$responsable);
    
    $comp = $titulacion->Comprobar_atributos();
    if(is_array($comp)){
    $TITULACION_array_test = $comp;
    foreach($TITULACION_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $TITULACION_array_test1['error_obtenido']=$codigos;
    }else{
        $TITULACION_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($TITULACION_array_test1['error_obtenido'],$TITULACION_array_test1['error_esperado']))>0){
        if($TITULACION_array_test1['error_obtenido']===true){
        
        $TITULACION_array_test1['resultado'] = 'FALSE';
        }else{
            $TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $TITULACION_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$TITULACION_array_test1['entidad'] = 'TITULACION';	
$TITULACION_array_test1['atributo'] = 'Titulacion';
$TITULACION_array_test1['error'] = 'Titulacion correcto';
$TITULACION_array_test1['error_esperado'] = true;
$TITULACION_array_test1['error_obtenido']='';
$TITULACION_array_test1['resultado'] = '';
$codigos='';
$codigos='';
    $codTitulacion='bhujbujb';
    $codCentro='C-0001';
    $nombre = 'bujyujyb';
    $responsable='rgrtggrg';
    $titulacion = new TITULACION_Model($codTitulacion,$codCentro,$nombre,$responsable);
$comp = $titulacion->Comprobar_atributos();
if(is_array($comp)){
$TITULACION_array_test = $comp;
foreach($TITULACION_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$TITULACION_array_test1['error_obtenido']=$codigos;
}else{
    $TITULACION_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr((string)$TITULACION_array_test1['error_obtenido'],(string)$TITULACION_array_test1['error_esperado']))>0){

    if($TITULACION_array_test1['error_obtenido']===true){
    
    $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{
    $TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $TITULACION_array_test1);
}

Titulacion_comprobarCodTitulacion_test();
Titulacion_comprobarCodCentro_test();
Titulacion_comprobarNombreTitulacion_test();
Titulacion_comprobarResponsableTitulacion_test();
Titulacion_Comprobar_Atributos_test();


?>