<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/propietarios.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/Comentarios.inc.php';

include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

$titulo = $entrada->obtener_titulo();

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>  

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                <?php echo $entrada->obtener_titulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <p>
                    El salón esta disponible para efectuar cualquier de evento social para cualquier contacto comuniquese con el administgrador o propietario 
                    <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <?php echo $autor->obtener_nombre(); ?>
                    </a>
                <p>
                    <strong>
                        <p>Salon de Evento Ubicado en el Distrito Nro.
                            <?php echo $entrada->obtener_distrito(); ?>  
                            Donde su capacidad es de <?php echo $entrada->obtener_capacidad(); ?> de personas
                    </strong>

                    <strong>
                        <p>Contactos disponibles al 
                            <?php echo $entrada->obtener_telefono(); ?>
                    </strong>
                    <br>
                    <img src="<?php echo $entrada -> obtener_Imagen();  ?>">

                    <br><!-- comment -->
                    <strong>
                        <p>Donde podemos pequeño vistazo a la caracteristacas del Salón
                            <?php echo $entrada->obtener_texto(); ?>
                    </strong>
                </p>

                </p>
        </div>
    </div>

</article>
<?php
include_once 'plantillas/entradas_al_azar.inc.php';
?>
<br>
<?php
if (count($comentarios) > 0) {
    include_once 'plantillas/comentarios-entrada.inc,php';
} else {
    echo '<p> !NO EXISTEN COMENTARIOS </p>';
}
?>
</div>
<?php
include_once 'plantillas/cierre.inc.php';
