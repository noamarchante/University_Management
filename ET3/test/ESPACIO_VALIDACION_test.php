<?php

/*
    Archivo test
    Nombre: ESPACIO_VALIDACION_test.php
    Autor:  Noa López Marchante
    Fecha de creación: 13/12/2019 
    Función: test funciones de validación usuario
*/
function ESPACIO_Comprobar_CODESPACIO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el codEspacio vacio
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEspacio';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = '';
    $centro=new ESPACIO_Model($codEspacio,'','','','','');
    
    $comp = $centro->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


   // Comprobar el codEspacio ndemasiado corto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEspacio';
    $ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $ESPACIO_array_test1['error_esperado'] = '00003';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = 'a';
    $centro=new ESPACIO_Model($codEspacio,'','','','','');
    
    $comp = $centro->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);



       // Comprobar el codEspacio demasiado largo
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEspacio';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['error_esperado'] = '00002';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
    $centro=new ESPACIO_Model($codEspacio,'','','','','');
    
    $comp = $centro->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


         // Comprobar el codEspacio formato
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEspacio';
    $ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $ESPACIO_array_test1['error_esperado'] = '00040';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = '$$$$';
    $centro=new ESPACIO_Model($codEspacio,'','','','','');
    
    $comp = $centro->Comprobar_CODESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
// Comprobar el codEspacio correcto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEspacio';
    $ESPACIO_array_test1['error'] = 'Codigo Espacio correcto';
    $ESPACIO_array_test1['error_esperado'] = true;
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio = '123OU-';
    $centro=new ESPACIO_Model($codEspacio,'','','','','');
     $comp = $centro->Comprobar_CODESPACIO();
        if(is_array($comp)){//si devuelve errores el método
        $ESPACIO_array_test = $comp;
        foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}


