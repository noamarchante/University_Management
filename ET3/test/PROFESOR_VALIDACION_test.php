<?php
/*
	Archivo test
	Nombre: PROFESOR_VALIDACION_test.php
	Autor: 	Noa López Marchante
	Fecha de creación: 13/12/2019 
	Función: test funciones de validación profesor
*/
function PROFESOR_comprobarDNI_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test = array();
    $PROFESOR_array_test1 = array();
   
// Comprobar el DNI vacio
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Atributo vacío';
	$PROFESOR_array_test1['error_esperado'] = '00001';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '';
    $profesor = new PROFESOR_Model($DNI,'','','','');
    
    $comp = $profesor->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


   // Comprobar el DNI ndemasiado corto
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROFESOR_array_test1['error_esperado'] = '00003';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '';
    $profesor = new PROFESOR_Model($DNI,'','','','');
    
    $comp = $profesor->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROFESOR_array_test1);



       // Comprobar el DNI demasiado largo
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROFESOR_array_test1['error_esperado'] = '00002';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI = 'aaaaaaaaaaaaaaaaa';
    $profesor = new PROFESOR_Model($DNI,'','','','');
    
    $comp = $profesor->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROFESOR_array_test1);


         // Comprobar el DNI formato
//-------------------------------------------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['atributo'] = 'DNI';
	$PROFESOR_array_test1['error'] = 'Formato dni erróneo';
	$PROFESOR_array_test1['error_esperado'] = '00010';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '41371';
    $profesor = new PROFESOR_Model($DNI,'','','','');
    
    $comp = $profesor->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);
    

            // Comprobar el DNI formato
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'DNI';
    $PROFESOR_array_test1['error'] = 'Dni no válido';
    $PROFESOR_array_test1['error_esperado'] = '00011';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '41371781J';
    $profesor = new PROFESOR_Model($DNI,'','','','');
    
    $comp = $profesor->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
// Comprobar el DNI correcto
//-------------------------------------------------------------------------------
$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
$PROFESOR_array_test1['atributo'] = 'DNI';
$PROFESOR_array_test1['error'] = 'DNI correcto';
$PROFESOR_array_test1['error_esperado'] = true;
$PROFESOR_array_test1['error_obtenido'] = '';
$PROFESOR_array_test1['resultado'] = '';
$codigos='';
$DNI = '41371781W';
$profesor = new PROFESOR_Model($DNI,'','','','');
 $comp = $profesor->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROFESOR_array_test1['error_obtenido'],(string)$PROFESOR_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROFESOR_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROFESOR_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROFESOR_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROFESOR_array_test1);

}


function PROFESOR_Comprobar_NOMBREPROFESOR_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROFESOR_array_test = array();
    $PROFESOR_array_test1 = array();
   
// Comprobar el nombre vacio
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'nombre';
    $PROFESOR_array_test1['error'] = 'Atributo vacío';
    $PROFESOR_array_test1['error_esperado'] = '00001';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $nombre = '';
    $profesor = new PROFESOR_Model('',$nombre,'','','');
    
    $comp = $profesor->Comprobar_NOMBREPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


   // Comprobar el nombre ndemasiado corto
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'nombre';
    $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROFESOR_array_test1['error_esperado'] = '00003';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $nombre = 'a';
    $profesor = new PROFESOR_Model('',$nombre,'','','');
    
    $comp = $profesor->Comprobar_NOMBREPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);



       // Comprobar el nombre demasiado largo
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'nombre';
    $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROFESOR_array_test1['error_esperado'] = '00002';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $nombre = 'aaaaaaaaaaaaaaaaa';
    $profesor = new PROFESOR_Model('',$nombre,'','','');
    
    $comp = $profesor->Comprobar_NOMBREPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


         // Comprobar el nombre formato
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'nombre';
    $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $PROFESOR_array_test1['error_esperado'] = '00030';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $nombre = '$$$$';
    $profesor = new PROFESOR_Model('',$nombre,'','','');
    
    $comp = $profesor->Comprobar_NOMBREPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
// Comprobar el nombre correcto
//-------------------------------------------------------------------------------
$PROFESOR_array_test1['entidad'] = 'PROFESOR';  
$PROFESOR_array_test1['atributo'] = 'nombre';
$PROFESOR_array_test1['error'] = 'Nombre correcto';
$PROFESOR_array_test1['error_esperado'] = true;
$PROFESOR_array_test1['error_obtenido'] = '';
$PROFESOR_array_test1['resultado'] = '';
$codigos='';
$nombre = 'Alfonso';
$profesor = new PROFESOR_Model('',$nombre,'','','');
 $comp = $profesor->Comprobar_NOMBREPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROFESOR_array_test1['error_obtenido'],(string)$PROFESOR_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROFESOR_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROFESOR_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROFESOR_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROFESOR_array_test1);

}



