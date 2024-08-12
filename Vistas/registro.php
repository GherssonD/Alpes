<?php
include_once 'app/conexion.inc.php';
include_once 'app/propietarios.inc.php';
include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/Valregistro.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['enviar'])) {
    conexion :: abrir_conexion();

    $validador = new Valregistro($_POST['nombre'], $_POST['email'], 
            $_POST['clave1'], $_POST['clave2'], conexion :: obtener_conexion());
    
    if ($validador -> registro_valido()) {
        $usuario = new usuario('', $validador -> obtener_nombre(),
                $validador -> obtener_email(),
                password_hash($validador -> obtener_clave(), PASSWORD_DEFAULT),
                '', 
                '');
        $usuarios_insertado = RepositorioPropietarios :: insertar_usuario(conexion :: obtener_conexion(), $usuario);

        if ($usuarios_insertado) {//redirrecion aregistro-correcto
            Redireccion :: redirigir (RUTA_REGISTRO_CORRECTO . '/' . $usuario -> obtener_nombre());
        }
    }
    conexion :: cerrar_conexion();
}

    $titulo = 'Registros';

    include_once 'plantillas/declaración.inc.php';
    include_once 'plantillas/navbar.inc.php';
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Registro de Propietarios</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <div class=" panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            INSTRUCCIONES 
                        </h3>
                    </div>

                    <div class="panel-body">
                        <br>
                        <p class="text-justify">Bienvenido a la asociación ALPES introce nombres, apellidos, nombre del salon, correo electronico y contraseñas.
                            El correo introducido debe ser acivo para gestinar tu cuenta. Se recomienda que uses una contraseña que contenga 
                            letras minisculas, mayúsculas, numeros y simbolos.
                        </p>
                        <br><!-- comment -->
                        <a href="#">¿Ya tienes cuenta?</a>
                        <br>
                        <a href="#">¿Olvidaste tu cuenta?</a>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class=" panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Introduce tus datos
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo RUTA_REGISTRO ?>">
                            <?php
                            if (isset($_POST['enviar'])) {
                                include_once 'plantillas/registro_validado.inc.php';
                            } else {
                                include_once 'plantillas/registro_vacio.inc.php';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'plantillas/cierre.inc.php';
    ?>
