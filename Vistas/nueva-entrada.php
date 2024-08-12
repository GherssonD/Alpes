<?php
include_once 'app/conexion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/config.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/ValidadorEntrada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

$entrada_publica = 0;
if (isset($_POST['guardar'])) {
    conexion::abrir_conexion();

    // Usar operador de fusión de null para manejar campos opcionales
    $validador = new ValidadorEntrada(
        $_POST['titulo'] ?? '',
        $_POST['url'] ?? '',
        htmlspecialchars($_POST['texto'] ?? ''),
        $_POST['telefono'] ?? '',
        $_POST['distrito'] ?? '',
        $_POST['capacidad'] ?? '',
        $_POST['Imagen'] ?? '', // Manejar caso en que 'Imagen' no está definido
        conexion::obtener_conexion()
    );

    if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
        $entrada_publica = 1;
    }

    if ($validador->entrada_valida()) {
        if (ControlSesion::sesion_iniciada()) {
            $entrada = new Entrada(
                '', 
                $_SESSION['id_usuario'], 
                $validador->obtener_url(), 
                $validador->obtener_titulo(),
                $validador->obtener_texto(), 
                $validador->obtener_telefono(), 
                $validador->obtener_distrito(), 
                $validador->obtener_capacidad(),
                $validador->obtener_Imagen(), 
                '', 
                $entrada_publica
            );

            $entrada_insertada = RepositorioEntrada::insertar_entrada(conexion::obtener_conexion(), $entrada);
            if ($entrada_insertada) {
                Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
            }
        } else {
            Redireccion::redirigir(RUTA_LOGIN);
        }
        conexion::cerrar_conexion();
    }
}

$titulo = "Nueva entrada del alpes";

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumotron">
        <h1 class="text-center">Datos Generales</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada" method="post" action="<?php echo RUTA_NUEVA_ENTRADA; ?>">
                <?php  
                    if (isset($_POST['guardar'])) {
                        include_once 'plantillas/form_nueva_entrada_validado.inc.php';
                    } else {
                        include_once 'plantillas/form_nueva_entrada_vacio.inc.php';
                    }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/cierre.inc.php';
?>