function PROFESOR_Comprobar_APELLIDOSPROFESOR_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROFESOR_array_test = array();
    $PROFESOR_array_test1 = array();
   
// Comprobar el apellidos vacio
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'apellidos';
    $PROFESOR_array_test1['error'] = 'Atributo vacío';
    $PROFESOR_array_test1['error_esperado'] = '00001';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $apellidos = '';
    $profesor = new PROFESOR_Model('','',$apellidos,'','');
    
    $comp = $profesor->Comprobar_APELLIDOSPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


   // Comprobar el apellidos ndemasiado corto
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'apellidos';
    $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROFESOR_array_test1['error_esperado'] = '00003';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $apellidos = 'a';
    $profesor = new PROFESOR_Model('','',$apellidos,'','');
    
    $comp = $profesor->Comprobar_APELLIDOSPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);



       // Comprobar el apellidos demasiado largo
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'apellidos';
    $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROFESOR_array_test1['error_esperado'] = '00002';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $apellidos = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $profesor = new PROFESOR_Model('','',$apellidos,'','');
    
    $comp = $profesor->Comprobar_APELLIDOSPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


         // Comprobar el apellidos formato
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'apellidos';
    $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $PROFESOR_array_test1['error_esperado'] = '00030';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $apellidos = '$$$$';
    $profesor = new PROFESOR_Model('','',$apellidos,'','');
    
    $comp = $profesor->Comprobar_APELLIDOSPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
// Comprobar el apellidos correcto
//-------------------------------------------------------------------------------
$PROFESOR_array_test1['entidad'] = 'PROFESOR';  
$PROFESOR_array_test1['atributo'] = 'apellidos';
$PROFESOR_array_test1['error'] = 'Apellidos correctos';
$PROFESOR_array_test1['error_esperado'] = true;
$PROFESOR_array_test1['error_obtenido'] = '';
$PROFESOR_array_test1['resultado'] = '';
$codigos='';
$apellidos = 'Alfonso';
$profesor = new PROFESOR_Model('','',$apellidos,'','');
 $comp = $profesor->Comprobar_APELLIDOSPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROFESOR_array_test1['error_obtenido'],(string)$PROFESOR_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROFESOR_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROFESOR_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROFESOR_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROFESOR_array_test1);

}


function PROFESOR_Comprobar_AREAPROFESOR_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROFESOR_array_test = array();
    $PROFESOR_array_test1 = array();
   
// Comprobar el areavacio
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'area';
    $PROFESOR_array_test1['error'] = 'Atributo vacío';
    $PROFESOR_array_test1['error_esperado'] = '00001';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $area= '';
    $profesor = new PROFESOR_Model('','','',$area,'');
    
    $comp =$profesor->Comprobar_AREAPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


   // Comprobar el areandemasiado corto
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'area';
    $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROFESOR_array_test1['error_esperado'] = '00003';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $area= 'a';
    $profesor = new PROFESOR_Model('','','',$area,'');
    
    $comp =$profesor->Comprobar_AREAPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);



       // Comprobar el areademasiado largo
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'area';
    $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROFESOR_array_test1['error_esperado'] = '00002';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $area= 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $profesor = new PROFESOR_Model('','','',$area,'');
    
    $comp =$profesor->Comprobar_AREAPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


         // Comprobar el areaformato
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'area';
    $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $PROFESOR_array_test1['error_esperado'] = '00030';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $area= '$$$$';
    $profesor = new PROFESOR_Model('','','',$area,'');
    
    $comp =$profesor->Comprobar_AREAPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
// Comprobar el areacorrecto
//-------------------------------------------------------------------------------
$PROFESOR_array_test1['entidad'] = 'PROFESOR';  
$PROFESOR_array_test1['atributo'] = 'area';
$PROFESOR_array_test1['error'] = 'Area profesor correctos';
$PROFESOR_array_test1['error_esperado'] = true;
$PROFESOR_array_test1['error_obtenido'] = '';
$PROFESOR_array_test1['resultado'] = '';
$codigos='';
$area= 'Alfonso';
$profesor = new PROFESOR_Model('','','',$area,'');
 $comp =$profesor->Comprobar_AREAPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROFESOR_array_test1['error_obtenido'],(string)$PROFESOR_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROFESOR_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROFESOR_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROFESOR_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROFESOR_array_test1);

}


