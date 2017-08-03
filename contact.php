<?php
// Guardar los datos recibidos en variables:
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];
$dest = "familiapsicoedu@gmail.com"; 
$headers = "From:".$mensaje."<".$email.">"."\r\n" ;
$headers = $headers."X-Mailer: PHP5\n";
$headers = $headers."MIME-Version: 1.0" . "\n";
$headers = $headers."Content-type: text/html; charset=iso-8859-1" . "\r\n";
// Aqui definimos el asunto y armamos el cuerpo del mensaje
$asunto = "Contacto desde la web";
$cuerpo = "Nombre: ".$nombre."<br>";
$cuerpo .= "Email: ".$email."<br>";
$cuerpo .= "Telefono: ".$telefono."<br>";
$cuerpo .= "Mensaje: ".$mensaje;
$json = array();
$datos = array(
    'mensaje' => "Su mensaje fue enviado correctamente.",
);
array_push($json, $datos);
$jsonstring = json_encode($datos);
// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
//if($nombre != '' && $email != '' && $telefono != '' && $mensaje != ''){
mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
echo $jsonstring;
?>