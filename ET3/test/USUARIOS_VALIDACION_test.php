<?php
/*
	Archivo test
	Nombre: USUARIOS_VALIDACION_test.php
	Autor: 	Noa López Marchante
	Fecha de creación: 13/12/2019 
	Función: test funciones de validación usuario
*/
function Usuarios_comprobarLogin_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
// Comprobar el login vacio
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Login';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';
    $login = '';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    
    $comp = $usuarios->Comprobar_login();
    if(is_array($comp)){
    $USUARIOS_array_test = $comp;
    foreach($USUARIOS_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $USUARIOS_array_test1['error_obtenido']=$codigos;
    }else{
        $USUARIOS_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        if($USUARIOS_array_test1['error_obtenido']===true){
        
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        }else{
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);


   // Comprobar el login ndemasiado largo
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Login';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';
    $login = 'aaaaaaaaaaaaaaaa';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    
    $comp = $usuarios->Comprobar_login();
    if(is_array($comp)){
    $USUARIOS_array_test = $comp;
    foreach($USUARIOS_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $USUARIOS_array_test1['error_obtenido']=$codigos;
    }else{
        $USUARIOS_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>=0){
        if($USUARIOS_array_test1['error_obtenido']===true){
        
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        }else{
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);



       // Comprobar el login ndemasiado corto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Login';
	$USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
	$USUARIOS_array_test1['error_esperado'] = '00003';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';
    $login = 'aa';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    
    $comp = $usuarios->Comprobar_login();
    if(is_array($comp)){
    $USUARIOS_array_test = $comp;
    foreach($USUARIOS_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $USUARIOS_array_test1['error_obtenido']=$codigos;
    }else{
        $USUARIOS_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        if($USUARIOS_array_test1['error_obtenido']===true){
        
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        }else{
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);


         // Comprobar el login no alfabetico
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Login';
	$USUARIOS_array_test1['error'] = 'Solo se permiten alfabéticos';
	$USUARIOS_array_test1['error_esperado'] = '00090';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';
    $login = 'ºººº';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    
    $comp = $usuarios->Comprobar_login();
    if(is_array($comp)){
    $USUARIOS_array_test = $comp;
    foreach($USUARIOS_array_test as $array ){
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $USUARIOS_array_test1['error_obtenido']=$codigos;
    }else{
        $USUARIOS_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>=0){
        if($USUARIOS_array_test1['error_obtenido']===true){
        
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        }else{
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
// Comprobar el login correcto
//-------------------------------------------------------------------------------
$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
$USUARIOS_array_test1['atributo'] = 'Login';
$USUARIOS_array_test1['error'] = 'Login correcto';
$USUARIOS_array_test1['error_esperado'] = true;
$USUARIOS_array_test1['error_obtenido'] = '';
$USUARIOS_array_test1['resultado'] = '';
$codigos='';
$login = 'HOLA';
$usuarios = new USUARIOS_Model($login,'','','','','','','','','');
$comp = $usuarios->Comprobar_login();
if(is_array($comp)){
$USUARIOS_array_test = $comp;
foreach($USUARIOS_array_test as $array ){
    $codigos .= $array['codigoincidencia'] . ' ';
}
$USUARIOS_array_test1['error_obtenido']=$codigos;
}else{
    $USUARIOS_array_test1['error_obtenido']=$comp;
}

if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

    if($USUARIOS_array_test1['error_obtenido']===true){
    
    $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }
}else{
    $USUARIOS_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $USUARIOS_array_test1);
}
/***************************************************************************************************************** */
//funcion comprobsar password
function Usuarios_comprobarPassword_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el password vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Password';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $password = '';//password
    $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');//usuarios
    
    $comp = $usuarios->Comprobar_password(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
/************************************************************************************************************** */    

    // Comprobar el password ndemasiado corto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Password';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['error_esperado'] = '00003';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $password = 'aa';//log
    $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');

    $comp = $usuarios->Comprobar_password();

    //comp
    if(is_array($comp)){

        $USUARIOS_array_test = $comp;

        //rcorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';

        }//fin

        $USUARIOS_array_test1['error_obtenido']=$codigos;

    }else{//si no

        $USUARIOS_array_test1['error_obtenido']=$comp;

    }//fin

    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin

    }else{//en otor csso

        $USUARIOS_array_test1['resultado'] = 'FALSE';

    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el password ndemasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Password';
	$USUARIOS_array_test1['error'] = 'Password demasiado larga';
	$USUARIOS_array_test1['error_esperado'] = '00005';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $password = 'aaaaaaaaaaaaaaaa'; //login
    $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
    
    $comp = $usuarios->Comprobar_password();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el password no alfabetico
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Password';
	$USUARIOS_array_test1['error'] = 'Solo se permiten alfabéticos';
	$USUARIOS_array_test1['error_esperado'] = '00090';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $password = 'ÂºÂºÂºÂº';//log
    $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
    
    $comp = $usuarios->Comprobar_password();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /**************************************************************************************************************************** */

    // Comprobar el password correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Password';
    $USUARIOS_array_test1['error'] = 'Password correcta';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $password = 'HOLA';//login
    $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
    $comp = $usuarios->Comprobar_password();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar password

/************************************************************************************************************** */

//funcion comprobsar DNI
function Usuarios_comprobarDNI_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el DNI vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $DNI = '';//password
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');//usuarios
    
    $comp = $usuarios->Comprobar_DNI(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
/************************************************************************************************************** */    

    // Comprobar el DNI ndemasiado corto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'DNI';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['error_esperado'] = '00003';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $DNI = 'aa';//log
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');

    $comp = $usuarios->Comprobar_DNI();

    //comp
    if(is_array($comp)){

        $USUARIOS_array_test = $comp;

        //rcorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';

        }//fin

        $USUARIOS_array_test1['error_obtenido']=$codigos;

    }else{//si no

        $USUARIOS_array_test1['error_obtenido']=$comp;

    }//fin

    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin

    }else{//en otor csso

        $USUARIOS_array_test1['resultado'] = 'FALSE';

    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el DNI ndemasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $DNI = 'aaaaaaaaaaaaaaaa'; //DNI
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    
    $comp = $usuarios->Comprobar_DNI();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el DNI no formato
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Formato dni erróneo';
	$USUARIOS_array_test1['error_esperado'] = '00010';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $DNI = '44H657399';//log
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    
    $comp = $usuarios->Comprobar_DNI();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el DNI no LETRA
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'DNI';
	$USUARIOS_array_test1['error'] = 'Dni no válido';
	$USUARIOS_array_test1['error_esperado'] = '00011';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $DNI = '44657399A';//log
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    
    $comp =  $usuarios->Comprobar_DNI();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);


    /**************************************************************************************************************************** */

    // Comprobar el dni correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'DNI';
    $USUARIOS_array_test1['error'] = 'DNI correcto';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $DNI = '44657399R';//login
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    $comp = $usuarios->Comprobar_DNI();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']= $comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar DNI

/************************************************************************************************************** */

//funcion comprobsar NOMBRE
function Usuarios_comprobarNombre_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el nombre vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Nombre';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $nombre = '';//password
    $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');//usuarios
    
    $comp = $usuarios->Comprobar_nombre(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
/************************************************************************************************************** */    

    // Comprobar el nombre ndemasiado corto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Nombre';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['error_esperado'] = '00003';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $nombre = 'aa';//log
    $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');

    $comp = $usuarios->Comprobar_nombre();

    //comp
    if(is_array($comp)){

        $USUARIOS_array_test = $comp;

        //rcorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';

        }//fin

        $USUARIOS_array_test1['error_obtenido']=$codigos;

    }else{//si no

        $USUARIOS_array_test1['error_obtenido']=$comp;

    }//fin

    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin

    }else{//en otor csso

        $USUARIOS_array_test1['resultado'] = 'FALSE';

    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el nombre ndemasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Nombre';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $nombre = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'; //DNI
    $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
    
    $comp = $usuarios->Comprobar_nombre();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el nombre alfabetico
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Nombre';
	$USUARIOS_array_test1['error'] = 'Solo están permitidas alfabéticos';
	$USUARIOS_array_test1['error_esperado'] = '00030';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $nombre = 'ghjj4';//log
    $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
    
    $comp = $usuarios->Comprobar_nombre();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /**************************************************************************************************************************** */

    // Comprobar el nombre correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Nombre';
    $USUARIOS_array_test1['error'] = 'Nombre correcto';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $nombre = 'Juan Manuel';//login
    $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
    $comp = $usuarios->Comprobar_nombre();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar NOMBRE

/************************************************************************************************************** */

//funcion comprobsar apellidos
function Usuarios_comprobarApellidos_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el apellidos vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Apellidos';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $apellidos = '';//password
    $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');//usuarios
    
    $comp = $usuarios->Comprobar_apellidos(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
/************************************************************************************************************** */    

    // Comprobar el apellidos ndemasiado corto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Apellidos';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['error_esperado'] = '00003';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $apellidos = 'aa';//log
    $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');

    $comp = $usuarios->Comprobar_apellidos();

    //comp
    if(is_array($comp)){

        $USUARIOS_array_test = $comp;

        //rcorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';

        }//fin

        $USUARIOS_array_test1['error_obtenido']=$codigos;

    }else{//si no

        $USUARIOS_array_test1['error_obtenido']=$comp;

    }//fin

    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin

    }else{//en otor csso

        $USUARIOS_array_test1['resultado'] = 'FALSE';

    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el apellidos ndemasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Apellidos';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $apellidos = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'; //DNI
    $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
    
    $comp = $usuarios->Comprobar_apellidos();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el apellidos alfabetico
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Apellidos';
	$USUARIOS_array_test1['error'] = 'Solo están permitidas alfabéticos';
	$USUARIOS_array_test1['error_esperado'] = '00030';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $apellidos = 'ghjj4';//log
    $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
    
    $comp = $usuarios->Comprobar_apellidos();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /**************************************************************************************************************************** */

    // Comprobar el apellidos correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Apellidos';
    $USUARIOS_array_test1['error'] = 'Apellidos correcto';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $apellidos = 'López Marchante';//login
    $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
    $comp = $usuarios->Comprobar_apellidos();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar apellidos

/************************************************************************************************************** */

//funcion comprobsar telefono
function Usuarios_comprobarTelefono_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el teleofno vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Telefono';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $telefono = '';//password
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');//usuarios
    
    $comp = $usuarios->Comprobar_telefono(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
/************************************************************************************************************** */    

    // Comprobar el telefono ndemasiado corto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Telefono';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['error_esperado'] = '00003';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $telefono = '64';//log
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');

    $comp = $usuarios->Comprobar_telefono();

    //comp
    if(is_array($comp)){

        $USUARIOS_array_test = $comp;

        //rcorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';

        }//fin

        $USUARIOS_array_test1['error_obtenido']=$codigos;

    }else{//si no

        $USUARIOS_array_test1['error_obtenido']=$comp;

    }//fin

    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin

    }else{//en otor csso

        $USUARIOS_array_test1['resultado'] = 'FALSE';

    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el telefono ndemasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Telefono';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $telefono = '444444444444'; 
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    
    $comp = $usuarios->Comprobar_telefono();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el telefono no valido
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Telefono';
	$USUARIOS_array_test1['error'] = 'Teléfono no válido';
	$USUARIOS_array_test1['error_esperado'] = '00006';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $telefono = '215545545';//log
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    
    $comp = $usuarios->Comprobar_telefono();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el telefono no valido
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Telefono';
	$USUARIOS_array_test1['error'] = 'Solo se permiten números';
	$USUARIOS_array_test1['error_esperado'] = '00070';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $telefono = '215545tgg';//log
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    
    $comp = $usuarios->Comprobar_telefono();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /**************************************************************************************************************************** */

    // Comprobar el telefono correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Telefono';
    $USUARIOS_array_test1['error'] = 'Telefono correcto';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $telefono = '646709496';//login
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    $comp = $usuarios->Comprobar_telefono();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar telefono

/************************************************************************************************************** */

//funcion comprobsar email
function Usuarios_comprobarEmail_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el email vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Email';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $email = '';//password
    $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');//usuarios
    
    $comp = $usuarios->Comprobar_email(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
/************************************************************************************************************** */    

    // Comprobar el email ndemasiado corto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Email';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['error_esperado'] = '00003';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $email = 'º';//log
    $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');

    $comp = $usuarios->Comprobar_email();

    //comp
    if(is_array($comp)){

        $USUARIOS_array_test = $comp;

        //rcorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';

        }//fin

        $USUARIOS_array_test1['error_obtenido']=$codigos;

    }else{//si no

        $USUARIOS_array_test1['error_obtenido']=$comp;

    }//fin

    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin

    }else{//en otor csso

        $USUARIOS_array_test1['resultado'] = 'FALSE';

    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el email ndemasiado largo
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Email';
	$USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
	$USUARIOS_array_test1['error_esperado'] = '00002';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $email = 'aaaaaaaaaaaaaaaaaaaaaºaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'; //DNI
    $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
    
    $comp = $usuarios->Comprobar_email();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /******************************************************************************************************** */
    // Comprobar el emnail no valido
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Email';
	$USUARIOS_array_test1['error'] = 'Formato email erróneo';
	$USUARIOS_array_test1['error_esperado'] = '00120';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $email = 'fgfgfgfgfgº';//log
    $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
    
    $comp = $usuarios->Comprobar_email();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    
    /**************************************************************************************************************************** */

    // Comprobar el email correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Email';
    $USUARIOS_array_test1['error'] = 'Email correcto';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $email = 'noamarchante@gmail.com';//login
    $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
    $comp = $usuarios->Comprobar_email();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar email

/************************************************************************************************************** */

//funcion comprobsar fecha nacimiento
function Usuarios_comprobarFechaNacimiento_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el fecha vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Fecha nacimiento';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $fecha = '';//password
    $usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');//usuarios
    
    $comp = $usuarios->Comprobar_FechaNacimiento(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /************************************************************************************************************ */

    // Comprobar el fecha no valido
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Fecha nacimiento';
	$USUARIOS_array_test1['error'] = 'Formato fecha erróneo';
	$USUARIOS_array_test1['error_esperado'] = '00020';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    $codigos='';//cod
    $fecha = '20186/3/2';//log
    $usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
    
    $comp = $usuarios->Comprobar_FechaNacimiento();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //vcom`p
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{//si no
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
       
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

    /**************************************************************************************************************************** */

    // Comprobar el fecha correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Fecha nacimiento';
    $USUARIOS_array_test1['error'] = 'Fecha nacimiento correcta';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $fecha = '2018-02-13';//login
    $usuarios = new USUARIOS_Model('','','','','','','',$fecha,'','');
    $comp = $usuarios->Comprobar_FechaNacimiento();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar fecha nacimiento

/************************************************************************************************************** */

//funcion comprobsar sexo
function Usuarios_comprobarSexo_test(){
    
    global $ERRORS_array_test;//ARRAY DE ERRORES

    // creo array de almacen de test individual
	$USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
/**************************************************************************************************************************** */
    // Comprobar el sexo vacio
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Sexo';
	$USUARIOS_array_test1['error'] = 'Atributo vací­o';
	$USUARIOS_array_test1['error_esperado'] = '00001';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
    
    $codigos=''; //CODIGOS
    $sexo = '';//password
    $usuarios = new USUARIOS_Model('','','','','','','','','','',$sexo);//usuarios
    
    $comp = $usuarios->Comprobar_sexo(); //comprobacion
    
    //array
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre errores
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        } //fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //compara
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
    
        //compara
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{ //si no 
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }//fin
    
    }else{//si no
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);
    

    /************************************************************************************************************ */

    // Comprobar el sexo valor
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['atributo'] = 'Sexo';
	$USUARIOS_array_test1['error'] = "Solo se periten los valores 'hombre','mujer'";
	$USUARIOS_array_test1['error_esperado'] = '00100';
	$USUARIOS_array_test1['error_obtenido'] = '';
	$USUARIOS_array_test1['resultado'] = '';
   
    $codigos=''; //cod
    $sexo = 'hombree'; //DNI
    $usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
    
    $comp = $usuarios->Comprobar_sexo();
   
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //rercorre
        foreach($USUARIOS_array_test as $array ){
        
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
    
        $USUARIOS_array_test1['error_obtenido']=$codigos;
    
    }else{ //no array
    
        $USUARIOS_array_test1['error_obtenido']=$comp;
    
    }//fin
    
    //comp
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){
        
        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        
        }else{
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    
    }else{
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }

	array_push($ERRORS_array_test, $USUARIOS_array_test1);
    

    /**************************************************************************************************************************** */

    // Comprobar el sexo correcto
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['atributo'] = 'Sexo';
    $USUARIOS_array_test1['error'] = 'Sexo correcto';
    $USUARIOS_array_test1['error_esperado'] = true;
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos=''; //cod
    $sexo = 'mujer';//login
    $usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
    $comp = $usuarios->Comprobar_sexo();
    
    //comp
    if(is_array($comp)){
    
        $USUARIOS_array_test = $comp;
    
        //recorre
        foreach($USUARIOS_array_test as $array ){
    
            $codigos .= $array['codigoincidencia'] . ' ';
    
        }//fin
   
        $USUARIOS_array_test1['error_obtenido']=$codigos;
   
    }else{ //si no
   
        $USUARIOS_array_test1['error_obtenido']=$comp;
   
    }//fin

    //comp
    if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){

        //comp
        if($USUARIOS_array_test1['error_obtenido']===true){
        
            $USUARIOS_array_test1['resultado'] = 'OK';
        
        }else{//else
        
            $USUARIOS_array_test1['resultado'] = 'FALSE';
        }//fin
    
    }else{//else
    
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    
    }//fin

    array_push($ERRORS_array_test, $USUARIOS_array_test1);

}//fin comprobar sexo

/************************************************************************************************************** */

function Usuarios_Comprobar_Atributos_test(){
    global $ERRORS_array_test;
// creo array de almacen de test individual
    $USUARIOS_array_test = array();
    $USUARIOS_array_test1 = array();
   
// Comprobar el dos atributos incorrecto
//-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';  
    $USUARIOS_array_test1['atributo'] = 'Usuario';
    $USUARIOS_array_test1['error'] = 'Atributo vacío';
    $USUARIOS_array_test1['error_esperado'] = '00001';
    $USUARIOS_array_test1['error_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    $codigos='';
    $login ='Juana';
    $password='abc1223.';
    $DNI='17488791M';
    $nombre='º';
    $apellidos='';
    $telefono ='678989999';
    $email='juana@gmail.com';
    $fecha='2019-06-23';
    $sexo= 'hombre';
    
    $USUARIOS = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fecha,'',$sexo);
    
    $comp =$USUARIOS->Comprobar_atributos();
    if(is_array($comp)){//si devuelve errores el método
    $USUARIOS_array_test = $comp;
    foreach($USUARIOS_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $USUARIOS_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $PROFESOR_array_test1['error_obtenido']=$comp;
    }
    
    if (strlen(strstr($USUARIOS_array_test1['error_obtenido'],$USUARIOS_array_test1['error_esperado']))>0){//si los errores está presentes
        if($USUARIOS_array_test1['error_obtenido']===true){//si no da errores hay fallo
        
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        }else{//resultado esperable
            $USUARIOS_array_test1['resultado'] = 'OK';
        }
    }else{//si no está el error presente en los errores
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test, $USUARIOS_array_test1);


  
// Comprobar el usuario correcto
//-------------------------------------------------------------------------------
$USUARIOS_array_test1['entidad'] = 'USUARIO';  
$USUARIOS_array_test1['atributo'] = 'Usuario';
$USUARIOS_array_test1['error'] = 'Usuario correcto';
$USUARIOS_array_test1['error_esperado'] = true;
$USUARIOS_array_test1['error_obtenido'] = '';
$USUARIOS_array_test1['resultado'] = '';
    $codigos='';
    $login ='Juana';
    $password='abc1223.';
    $DNI='17488791M';
    $nombre='Alfonso Luis';
    $apellidos='Saavedra Gonzalez';
    $telefono ='678989999';
    $email='juana@gmail.com';
    $fecha='2019-06-23';
    $sexo= 'hombre';

    $USUARIOS = new USUARIOS_Model($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$fecha,'',$sexo);
    $comp =$USUARIOS->Comprobar_atributos();

    if(is_array($comp)){//si devuelve errores el método
    $USUARIOS_array_test = $comp;
    foreach($USUARIOS_array_test as $array ){//se recorren los errores y se juntan en una cadena
        $codigos .= $array['codigoincidencia'] . ' ';
    }
    $USUARIOS_array_test1['error_obtenido']=$codigos;
    }else{//si no es un array se mete directamente en el array de errores
        $USUARIOS_array_test1['error_obtenido']=$comp;
    }
    

if (strlen(strstr((string)$USUARIOS_array_test1['error_obtenido'],(string)$USUARIOS_array_test1['error_esperado']))>0){//si el error esperador está en el obtenido

    if($USUARIOS_array_test1['error_obtenido']===true){//si es un true está correcto
    
    $USUARIOS_array_test1['resultado'] = 'OK';
    }else{//si no está incorrecto
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }
}else{//si no está está mal
    $USUARIOS_array_test1['resultado'] = 'FALSE';
}

array_push($ERRORS_array_test, $USUARIOS_array_test1);

}

Usuarios_comprobarLogin_test();
Usuarios_comprobarPassword_test();
Usuarios_comprobarDNI_test();
Usuarios_comprobarNombre_test();
Usuarios_comprobarApellidos_test();
Usuarios_comprobarTelefono_test();
Usuarios_comprobarEmail_test();
Usuarios_comprobarFechaNacimiento_test();
Usuarios_comprobarSexo_test();
Usuarios_Comprobar_Atributos_test();

?>