function PROFESOR_Comprobar_DEPARTAMENTOPROFESOR_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROFESOR_array_test = array();
    $PROFESOR_array_test1 = array();
   
// Comprobar el departamentovacio
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'departamento';
    $PROFESOR_array_test1['error'] = 'Atributo vacío';
    $PROFESOR_array_test1['error_esperado'] = '00001';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $departamento= '';
    $profesor = new PROFESOR_Model('','','','',$departamento);
    
    $comp =$profesor->Comprobar_DEPARTAMENTOPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


   // Comprobar el departamentondemasiado corto
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'departamento';
    $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROFESOR_array_test1['error_esperado'] = '00003';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $departamento= 'a';
    $profesor = new PROFESOR_Model('','','','',$departamento);
    
    $comp =$profesor->Comprobar_DEPARTAMENTOPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);



       // Comprobar el departamentodemasiado largo
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'departamento';
    $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROFESOR_array_test1['error_esperado'] = '00002';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $departamento= 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $profesor = new PROFESOR_Model('','','','',$departamento);
    
    $comp =$profesor->Comprobar_DEPARTAMENTOPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


         // Comprobar el departamentoformato
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'departamento';
    $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $PROFESOR_array_test1['error_esperado'] = '00030';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $departamento= '$$$$';
    $profesor = new PROFESOR_Model('','','','',$departamento);
    
    $comp =$profesor->Comprobar_DEPARTAMENTOPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
// Comprobar el departamentocorrecto
//-------------------------------------------------------------------------------
$PROFESOR_array_test1['entidad'] = 'PROFESOR';  
$PROFESOR_array_test1['atributo'] = 'departamento';
$PROFESOR_array_test1['error'] = 'Departamento profesor correcto';
$PROFESOR_array_test1['error_esperado'] = true;
$PROFESOR_array_test1['error_obtenido'] = '';
$PROFESOR_array_test1['resultado'] = '';
$codigos='';
$departamento= 'matemáticas';
$profesor = new PROFESOR_Model('','','','',$departamento);
 $comp =$profesor->Comprobar_DEPARTAMENTOPROFESOR();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROFESOR_array_test1['error_obtenido'],(string)$PROFESOR_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROFESOR_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROFESOR_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROFESOR_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROFESOR_array_test1);

}


function PROFESOR_Comprobar_Atributos_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROFESOR_array_test = array();
    $PROFESOR_array_test1 = array();
   
// Comprobar el dos atributos incorrecto
//-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';  
    $PROFESOR_array_test1['atributo'] = 'profesor';
    $PROFESOR_array_test1['error'] = 'Atributo vacío';
    $PROFESOR_array_test1['error_esperado'] = '00001';
    $PROFESOR_array_test1['error_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI='17488791M';
    $nombre='Alfonso';
    $apellidos='';
    $area='';
    $departamento= 'matemáticas';
    $PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
    
    $comp =$PROFESOR->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROFESOR_array_test1['error_obtenido'],$PROFESOR_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROFESOR_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROFESOR_array_test1);


  
// Comprobar el profesorcorrecto
//-------------------------------------------------------------------------------
$PROFESOR_array_test1['entidad'] = 'PROFESOR';  
$PROFESOR_array_test1['atributo'] = 'profesor';
$PROFESOR_array_test1['error'] = 'Profesor correcto';
$PROFESOR_array_test1['error_esperado'] = true;
$PROFESOR_array_test1['error_obtenido'] = '';
$PROFESOR_array_test1['resultado'] = '';
    $codigos='';
    $DNI='17488791M';
    $nombre='Alfonso';
    $apellidos='Iglesias';
    $area='Finanzas';
    $departamento= 'matematicas';
    $PROFESOR = new PROFESOR_Model($DNI,$nombre,$apellidos,$area,$departamento);
    $comp =$PROFESOR->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $PROFESOR_array_test = $comp;
    foreach($PROFESOR_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROFESOR_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROFESOR_array_test1['error_obtenido'],(string)$PROFESOR_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROFESOR_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROFESOR_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROFESOR_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROFESOR_array_test1);

}



   PROFESOR_comprobarDNI_test();
   PROFESOR_Comprobar_NOMBREPROFESOR_test();
   PROFESOR_Comprobar_APELLIDOSPROFESOR_test();
   PROFESOR_Comprobar_AREAPROFESOR_test();
   PROFESOR_Comprobar_DEPARTAMENTOPROFESOR_test();
   PROFESOR_Comprobar_Atributos_test();

?>