<?php 

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/propietarios.inc.php';
include_once 'app/RecuperacionClave.inc.php';

include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/RepositorioRecuperacionClave.inc.php';

include_once 'app/Redireccion.inc.php';

function sa($longitud){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for($i = 0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    return $string_aleatorio;
}
if(isset($_POST['enviar_email'])){
    $email = $_POST['email'];
    
    conexion::abrir_conexion();
    
    if(!RepositorioPropietarios :: email_existe(conexion :: obtener_conexion(), $email)){
        return ; 
    }
    $usuario = RepositorioPropietarios :: obtener_usuario_por_email(conexion :: obtener_conexion(), email);
    
    $nombre_usuario = $usuario -> obtener_nombre();
    $string_aleatorio = sa(10);
    
    $url_secreta = hash('sha256',$string_aleatorio . $nombre_usuario); //64 caractes necesarios
    
    $peticion_generada = RepositorioRecuperacionClave :: generar_peticion(conexion :: obtener_conexion(), $usuario
            -> obtener_id(), $url_secreta);
    
    conexion :: cerrar_conexion();
    
    //tu peticion es correcta, notifica instrucciones
    if($peticion_generada){
        Redireccion :: redirigir(RUTA_SERVIDOR);
    }

}
    
    //ERROR, algo fallo