function ESPACIO_Comprobar_CODEDIFICIO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el codEdificio vacio
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEdificio';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = '';
    $centro=new ESPACIO_Model('',$codEdificio,'','','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


   // Comprobar el codEdificio ndemasiado corto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEdificio';
    $ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $ESPACIO_array_test1['error_esperado'] = '00003';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = 'a';
    $centro=new ESPACIO_Model('',$codEdificio,'','','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);



       // Comprobar el codEdificio demasiado largo
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEdificio';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['error_esperado'] = '00002';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
    $centro=new ESPACIO_Model('',$codEdificio,'','','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


         // Comprobar el codEdificio formato
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEdificio';
    $ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $ESPACIO_array_test1['error_esperado'] = '00040';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = '$$$$';
    $centro=new ESPACIO_Model('',$codEdificio,'','','','');
    
    $comp = $centro->Comprobar_CODEDIFICIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
// Comprobar el codEdificio correcto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codEdificio';
    $ESPACIO_array_test1['error'] = 'Codigo Edificio correcto';
    $ESPACIO_array_test1['error_esperado'] = true;
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEdificio = '123OU-';
    $centro=new ESPACIO_Model('',$codEdificio,'','','','');
     $comp = $centro->Comprobar_CODEDIFICIO();
        if(is_array($comp)){//si devuelve errores el método
        $ESPACIO_array_test = $comp;
        foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}



function ESPACIO_Comprobar_CODCENTRO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el codCentro vacio
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codCentro';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = '';
    $centro=new ESPACIO_Model('','',$codCentro,'','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


   // Comprobar el codCentro ndemasiado corto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codCentro';
    $ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $ESPACIO_array_test1['error_esperado'] = '00003';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = 'a';
    $centro=new ESPACIO_Model('','',$codCentro,'','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);



       // Comprobar el codCentro demasiado largo
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codCentro';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['error_esperado'] = '00002';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = 'aaaaaaaaaaaaaaaaaaaaaaaaaa';
    $centro=new ESPACIO_Model('','',$codCentro,'','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


         // Comprobar el codCentro formato
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codCentro';
    $ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $ESPACIO_array_test1['error_esperado'] = '00040';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = '$$$$';
    $centro=new ESPACIO_Model('','',$codCentro,'','','');
    
    $comp = $centro->Comprobar_CODCENTRO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
// Comprobar el codCentro correcto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'codCentro';
    $ESPACIO_array_test1['error'] = 'Codigo Centro correcto';
    $ESPACIO_array_test1['error_esperado'] = true;
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codCentro = '123OU';
    $centro=new ESPACIO_Model('','',$codCentro,'','','');
     $comp = $centro->Comprobar_CODCENTRO();
        if(is_array($comp)){//si devuelve errores el método
        $ESPACIO_array_test = $comp;
        foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}

function ESPACIO_Comprobar_TIPO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el tipo vacio
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'tipo';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $tipo = '';
    $centro=new ESPACIO_Model('','','',$tipo,'','');
    
    $comp = $centro->Comprobar_TIPO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);



         // Comprobar el tipo formato
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'tipo';
    $ESPACIO_array_test1['error'] = "Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS'";
    $ESPACIO_array_test1['error_esperado'] = '00080';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $tipo = 'hola';
    $centro=new ESPACIO_Model('','','',$tipo,'','');
    
    $comp = $centro->Comprobar_TIPO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
// Comprobar el tipo correcto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'tipo';
    $ESPACIO_array_test1['error'] = 'Tipo correcto';
    $ESPACIO_array_test1['error_esperado'] = true;
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $tipo = 'DESPACHO';
    $centro=new ESPACIO_Model('','','',$tipo,'','');
     $comp = $centro->Comprobar_TIPO();
        if(is_array($comp)){//si devuelve errores el método
        $ESPACIO_array_test = $comp;
        foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}

function ESPACIO_Comprobar_SUPERFICIEESPACIO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el superficie vacio
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'superficie';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $superficie = '';
    $centro=new ESPACIO_Model('','','','',$superficie,'');
    
    $comp = $centro->Comprobar_SUPERFICIEESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


   // Comprobar el superficie ndemasiado corto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'superficie';
    $ESPACIO_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
    $ESPACIO_array_test1['error_esperado'] = '00004';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $superficie = '';
    $centro=new ESPACIO_Model('','','','',$superficie,'');
    
    $comp = $centro->Comprobar_SUPERFICIEESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);



       // Comprobar el superficie demasiado largo
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'superficie';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['error_esperado'] = '00002';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $superficie = '124234342343123132';
    $centro=new ESPACIO_Model('','','','',$superficie,'');
    
    $comp = $centro->Comprobar_SUPERFICIEESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


         // Comprobar el superficie formato
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'superficie';
    $ESPACIO_array_test1['error'] = 'Solo se permiten números';
    $ESPACIO_array_test1['error_esperado'] = '00070';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $superficie = 'hola';
    $centro=new ESPACIO_Model('','','','',$superficie,'');
    
    $comp = $centro->Comprobar_SUPERFICIEESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
// Comprobar el superficie correcto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'superficie';
    $ESPACIO_array_test1['error'] = 'Superficie correcta';
    $ESPACIO_array_test1['error_esperado'] = true;
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $superficie = '12';
    $centro=new ESPACIO_Model('','','','',$superficie,'');
     $comp = $centro->Comprobar_SUPERFICIEESPACIO();
        if(is_array($comp)){//si devuelve errores el método
        $ESPACIO_array_test = $comp;
        foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}

function ESPACIO_Comprobar_NUMINVENTARIOESPACIO_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el numInventario vacio
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'numInventario';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $numInventario = '';
    $centro=new ESPACIO_Model('','','','','',$numInventario);
    
    $comp = $centro->Comprobar_NUMINVENTARIOESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


   // Comprobar el numInventario ndemasiado corto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'numInventario';
    $ESPACIO_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
    $ESPACIO_array_test1['error_esperado'] = '00004';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $numInventario = '';
    $centro=new ESPACIO_Model('','','','','',$numInventario);
    
    $comp = $centro->Comprobar_NUMINVENTARIOESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);



       // Comprobar el numInventario demasiado largo
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'numInventario';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['error_esperado'] = '00002';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $numInventario = '124234342343123132';
    $centro=new ESPACIO_Model('','','','','',$numInventario);
    
    $comp = $centro->Comprobar_NUMINVENTARIOESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


         // Comprobar el numInventario formato
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'numInventario';
    $ESPACIO_array_test1['error'] = 'Solo se permiten números';
    $ESPACIO_array_test1['error_esperado'] = '00070';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $numInventario = 'hola';
    $centro=new ESPACIO_Model('','','','','',$numInventario);
    
    $comp = $centro->Comprobar_NUMINVENTARIOESPACIO();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
// Comprobar el numInventario correcto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'numInventario';
    $ESPACIO_array_test1['error'] = 'NumInventario correcto';
    $ESPACIO_array_test1['error_esperado'] = true;
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $numInventario = '12';
    $centro=new ESPACIO_Model('','','','','',$numInventario);
     $comp = $centro->Comprobar_NUMINVENTARIOESPACIO();
        if(is_array($comp)){//si devuelve errores el método
        $ESPACIO_array_test = $comp;
        foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
            $codigos .= $array['codigoincidencia'] . ' ';
        }
        $ESPACIO_array_test1['error_obtenido']=$codigos;
        }else{//si no es un array se mete directamente en el array de errores
            $ESPACIO_array_test1['error_obtenido']=$comp;
        }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}

function ESPACIO_Comprobar_Atributos_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $ESPACIO_array_test = array();
    $ESPACIO_array_test1 = array();
   
// Comprobar el dos atributos incorrecto
//-------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';  
    $ESPACIO_array_test1['atributo'] = 'espacio';
    $ESPACIO_array_test1['error'] = 'Atributo vacío';
    $ESPACIO_array_test1['error_esperado'] = '00001';
    $ESPACIO_array_test1['error_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio='AU11';
    $codCentro='AU11';
    $codEdificio='AU11';
    $tipo='';
    $superficie='';
    $numInventario='22';

    $ESPACIO = new ESPACIO_Model($codEspacio,$codCentro,$codEdificio,$tipo,$superficie,$numInventario);
    
    $comp =$ESPACIO->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    
   if(strlen(strstr($ESPACIO_array_test1['error_obtenido'],$ESPACIO_array_test1['error_esperado']))>0){//si los errores está presentes
        if($ESPACIO_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $ESPACIO_array_test1);


  
// Comprobar el espacio correcto
//-------------------------------------------------------------------------------
$ESPACIO_array_test1['entidad'] = 'ESPACIO';  
$ESPACIO_array_test1['atributo'] = 'espacio';
$ESPACIO_array_test1['error'] = 'Espacio correcto';
$ESPACIO_array_test1['error_esperado'] = true;
$ESPACIO_array_test1['error_obtenido'] = '';
$ESPACIO_array_test1['resultado'] = '';
    $codigos='';
    $codEspacio='AU11';
    $codCentro='AU11';
    $codEdificio='AU11';
    $tipo='DESPACHO';
    $superficie='12';
    $numInventario='22';

    $ESPACIO = new ESPACIO_Model($codEspacio,$codCentro,$codEdificio,$tipo,$superficie,$numInventario);

    $comp =$ESPACIO->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $ESPACIO_array_test = $comp;
    foreach($ESPACIO_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $ESPACIO_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $ESPACIO_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$ESPACIO_array_test1['error_obtenido'],(string)$ESPACIO_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($ESPACIO_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $ESPACIO_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $ESPACIO_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $ESPACIO_array_test1);

}



ESPACIO_Comprobar_CODESPACIO_test();
ESPACIO_Comprobar_CODEDIFICIO_test();
ESPACIO_Comprobar_CODCENTRO_test();
ESPACIO_Comprobar_TIPO_test();
ESPACIO_Comprobar_SUPERFICIEESPACIO_test();
ESPACIO_Comprobar_NUMINVENTARIOESPACIO_test();
ESPACIO_Comprobar_Atributos_test();



?>