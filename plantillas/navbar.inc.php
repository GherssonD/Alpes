<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';

conexion :: abrir_conexion();
$total_propietarios = RepositorioPropietarios :: obtener_numero_usuarios(conexion::obtener_conexion());
?>



<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este botón despliega la barra de navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo SERVIDOR ?>">Menu Principal</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">


                <li><a href="
<?php echo 'Anuncios.php' ?>
                       "><span class="glyphicon glyphicon-home" aria-hidden ="true"></span>ANUNCIOS</a></li>
                <li><a href="
                    <?php echo 'servicio.php' ?>
                       "><span class="glyphicon glyphicon-cutlery" aria-hidden ="true"></span>SERVICIOS</a></li>
                <li><a href="
                    <?php echo 'Chat.php' ?>
                       "><span class="glyphicon glyphicon-earphone" aria-hidden ="true"></span>CHATS</a></li>
                <li><a href="
                    <?php echo 'Alpes.php' ?>
                       "><span class="glyphicon glyphicon-home" aria-hidden ="true"></span>ALPES</a></li>
                <li><a href="
                    <?php echo 'Salones.php' ?>
                       "><span class="glyphicon glyphicon-glass" aria-hidden ="true"></span>AYUDA</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
<?php
if (ControlSesion::sesion_iniciada()) {
    ?>
                    <li><a href="<?php echo RUTA_PERFIL; ?>">   
                            <span class="glyphicon glyphicon-user" aria_hidden="true"></span>
                    <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a></li>                       
                    <li><a href="<?php echo RUTA_GESTOR; ?>">   
                            <span class="glyphicon glyphicon-th-large" aria_hidden="true"></span>Publicaciones
                        </a></li>                                      
                    <li><a href="<?php echo RUTA_LOGOUT; ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar sesión</a></li>
    <?php
} else {
    ?> 
                    <li><a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden ="true"></span>
                    <?php echo $total_propietarios; ?>

                        </a></li>
                    <li><a href="<?php echo RUTA_LOGIN ?>"><span class="glyphicon glyphicon-log-out" aria-hidden ="true"></span>INICIAR SESIÓN </a></li>
                    <li><a href="<?php echo RUTA_REGISTRO ?>"><span class="glyphicon glyphicon-plus" aria-hidden ="true"></span>REGISTROS</a></li>         
    <?php
}
?>

            </ul>
        </div>
    </div>

</nav>
