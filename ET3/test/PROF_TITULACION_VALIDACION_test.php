<?php
/*
    Archivo test
    Nombre: ESPACIO_VALIDACION_test.php
    Autor:  Noa López Marchante
    Fecha de creación: 13/12/2019 
    Función: test funciones de validación usuario
*/
function PROF_TITULACION_comprobarDNI_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test = array();
    $PROF_TITULACION_array_test1 = array();
   
// Comprobar el DNI vacio
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
	$PROF_TITULACION_array_test1['error_esperado'] = '00001';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '';
    $prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
    
    $comp = $prof_titulacion->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


   // Comprobar el DNI ndemasiado corto
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROF_TITULACION_array_test1['error_esperado'] = '00003';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '';
    $prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
    
    $comp = $prof_titulacion->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);



       // Comprobar el DNI demasiado largo
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00002';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $DNI = 'aaaaaaaaaaaaaaaaa';
    $prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
    
    $comp = $prof_titulacion->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


         // Comprobar el DNI formato
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['atributo'] = 'DNI';
	$PROF_TITULACION_array_test1['error'] = 'Formato dni erróneo';
	$PROF_TITULACION_array_test1['error_esperado'] = '00010';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '41371';
    $prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
    
    $comp = $prof_titulacion->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

    //DNI válido
    //-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';    
    $PROF_TITULACION_array_test1['atributo'] = 'DNI';
    $PROF_TITULACION_array_test1['error'] = 'Dni no válido';
    $PROF_TITULACION_array_test1['error_esperado'] = '00011';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '44498799Y';
    $prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
    
    $comp = $prof_titulacion->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
// Comprobar el DNI correcto
//-------------------------------------------------------------------------------
$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
$PROF_TITULACION_array_test1['atributo'] = 'DNI';
$PROF_TITULACION_array_test1['error'] = 'DNI correcto';
$PROF_TITULACION_array_test1['error_esperado'] = true;
$PROF_TITULACION_array_test1['error_obtenido'] = '';
$PROF_TITULACION_array_test1['resultado'] = '';
$codigos='';
$DNI = '41371781W';
$prof_titulacion = new PROF_TITULACION_Model($DNI,'','');
 $comp = $prof_titulacion->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROF_TITULACION_array_test1['error_obtenido'],(string)$PROF_TITULACION_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_TITULACION_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

}

function PROF_TITULACION_Comprobar_CODTITULACION_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROF_TITULACION_array_test = array();
    $PROF_TITULACION_array_test1 = array();
   
// Comprobar el codTitulacion vacio
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'codTitulacion';
    $PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
    $PROF_TITULACION_array_test1['error_esperado'] = '00001';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = '';
    $prof_titulacion=new PROF_TITULACION_Model('',$codTitulacion,'');
    
    $comp = $prof_titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


   // Comprobar el codTitulacion ndemasiado corto
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'codTitulacion';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_TITULACION_array_test1['error_esperado'] = '00003';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = 'a';
    $prof_titulacion=new PROF_TITULACION_Model('',$codTitulacion,'');
    
    $comp = $prof_titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);



       // Comprobar el codTitulacion demasiado largo
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'codTitulacion';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_TITULACION_array_test1['error_esperado'] = '00002';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = 'aaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $prof_titulacion=new PROF_TITULACION_Model('',$codTitulacion,'');
    
    $comp = $prof_titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


         // Comprobar el codTitulacion formato
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'codTitulacion';
    $PROF_TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos y números';
    $PROF_TITULACION_array_test1['error_esperado'] = '00060';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = 'OU-112';
    $prof_titulacion=new PROF_TITULACION_Model('',$codTitulacion,'');
    
    $comp = $prof_titulacion->Comprobar_CODTITULACION();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
// Comprobar el codTitulacion correcto
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'codTitulacion';
    $PROF_TITULACION_array_test1['error'] = 'Codigo Titulación correcto';
    $PROF_TITULACION_array_test1['error_esperado'] = true;
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $codTitulacion = 'OU112';
    $prof_titulacion=new PROF_TITULACION_Model('',$codTitulacion,'');
     $comp = $prof_titulacion->Comprobar_CODTITULACION();
        if(is_array($comp)){//si devuelve errores el método
        $PROF_TITULACION_array_test = $comp;
        foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $PROF_TITULACION_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$PROF_TITULACION_array_test1['error_obtenido'],(string)$PROF_TITULACION_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_TITULACION_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

}

