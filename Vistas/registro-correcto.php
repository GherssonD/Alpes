<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = '!Registro correcto';

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';

?>


<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">SALONES DE EVENTOS SOCIALES </h1>

    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> REGISTRADO CORRECTAMENTE
                </div>
                <div class="panel-body text-center">
                    <p>!BIENVENIDO A LA PODEROSA ASOCIACIÓN ALPES<b><?php  echo $nombre ?></b>!</p>
                    <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesión</a><br><!-- comment -->
                        Para comenzar ha usar tu cuenta del sistema web.</p>
                </div>
            </div>
        </div>
    </div>
</div>

