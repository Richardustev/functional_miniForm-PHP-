<?php
$errores = '';
$enviado = '';

if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    
    /*Comprobantes de seguridad*/

    //Nombre
    if(!empty($nombre)){
        $nombre = trim($nombre); //Eliminar espacios
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING); //Sanitizar texto
    } else {
        $errores .= 'Por favor, ingresa un nombre. <br>';
    }

    //Correo
    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL); //Sanitizar texto
        
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){ //Verificar Email valido
            $errores .= 'Por favor, ingresa un correo valido. <br>';
        }
    } else {
        $errores .= 'Por favor, ingresa un correo. <br>';
    }

    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje); //No permitir que caracteres especiales sean leídos como codigo
        $mensaje = trim($mensaje);  //Quitar espacios innecesarios
        $mensaje = stripslashes($mensaje); //Quita las barras de un string con comillas escapadas

    } else {
        $errores .= 'Por favor, ingresa el mensaje. <br>';
    }

    if(!$errores){
        $enviar_a = 'rickaaraujoc@gmail.com';
        $asunto = 'Correo enviado desde miPagina.com';
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje: " . $mensaje;
    
        /*Funcion mail*/
        //+Solo sirve en hostings
        //mail([correo], [asunto], [mensaje]);
        mail($enviar_a, $ausnto, $mensaje_preparado);
        $enviado = true;
    }
}
require 'index.view.php';
?>