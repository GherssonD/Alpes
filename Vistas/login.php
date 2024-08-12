<?php 
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/ValLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if(ControlSesion::sesion_iniciada()){
    Redireccion::redirigir(SERVIDOR);
}

if (isset($_POST['login'])){
    conexion :: abrir_conexion();
    
    $validador = new ValLogin($_POST['email'], $_POST['clave'], conexion::obtener_conexion());
    
    if($validador -> obtener_error() === '' &&
            !is_null($validador -> obtener_usuario())){  //iniciar sesion   // redirifgir a index
        ControlSesion :: iniciar_sesion(
                $validador -> obtener_usuario() -> obtener_id(),
                $validador -> obtener_usuario() -> obtener_nombre());
        
        Redireccion::redirigir(SERVIDOR);
    }
    conexion::cerrar_conexion();
}

$titulo = 'login';

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron text-center">
        <h1>ASOCIACIÓN ALPES</h1>
    </div>
</div>

<div class ="container">
    <div class ="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class=" panel-heading text-center">
                    <h4>Iniciar sesión</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_LOGIN; ?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <label for="email" class="sr-only">email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" 
                               <?php  
                               if (isset($POST['login'])&& isset($POST['email']) && !empty($POST['email']) ){
                                   echo 'value="' . $POST['email'] . '"';
                               }
                               ?> 
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">contraseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="contraseña" required>
                        <br>
                        <?php
                        if(isset($POST['login'])){
                            $validador -> mostrar_error();
                        }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Iniciar sesion</button>
                        
                    </form>
                    <br><!-- comment -->
                    <br><!-- comment -->
                    <div class="text-center">
                        <a href="
                           <?php echo RUTA_RECUPERAR_CLAVE;?>
                           " >¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
