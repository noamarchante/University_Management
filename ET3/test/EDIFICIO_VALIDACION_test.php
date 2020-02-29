<?php
/*Archivo php
Nombre: EDIFICIO_VALIDACION_test.php
Autor: 	Noa López Marchante
Fecha de creación: 14/12/2019 
Función: Testea validaciones EDIFICIO
    */
    
    //eDIFICIO_COMPROBARCODEFICIO_TEST(): cod edificio test
function Edificio_comprobarCodEdificio_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test = array();
    $EDIFICIO_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = '';
    $edificio = new EDIFICIO_Model($codEdificio,'','','');
    
    $comp = $edificio->Comprobar_CODEDIFICIO();
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
        //comp
        if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'CodEdificio';
$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$EDIFICIO_array_test1['error_esperado'] = '00003';
$EDIFICIO_array_test1['error_obtenido'] = '';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$codEdificio = '33';
$edificio = new EDIFICIO_Model($codEdificio,'','','');

$comp = $edificio->Comprobar_CODEDIFICIO();
//comp
if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
//comp
if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = 'aaaaaaaaaaa989989aaaaaaaaaaaa33333333333333333333';
    $edificio = new EDIFICIO_Model($codEdificio,'','','');
    
    $comp = $edificio->Comprobar_CODEDIFICIO();
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    
        if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }///fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'CodEdificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidos alfabéticos, números y el "-"';
	$EDIFICIO_array_test1['error_esperado'] = '00040';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = '//';
    $edificio = new EDIFICIO_Model($codEdificio,'','','');
    
    $comp = $edificio->Comprobar_CODEDIFICIO();
    //comp
    
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    
        if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'CodEdificio';
$EDIFICIO_array_test1['error'] = 'CodEdificio correcto';
$EDIFICIO_array_test1['error_esperado'] = true;
$EDIFICIO_array_test1['error_obtenido']='';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$codEdificio = 'T-01';
$edificio = new EDIFICIO_Model($codEdificio,'','','');
$comp = $edificio->Comprobar_CODEDIFICIO();
    //comp

if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr((string)$EDIFICIO_array_test1['error_obtenido'],(string)$EDIFICIO_array_test1['error_esperado']))>0){
    //comp

    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);
}///fin

/***************************************************************************************************************** */
//edificio comprobarnombreedificio_test (): nombre test
function Edificio_comprobarNombreEdificio_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test = array();
    $EDIFICIO_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Nombre edificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $nombre = '';
    $edificio = new EDIFICIO_Model('',$nombre,'','');
    
    $comp = $edificio->Comprobar_NOMBREEDIFICIO();
    //comp
    
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{///else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//fin
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Nombre edificio';
$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$EDIFICIO_array_test1['error_esperado'] = '00003';
$EDIFICIO_array_test1['error_obtenido'] = '';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$nombre = '33';
$edificio = new EDIFICIO_Model('',$nombre,'','');

$comp = $edificio->Comprobar_NOMBREEDIFICIO();
    //comp
    if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{///else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Nombre edificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $nombre = 'aaaaaaaaaaa989986666666333333333333333333aaaaaaaaaaaa';
    $edificio = new EDIFICIO_Model('',$nombre,'','');
    
    $comp = $edificio->Comprobar_NOMBREEDIFICIO();
    //comp
    
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Nombre edificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos';
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $nombre = '//';
    $edificio = new EDIFICIO_Model('',$nombre,'','');
    
    $comp = $edificio->Comprobar_NOMBREEDIFICIO();
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Nombre edificio';
$EDIFICIO_array_test1['error'] = 'NombreEdificio correcto';
$EDIFICIO_array_test1['error_esperado'] = true;
$EDIFICIO_array_test1['error_obtenido']='';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$nombre = 'Cccc';
$edificio = new EDIFICIO_Model('',$nombre,'','');
$comp = $edificio->Comprobar_NOMBREEDIFICIO();
    //comp

if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr((string)$EDIFICIO_array_test1['error_obtenido'],(string)$EDIFICIO_array_test1['error_esperado']))>0){
    //comp

    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{//elsew
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);
}//fin

/***************************************************************************************************************** */

//edificiio comprobardireccionedificio_test: test dire
function Edificio_comprobarDireccionEdificio_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test = array();
    $EDIFICIO_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Direccion edificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $direccion = '';
    $edificio = new EDIFICIO_Model('','',$direccion,'');
    
    $comp = $edificio->Comprobar_DIRECCIONEDIFICIO();
    //comp
    
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Direccion edificio';
$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$EDIFICIO_array_test1['error_esperado'] = '00003';
$EDIFICIO_array_test1['error_obtenido'] = '';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$direccion = '44';
$edificio = new EDIFICIO_Model('','',$direccion,'');

