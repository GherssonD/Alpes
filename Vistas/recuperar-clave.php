<?php 
$titulo = 'Recuperación de contraseña';

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
                    <h4>Recuperación de contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_GENERAR_URL_SECRETA; ?>">
                        <h2>Introduce tu Correo Electronico (Email).</h2>
                        <br>
                        <p>
                           Escribe la dirreción de correo electronico con la te resgistraste y te enviaremos un email 
                           con el que podras restablecer tu contraseña.
                        </p>
                        <br>
                        <label for="email" class="sr-only">email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" 
                               
                               required autofocus>
                        <br>
                        <button type="submit" name="enviar_email" class="btn btn-lg btn-primary btn-block">Enviar</button>
                        
                    </form>
                    <br><!-- comment -->
                    <br><!-- comment -->
                    <div class="text-center">
                        <a href="<?php echo RUTA_RECUPERAR_CLAVE ?>" >¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

