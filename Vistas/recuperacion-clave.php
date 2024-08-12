<?php
include_once 'app/RepositorioRecuperacionClave.inc.php';
include_once 'app/Redireccion.inc.php';


conexion::abrir_conexion();

if (RepositorioRecuperacionClave::url_secreta_existe(conexion::obtener_conexion(), $url_personal)) {
    $id_usuario = RepositorioRecuperacionClave::obtener_id_usuario_mediante_url_secreta(
                    conexion::obtener_conexion(), $url_personal);
} else {
    echo '404';
}
if(isset($POST['guardar-clave'])){
    //validacin cde la clave 1
    
    $clave_cifrada = password_hash($POST['clave'], PASSWORD_DEFAULT);
    $clave_actulizada = RepositorioPropietarios::actulizar_password(conexion::obtener_conexion(), 
            $id_usuario, $clave_cifrada);
    //redirigir a notificacion de actualizacion correcta y ofrecer link login
    if($clave_actulizada){
        Redireccion::redirigir(RUTA_LOGIN);
    }else{
        echo 'ERROR';
    }
}
conexion::cerrar_conexion();

$titulo = 'Recuperacion de contraseñas';

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="panel-heading">
                <div class="panel-heading text-center">
                    <h4>Crear un nueva contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php  echo RUTA_RECUPERACION_CLAVE  ."/". $url_personal;?>">
                        <h2>Escribir tu nueva contraseña por favor</h2>
                        <br>
                        <div class="form-group">
                            <label for="clave">NUEVA CONTRASEÑA</label>
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Minimo 6 caracteres" required>
                        </div>

                        <div class="form-group">
                            <label for="clave2">Escribe de nuevo la contraseña</label>
                            <input type="password" name="clave2" id="clave2" class="form-control" placeholder="Debe ser igual" required>
                        </div>
                        <button type="submit" name="guardar-clave" class="btn btn-lg btn-primary btn-block">
                            Guardar contraseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


