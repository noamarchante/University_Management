<?php


/*Archivo php
Nombre: CENTRO_VALIDACION_test.php
Autor: 	Noa López Marchante
Fecha de creación: 14/12/2019 
Función: Testea validaciones centro
	*/

    //CENTRO_Comprobar_CODCENTRO_test(): comprobar validacion centro
function CENTRO_Comprobar_CODCENTRO_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $CENTRO_array_test = array();
    $CENTRO_array_test1 = array();
   
// Comprobar el codcentro vacio
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codcentro';
    $CENTRO_array_test1['error'] = 'Atributo vacío';
    $CENTRO_array_test1['error_esperado'] = '00001';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codcentro = '';
    $centro = new CENTRO_Model($codcentro,'','','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


   // Comprobar el codcentro ndemasiado corto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codcentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['error_esperado'] = '00003';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codcentro = 'a';
    $centro = new CENTRO_Model($codcentro,'','','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp   
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);



       // Comprobar el codcentro demasiado largo
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codcentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['error_esperado'] = '00002';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codcentro = 'aaaaaaaaaaaaaaaaa';
    $centro = new CENTRO_Model($codcentro,'','','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
   //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp   
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


         // Comprobar el codcentro formato
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codcentro';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $CENTRO_array_test1['error_esperado'] = '00040';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codcentro = '$$$$';
    $centro = new CENTRO_Model($codcentro,'','','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
   //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);
    
// Comprobar el codcentro correcto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codcentro';
    $CENTRO_array_test1['error'] = 'Codigo Centro correcto';
    $CENTRO_array_test1['error_esperado'] = true;
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codcentro = '123OU';
    $centro = new CENTRO_Model($codcentro,'','','','');
     $comp = $centro->Comprobar_CODCENTRO();
     //comp  
     if(is_array($comp)){//si devuelve errores el método
        $CENTRO_array_test = $comp;
        foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }//fin
        $CENTRO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $CENTRO_array_test1['error_obtenido']=$comp;
        }//fin
    
//comp
if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])>=0){//si el error esperador está en el obtenido
//comp
    if($CENTRO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $CENTRO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//si no está está mal
    $CENTRO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $CENTRO_array_test1);

}///fin

//CENTRO_Comprobar_CODEDIFICIO_test(): test codeficio
function CENTRO_Comprobar_CODEDIFICIO_test(){
   //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $CENTRO_array_test = array();
    $CENTRO_array_test1 = array();
   
// Comprobar el codedificio vacio
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codedificio';
    $CENTRO_array_test1['error'] = 'Atributo vacío';
    $CENTRO_array_test1['error_esperado'] = '00001';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codedificio = '';
    $centro = new CENTRO_Model('',$codedificio,'','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
   //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


   // Comprobar el codedificio ndemasiado corto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codedificio';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['error_esperado'] = '00003';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codedificio = 'a';
    $centro = new CENTRO_Model('',$codedificio,'','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
   //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);



       // Comprobar el codedificio demasiado largo
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codedificio';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['error_esperado'] = '00002';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codedificio = 'aaaaaaaaaaaaaaaaa';
    $centro = new CENTRO_Model('',$codedificio,'','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
   //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp   
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


         // Comprobar el codedificio formato
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codedificio';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $CENTRO_array_test1['error_esperado'] = '00040';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codedificio = '$$$$';
    $centro = new CENTRO_Model('',$codedificio,'','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin

    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);
    
// Comprobar el codedificio correcto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'codedificio';
    $CENTRO_array_test1['error'] = 'Codigo Edificio correcto';
    $CENTRO_array_test1['error_esperado'] = true;
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codedificio = '123OU';
    $centro = new CENTRO_Model('',$codedificio,'','','');
     $comp = $centro->Comprobar_CODEDIFICIO();
     //comp   
     if(is_array($comp)){//si devuelve errores el método
        $CENTRO_array_test = $comp;
        foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }//fin
        $CENTRO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $CENTRO_array_test1['error_obtenido']=$comp;
        }//fin
    
//comp
if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])>=0){//si el error esperador está en el obtenido
//comp
    if($CENTRO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $CENTRO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//si no está está mal
    $CENTRO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $CENTRO_array_test1);

}//fin

//CENTRO_Comprobar_NOMBRECENTRO_test(): test nombrecentro
function CENTRO_Comprobar_NOMBRECENTRO_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $CENTRO_array_test = array();
    $CENTRO_array_test1 = array();
   
