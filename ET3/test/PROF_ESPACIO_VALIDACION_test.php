<?php
/*
    Archivo test
    Nombre: PROF_ESPACIOESPACIO_VALIDACION_test.php
    Autor:  Noa López Marchante
    Fecha de creación: 13/12/2019 
    Función: test funciones de validación usuario
*/

function PROF_ESPACIO_comprobarDNI_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test = array();
    $PROF_ESPACIO_array_test1 = array();
   
// Comprobar el DNI vacio
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Atributo vacío';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00001';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '';
    $prof_espacio = new PROF_ESPACIO_Model($DNI,'');
    
    $comp = $prof_espacio->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


   // Comprobar el DNI ndemasiado corto
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00003';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '';
    $prof_espacio = new PROF_ESPACIO_Model($DNI,'');
    
    $comp = $prof_espacio->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);



       // Comprobar el DNI demasiado largo
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00002';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $DNI = 'aaaaaaaaaaaaaaaaa';
    $prof_espacio = new PROF_ESPACIO_Model($DNI,'');
    
    $comp = $prof_espacio->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


         // Comprobar el DNI formato
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
	$PROF_ESPACIO_array_test1['error'] = 'Formato dni erróneo';
	$PROF_ESPACIO_array_test1['error_esperado'] = '00010';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '41371';
    $prof_espacio = new PROF_ESPACIO_Model($DNI,'');
    
    $comp = $prof_espacio->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);



    //-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'DNI';
    $PROF_ESPACIO_array_test1['error'] = 'Dni no válido';
    $PROF_ESPACIO_array_test1['error_esperado'] = '00011';
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $DNI = '44498799Y';
    $prof_espacio = new PROF_ESPACIO_Model($DNI,'');
    
    $comp = $prof_espacio->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
// Comprobar el DNI correcto
//-------------------------------------------------------------------------------
$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
$PROF_ESPACIO_array_test1['atributo'] = 'DNI';
$PROF_ESPACIO_array_test1['error'] = 'DNI correcto';
$PROF_ESPACIO_array_test1['error_esperado'] = true;
$PROF_ESPACIO_array_test1['error_obtenido'] = '';
$PROF_ESPACIO_array_test1['resultado'] = '';
$codigos='';
$DNI = '41371781W';
$prof_espacio = new PROF_ESPACIO_Model($DNI,'');
 $comp = $prof_espacio->Comprobar_DNI();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROF_ESPACIO_array_test1['error_obtenido'],(string)$PROF_ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

}

function PROF_ESPACIO_Comprobar_CODESPACIO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROF_ESPACIO_array_test = array();
    $PROF_ESPACIO_array_test1 = array();
   
// Comprobar el codEspacio vacio
//-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'codEspacio';
    $PROF_ESPACIO_array_test1['error'] = 'Atributo vacío';
    $PROF_ESPACIO_array_test1['error_esperado'] = '00001';
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = '';
    $prof_espacio=new PROF_ESPACIO_Model('',$codEspacio);
    
    $comp = $prof_espacio->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


   // Comprobar el codEspacio ndemasiado corto
//-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'codEspacio';
    $PROF_ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_ESPACIO_array_test1['error_esperado'] = '00003';
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = 'a';
    $prof_espacio=new PROF_ESPACIO_Model('',$codEspacio);
    
    $comp = $prof_espacio->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);



       // Comprobar el codEspacio demasiado largo
//-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'codEspacio';
    $PROF_ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_ESPACIO_array_test1['error_esperado'] = '00002';
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
    $prof_espacio=new PROF_ESPACIO_Model('',$codEspacio);
    
    $comp = $prof_espacio->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


         // Comprobar el codEspacio formato
//-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'codEspacio';
    $PROF_ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $PROF_ESPACIO_array_test1['error_esperado'] = '00040';
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = '$$$$';
    $prof_espacio=new PROF_ESPACIO_Model('',$codEspacio);
    
    $comp = $prof_espacio->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
// Comprobar el codEspacio correcto
//-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'codEspacio';
    $PROF_ESPACIO_array_test1['error'] = 'Codigo Espacio correcto';
    $PROF_ESPACIO_array_test1['error_esperado'] = true;
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = '123OU-';
    $prof_espacio=new PROF_ESPACIO_Model('',$codEspacio);
     $comp = $prof_espacio->Comprobar_CODESPACIO();
        if(is_array($comp)){//si devuelve errores el método
        $PROF_ESPACIO_array_test = $comp;
        foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$PROF_ESPACIO_array_test1['error_obtenido'],(string)$PROF_ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

}


function PROF_ESPACIO_Comprobar_Atributos_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $PROF_ESPACIO_array_test = array();
    $PROF_ESPACIO_array_test1 = array();
   
// Comprobar el dos atributos incorrecto
//-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
    $PROF_ESPACIO_array_test1['atributo'] = 'prof_espacio';
    $PROF_ESPACIO_array_test1['error'] = 'Atributo vacío';
    $PROF_ESPACIO_array_test1['error_esperado'] = '00001';
    $PROF_ESPACIO_array_test1['error_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $DNI='';
    $codEspacio='';

    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEspacio);
    
    $comp =$PROF_ESPACIO->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($PROF_ESPACIO_array_test1['error_obtenido'],$PROF_ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);


  
// Comprobar el centro correcto
//-------------------------------------------------------------------------------
$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';  
$PROF_ESPACIO_array_test1['atributo'] = 'prof_espacio';
$PROF_ESPACIO_array_test1['error'] = 'PROF_ESPACIO correcto';
$PROF_ESPACIO_array_test1['error_esperado'] = true;
$PROF_ESPACIO_array_test1['error_obtenido'] = '';
$PROF_ESPACIO_array_test1['resultado'] = '';
    $codigos='';
     
    $DNI='17488791M';
    $codEspacio='12-OU';

    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$codEspacio);
    $comp =$PROF_ESPACIO->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $PROF_ESPACIO_array_test = $comp;
    foreach($PROF_ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $PROF_ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROF_ESPACIO_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$PROF_ESPACIO_array_test1['error_obtenido'],(string)$PROF_ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($PROF_ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $PROF_ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

}

PROF_ESPACIO_comprobarDNI_test();
PROF_ESPACIO_Comprobar_CODESPACIO_test();
PROF_ESPACIO_Comprobar_Atributos_test();

?>