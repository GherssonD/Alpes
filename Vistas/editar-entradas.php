<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/ValidadorEntradaEditada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

conexion :: abrir_conexion();

if(isset($_POST['guardar_cambios_entrada'])){
    $entrada_publica_nueva = 0;
    if(isset($_POST['publicar']) && $_POST['publicar'] == "si"){
        $entrada_publica_nueva = 1;
    }
    
    $validador = new ValidadorEntradaEditada($_POST['titulo'], $_POST['titulo-original'], $_POST['url'], $_POST['url-original'],
            htmlspecialchars($_POST['texto']), $_POST['texto-original'], $_POST['telefono'], $_POST['telefono-original'],$_POST['distrito'],
            $_POST['distrito-original'],$_POST['capacidad'], $_POST['capacidad-original'], $_POST['Imagen'], $_POST['Imagen-original'], $entrada_publica_nueva, $_POST['publicar-original'], conexion :: obtener_conexion());
    
    if(!$validador -> hay_cambios()){
       Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS);
    }else{
        if($validador -> entrada_valida()){
            $cambio_efectuado = RepositorioEntrada :: actualizar_entrada(conexion :: obtener_conexion(),
                    $_POST['id-entrada'], $validador -> obtener_titulo(), $validador -> obtener_url(),
                    $validador -> obtener_texto(), $validador -> obtener_telefono(), 
                    $validador -> obtener_distrito(), $validador -> obtener_capacidad(), $validador -> 
                    obtener_Imagen(), $validador -> obtener_checkbox());
            if($cambio_efectuado){
                //echo 'DATOS GUARDADOS';
                 Redireccion :: redirigir(RUTA_GESTOR_ENTRADAS);
            }
        }
    }
    
}


$titulo = "Editar entrada";

include_once 'plantillas/declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Editar entrada</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada" method="post" action="<?php  echo RUTA_EDITAR_ENTRADA; ?>">
                <?php  
                   if(isset($_POST['editar_entrada'])){
                       $id_entrada = $_POST['id_editar'];
                       
                       conexion::abrir_conexion();
                       
                       $entrada_recuperada = RepositorioEntrada :: obtener_entrada_por_id(conexion::obtener_conexion(), $id_entrada);
                       
                       include_once 'plantillas/form_entrada_recuperada.inc.php';
                       
                       conexion::cerrar_conexion();
                   }else if(isset ($_POST['guardar_cambios_entrada'])){
                       $id_entrada = $_POST['id-entrada'];
                       
                       include_once 'plantillas/form_entrada_recuperada_validada.inc.php';
                   }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/cierre.inc.php';
?>