// Comprobar el nombreCentro vacio
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'nombreCentro';
    $CENTRO_array_test1['error'] = 'Atributo vacío';
    $CENTRO_array_test1['error_esperado'] = '00001';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $nombreCentro = '';
    $centro = new CENTRO_Model('','',$nombreCentro,'','');
    
    $comp = $centro->Comprobar_NOMBRECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


   // Comprobar el nombreCentro ndemasiado corto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'nombreCentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['error_esperado'] = '00003';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $nombreCentro = 'a';
    $centro = new CENTRO_Model('','',$nombreCentro,'','');
    
    $comp = $centro->Comprobar_NOMBRECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);



       // Comprobar el nombreCentro demasiado largo
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'nombreCentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['error_esperado'] = '00002';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $nombreCentro = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $centro = new CENTRO_Model('','',$nombreCentro,'','');
    
    $comp = $centro->Comprobar_NOMBRECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }///fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


         // Comprobar el nombreCentro formato
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'nombreCentro';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $CENTRO_array_test1['error_esperado'] = '00030';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $nombreCentro = '$$$$';
    $centro = new CENTRO_Model('','',$nombreCentro,'','');
    
    $comp = $centro->Comprobar_NOMBRECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);
    
// Comprobar el nombreCentro correcto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'nombreCentro';
    $CENTRO_array_test1['error'] = 'Nombre Centro correcto';
    $CENTRO_array_test1['error_esperado'] = true;
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $nombreCentro = 'Hierro';
    $centro = new CENTRO_Model('','',$nombreCentro,'','');
     $comp = $centro->Comprobar_NOMBRECENTRO();
     //comp   
     if(is_array($comp)){//si devuelve errores el método
        $CENTRO_array_test = $comp;
        foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }//fin
        $CENTRO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $CENTRO_array_test1['error_obtenido']=$comp;
        }///fin
    
//comp
if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])>=0){//si el error esperador está en el obtenido
//comp
    if($CENTRO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $CENTRO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//si no está está mal
    $CENTRO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $CENTRO_array_test1);

}//fin

//CENTRO_Comprobar_DIRECCIONCENTRO_test(): dire test
function CENTRO_Comprobar_DIRECCIONCENTRO_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $CENTRO_array_test = array();
    $CENTRO_array_test1 = array();
   
// Comprobar el dirCentro vacio
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'dirCentro';
    $CENTRO_array_test1['error'] = 'Atributo vacío';
    $CENTRO_array_test1['error_esperado'] = '00001';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $dirCentro = '';
    $direccion = new CENTRO_Model('','','',$dirCentro,'');
    
    $comp = $direccion->Comprobar_DIRECCIONCENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


   // Comprobar el dirCentro ndemasiado corto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'dirCentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['error_esperado'] = '00003';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $dirCentro = 'a';
    $direccion = new CENTRO_Model('','','',$dirCentro,'');
    
    $comp = $direccion->Comprobar_DIRECCIONCENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);



       // Comprobar el dirCentro demasiado largo
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'dirCentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['error_esperado'] = '00002';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $dirCentro = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $direccion = new CENTRO_Model('','','',$dirCentro,'');
    
    $comp = $direccion->Comprobar_DIRECCIONCENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


         // Comprobar el dirCentro formato
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'dirCentro';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos y espacios, números y los símbolos  “- / º ª”';
    $CENTRO_array_test1['error_esperado'] = '00050';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $dirCentro = '$$$$';
    $direccion = new CENTRO_Model('','','',$dirCentro,'');
    
    $comp = $direccion->Comprobar_DIRECCIONCENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }///fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);
    
// Comprobar el dirCentro correcto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'dirCentro';
    $CENTRO_array_test1['error'] = 'Direccion correcto';
    $CENTRO_array_test1['error_esperado'] = true;
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $dirCentro = 'Hierro nº 23//';
    $direccion = new CENTRO_Model('','','',$dirCentro,'');
     $comp = $direccion->Comprobar_DIRECCIONCENTRO();
     //comp   
     if(is_array($comp)){//si devuelve errores el método
        $CENTRO_array_test = $comp;
        foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }//fin
        $CENTRO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $CENTRO_array_test1['error_obtenido']=$comp;
        }//fin
    
//comp
if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])>=0){//si el error esperador está en el obtenido
//comp
    if($CENTRO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $CENTRO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//si no está está mal
    $CENTRO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $CENTRO_array_test1);

}//fin