function PROF_TITULACION_Comprobar_ANHOACADEMICO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROF_TITULACION_array_test = array();
    $PROF_TITULACION_array_test1 = array();
   
// Comprobar el anhoAcademico vacio
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'anhoAcademico';
    $PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
    $PROF_TITULACION_array_test1['error_esperado'] = '00001';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $anhoAcademico = '';
    $prof_titulacion=new PROF_TITULACION_Model('','',$anhoAcademico);
    
    $comp = $prof_titulacion->Comprobar_ANHOACADEMICO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


   // Comprobar el anhoAcademico ndemasiado corto
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'anhoAcademico';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_TITULACION_array_test1['error_esperado'] = '00003';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $anhoAcademico = 'a';
    $prof_titulacion=new PROF_TITULACION_Model('','',$anhoAcademico);
    
    $comp = $prof_titulacion->Comprobar_ANHOACADEMICO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);



       // Comprobar el anhoAcademico demasiado largo
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'anhoAcademico';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_TITULACION_array_test1['error_esperado'] = '00002';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $anhoAcademico = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
    $prof_titulacion=new PROF_TITULACION_Model('','',$anhoAcademico);
    
    $comp = $prof_titulacion->Comprobar_ANHOACADEMICO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


 // Comprobar el anhoAcademico formato
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'anhoAcademico';
    $PROF_TITULACION_array_test1['error'] = 'Solo se permiten dddd-dddd';
    $PROF_TITULACION_array_test1['error_esperado'] = '00110';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $anhoAcademico = '$$$$';
    $prof_titulacion=new PROF_TITULACION_Model('','',$anhoAcademico);
    
    $comp = $prof_titulacion->Comprobar_ANHOACADEMICO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
// Comprobar el anhoAcademico correcto
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'anhoAcademico';
    $PROF_TITULACION_array_test1['error'] = 'Anho Academico correcto';
    $PROF_TITULACION_array_test1['error_esperado'] = true;
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $anhoAcademico = '2010-2011';
    $prof_titulacion=new PROF_TITULACION_Model('','',$anhoAcademico);
     $comp = $prof_titulacion->Comprobar_ANHOACADEMICO();
        if(is_array($comp)){//si devuelve errores el método
        $PROF_TITULACION_array_test = $comp;
        foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $PROF_TITULACION_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$PROF_TITULACION_array_test1['error_obtenido'],(string)$PROF_TITULACION_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_TITULACION_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

}





function PROF_TITULACION_Comprobar_Atributos_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROF_TITULACION_array_test = array();
    $PROF_TITULACION_array_test1 = array();
   
// Comprobar el dos atributos incorrecto
//-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
    $PROF_TITULACION_array_test1['atributo'] = 'prof_titulacion';
    $PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
    $PROF_TITULACION_array_test1['error_esperado'] = '00001';
    $PROF_TITULACION_array_test1['error_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
    $DNI='';
    $anho='2010-2011';
    $codTitulacion='';

    $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTitulacion,$anho);
    
    $comp =$PROF_TITULACION->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_TITULACION_array_test1['error_obtenido'],$PROF_TITULACION_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_TITULACION_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);


  
// Comprobar el centro correcto
//-------------------------------------------------------------------------------
$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';  
$PROF_TITULACION_array_test1['atributo'] = 'prof_titulacion';
$PROF_TITULACION_array_test1['error'] = 'PROF_TITULACION correcto';
$PROF_TITULACION_array_test1['error_esperado'] = true;
$PROF_TITULACION_array_test1['error_obtenido'] = '';
$PROF_TITULACION_array_test1['resultado'] = '';
    $codigos='';
     
    $DNI='17488791M';
    $codTitulacion='12OU';
    $anho='2010-2011';

    $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$codTitulacion,$anho);
    $comp =$PROF_TITULACION->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_TITULACION_array_test = $comp;
    foreach($PROF_TITULACION_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_TITULACION_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_TITULACION_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROF_TITULACION_array_test1['error_obtenido'],(string)$PROF_TITULACION_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_TITULACION_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

}


PROF_TITULACION_comprobarDNI_test();
PROF_TITULACION_Comprobar_CODTITULACION_test();
PROF_TITULACION_Comprobar_Atributos_test();






































?>