$comp = $edificio->Comprobar_DIRECCIONEDIFICIO();
    //comp
    if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}///fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Direccion edificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $direccion = 'aaaaaaaaaaa98998HHHTHTHTHTHTHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa98998HHHTHTHTHTHTHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa98998HHHTHTHTHTHTHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa98998HHHTHTHTHTHTHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa98998HHHTHTHTHTHTHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $edificio = new EDIFICIO_Model('','',$direccion,'');
    
    $comp = $edificio->Comprobar_DIRECCIONEDIFICIO();
    //comp
    
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Direccion edificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos y espacios, números y los símbolos "-/ºª';
	$EDIFICIO_array_test1['error_esperado'] = '00050';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $direccion = '¡¡';
    $edificio = new EDIFICIO_Model('','',$direccion,'');
    
    $comp = $edificio->Comprobar_DIRECCIONEDIFICIO();
    
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Direccion edificio';
$EDIFICIO_array_test1['error'] = 'Direccion edificio correcto';
$EDIFICIO_array_test1['error_esperado'] = true;
$EDIFICIO_array_test1['error_obtenido']='';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$direccion = 'Cccc';
$edificio = new EDIFICIO_Model('','',$direccion,'');
$comp = $edificio->Comprobar_DIRECCIONEDIFICIO();
    //comp
    if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr((string)$EDIFICIO_array_test1['error_obtenido'],(string)$EDIFICIO_array_test1['error_esperado']))>0){
    //comp

    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{//eslse
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);
}//fin


/***************************************************************************************************************** */
//edificio comprobarcampusedificio_test: campus test
function Edificio_comprobarCampusEdificio_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test = array();
    $EDIFICIO_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Campus edificio';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $campus = '';
    $edificio = new EDIFICIO_Model('','','',$campus);
    
    $comp = $edificio->Comprobar_CAMPUSEDIFICIO();
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fnin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
 // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Campus edificio';
$EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
$EDIFICIO_array_test1['error_esperado'] = '00003';
$EDIFICIO_array_test1['error_obtenido'] = '';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$campus = '44';
$edificio = new EDIFICIO_Model('','','',$campus);

$comp = $edificio->Comprobar_CAMPUSEDIFICIO();
    //comp
    if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }///fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Campus edificio';
	$EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$EDIFICIO_array_test1['error_esperado'] = '00002';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $campus = 'aaaaaaaaaaa98998TRGTGBHTFBHHTBYBYTYTBTBHYYTBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $edificio = new EDIFICIO_Model('','','',$campus);
    
    $comp = $edificio->Comprobar_CAMPUSEDIFICIO();
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

      

         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Campus edificio';
	$EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos';
	$EDIFICIO_array_test1['error_esperado'] = '00030';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $campus = '//';
    $edificio = new EDIFICIO_Model('','','',$campus);
    
    $comp = $edificio->Comprobar_CAMPUSEDIFICIO();
    //comp
    
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{///else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Campus edificio';
$EDIFICIO_array_test1['error'] = 'Campus edificio correcto';
$EDIFICIO_array_test1['error_esperado'] = true;
$EDIFICIO_array_test1['error_obtenido']='';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
$campus = 'Cccc';
$edificio = new EDIFICIO_Model('','','',$campus);
$comp = $edificio->Comprobar_CAMPUSEDIFICIO();
    //comp
    if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}//fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr((string)$EDIFICIO_array_test1['error_obtenido'],(string)$EDIFICIO_array_test1['error_esperado']))>0){
    //comp

    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);
}//fin

/***************************************************************************************************************** */
//edificiio comprobar atributos_test: test atributosd
function Edificio_Comprobar_Atributos_test(){
   
   ///def
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test = array();
    $EDIFICIO_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['atributo'] = 'Edificio';
	$EDIFICIO_array_test1['error'] = 'Edificio incorrecto';
	$EDIFICIO_array_test1['error_esperado'] = '00001';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio='';
    $nombre = '';
    $campus='frff';
    $direccion='rgrtggrg';
    $edificio = new EDIFICIO_Model($codEdificio,$nombre,$direccion,$campus);
    
    $comp = $edificio->Comprobar_atributos();
    //comp
    if(is_array($comp)){
    $EDIFICIO_array_test = $comp;
    foreach($EDIFICIO_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $EDIFICIO_array_test1['error_obtenido']=$codigos;
    }else{//else
        $EDIFICIO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
    
    if (strlen(strstr($EDIFICIO_array_test1['error_obtenido'],$EDIFICIO_array_test1['error_esperado']))>0){
    //comp
    if($EDIFICIO_array_test1['error_obtenido']===true){
        
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }else{//else
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//else
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
$EDIFICIO_array_test1['atributo'] = 'Edificio';
$EDIFICIO_array_test1['error'] = 'Edificio correcto';
$EDIFICIO_array_test1['error_esperado'] = true;
$EDIFICIO_array_test1['error_obtenido']='';
$EDIFICIO_array_test1['resultado'] = '';
$codigos='';
    $codEdificio='uyhuyh';
    $nombre = 'hiuhui';
    $campus='frff';
    $direccion='rgrtggrg';
    $edificio = new EDIFICIO_Model($codEdificio,$nombre,$direccion,$campus);
$comp = $edificio->Comprobar_atributos();
    //comp
    if(is_array($comp)){
$EDIFICIO_array_test = $comp;
foreach($EDIFICIO_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}///fin
$EDIFICIO_array_test1['error_obtenido']=$codigos;
}else{//else
    $EDIFICIO_array_test1['error_obtenido']=$comp;
}//fin
    //comp

if (strlen(strstr((string)$EDIFICIO_array_test1['error_obtenido'],(string)$EDIFICIO_array_test1['error_esperado']))>0){
    //comp

    if($EDIFICIO_array_test1['error_obtenido']===true){
    
    $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{//test
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//else
    $EDIFICIO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $EDIFICIO_array_test1);
}//fin

Edificio_comprobarCodEdificio_test();
Edificio_comprobarNombreEdificio_test();
Edificio_comprobarDireccionEdificio_test();
Edificio_comprobarCampusEdificio_test();
Edificio_Comprobar_Atributos_test();


?>