//CENTRO_Comprobar_RESPONSABLECENTRO_test(): responsable test
function CENTRO_Comprobar_RESPONSABLECENTRO_test(){
   //comp
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $CENTRO_array_test = array();
    $CENTRO_array_test1 = array();
   
// Comprobar el responsableCentro vacio
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'responsableCentro';
    $CENTRO_array_test1['error'] = 'Atributo vacío';
    $CENTRO_array_test1['error_esperado'] = '00001';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $responsableCentro = '';
    $responsable = new CENTRO_Model('','','','',$responsableCentro);
    
    $comp = $responsable->Comprobar_RESPONSABLECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


   // Comprobar el responsableCentro ndemasiado corto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'responsableCentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['error_esperado'] = '00003';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $responsableCentro = 'a';
    $responsable = new CENTRO_Model('','','','',$responsableCentro);
    
    $comp = $responsable->Comprobar_RESPONSABLECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);



       // Comprobar el responsableCentro demasiado largo
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'responsableCentro';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['error_esperado'] = '00002';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $responsableCentro = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $responsable = new CENTRO_Model('','','','',$responsableCentro);
    
    $comp = $responsable->Comprobar_RESPONSABLECENTRO();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


         // Comprobar el responsableCentro formato
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'responsableCentro';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $CENTRO_array_test1['error_esperado'] = '00030';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $responsableCentro = '$$$$';
    $responsable = new CENTRO_Model('','','','',$responsableCentro);
    
    $comp = $responsable->Comprobar_RESPONSABLECENTRO();
    
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }///fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }///fin
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }///fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);
    
// Comprobar el responsableCentro correcto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'responsableCentro';
    $CENTRO_array_test1['error'] = 'Responsable Centro correcto';
    $CENTRO_array_test1['error_esperado'] = true;
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $responsableCentro = 'Hierro';
    $responsable = new CENTRO_Model('','','','',$responsableCentro);
     $comp = $responsable->Comprobar_RESPONSABLECENTRO();
     //comp   
     if(is_array($comp)){//si devuelve errores el método
        $CENTRO_array_test = $comp;
        foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }//fin
        $CENTRO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $CENTRO_array_test1['error_obtenido']=$comp;
        }//fin
    
//comp
if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])>=0){//si el error esperador está en el obtenido
//comp
    if($CENTRO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $CENTRO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin
}else{//si no está está mal
    $CENTRO_array_test1['resultado'] = 'FALSE';
}//fin

array_push($ERRORS_array_test, $CENTRO_array_test1);

}//fin
//CENTRO_Comprobar_Atributos_test(): comp atributos
function CENTRO_Comprobar_Atributos_test(){
    //def
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $CENTRO_array_test = array();
    $CENTRO_array_test1 = array();
   
// Comprobar el dos atributos incorrecto
//-------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';  
    $CENTRO_array_test1['atributo'] = 'centro';
    $CENTRO_array_test1['error'] = 'Atributo vacío';
    $CENTRO_array_test1['error_esperado'] = '00001';
    $CENTRO_array_test1['error_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro='17488791M';
    $codEdificio='Alfonso';
    $nombre='';
    $direccion='';
    $responsable= 'matemáticas';
    $CENTRO = new CENTRO_Model($codCentro,$codEdificio,$nombre,$direccion,$responsable);
    
    $comp =$CENTRO->Comprobar_atributos();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//fin
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//def
    //comp
   if(strlen(strstr($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado']))>0){//si los errores está presentes
    //comp    
    if($CENTRO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $CENTRO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $CENTRO_array_test1['resultado'] = 'OK';
        }//fin
    }else{//si no está el error presente en los errores
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//fin

    array_push($ERRORS_array_test, $CENTRO_array_test1);


  
// Comprobar el centro correcto
//-------------------------------------------------------------------------------
$CENTRO_array_test1['entidad'] = 'CENTRO';  
$CENTRO_array_test1['atributo'] = 'centro';
$CENTRO_array_test1['error'] = 'Centro correcto';
$CENTRO_array_test1['error_esperado'] = true;
$CENTRO_array_test1['error_obtenido'] = '';
$CENTRO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro='17488791M';
    $codEdificio='Alfonso';
    $nombre='hierro';
    $direccion='Ourense nº 23//';
    $responsable= 'matemáticas';
    $CENTRO = new CENTRO_Model($codCentro,$codEdificio,$nombre,$direccion,$responsable);
    $comp =$CENTRO->Comprobar_atributos();
    //comp
    if(is_array($comp)){//si devuelve errores el método
    $CENTRO_array_test = $comp;
    foreach($CENTRO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }//def
    $CENTRO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $CENTRO_array_test1['error_obtenido']=$comp;
    }//def
    
//comp
if (strpos($CENTRO_array_test1['error_obtenido'],$CENTRO_array_test1['error_esperado'])>=0){//si el error esperador está en el obtenido
//comp
    if($CENTRO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $CENTRO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }//def
}else{//si no está está mal
    $CENTRO_array_test1['resultado'] = 'FALSE';
}//def

array_push($ERRORS_array_test, $CENTRO_array_test1);

}//def




CENTRO_Comprobar_CODCENTRO_test();
CENTRO_Comprobar_CODEDIFICIO_test();
CENTRO_Comprobar_NOMBRECENTRO_test();
CENTRO_Comprobar_RESPONSABLECENTRO_test();
CENTRO_Comprobar_DIRECCIONCENTRO_test();
CENTRO_Comprobar_Atributos_test();

?>