<?php

$destinatario = "bakem29987@stikezz.com";
$asunto = "prueba de email";
$mensaje = "esto es una prueba";

$exito = mail($destinatario, $asunto, $mensaje);

if($exito){
    echo 'email enviado';
}else{
    echo 'envio fallido';
}
