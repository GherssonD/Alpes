<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified:". gmdate("D,d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/conexion.inc.php';
include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/ControlSesion.inc.php';

if (!controlsesion :: sesion_iniciada()) {
    Redireccion :: redirigir(SERVIDOR);
} else {
    conexion :: abrir_conexion();
    $id = $_SESSION['id_usuario'];
    $usuario = RepositorioPropietarios :: obtener_usuario_por_id(conexion::obtener_conexion(), $id);
}
if(isset($_POST['guardar_imagen']) && !empty($_FILES['archivo_subido']['tmp_name'])){
    $directorio = DIRECTORIO_RAIZ. "/Subidas/";
    $carpeta_objetivo = $directorio.basename($_FILES['archivo_subido']['name']);
    $subida_correcta= 1;
    $tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);
    
    $comprobacion = getimagesize($_FILES['archivo_subido']['tmp_name']);
    if($comprobacion !== false) {
        $subida_correcta = 1;
    }else{
        $subida_correcta = 0;
    }
    if($_FILES['archivo_subido']['size']>500000){
        echo "El archivo no puede ocupar más de 500kb";
        $subida_correcta = 0;
    }
    if($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg"  && $tipo_imagen != "gif"){
        echo "solo se admiten los formatos JPG, JPEG, PNG Y GIF";
        $subida_correcta = 0;
    }
    if ($subida_correcta == 0){
        echo "No se pudo subir";
    }else{
        if(move_uploaded_file($_FILES['archivo_subido']['tmp_name'], 
                DIRECTORIO_RAIZ. "/Subidas/".$usuario->obtener_id())){
            echo "el archivo". basename($_FILES['archivo_subido']['name'])."ha sido subido.";
        }else{
            echo "Ha ocurrido un error.";
        }
    }
}
$titulo = "Perfil de Usuario";

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container perfil">
    <div class="row">
        <div class="col-md-3">  
            <?php 
                if(file_exists(DIRECTORIO_RAIZ. "/Subidas/". $usuario->obtener_id())){
                    ?>  
            <img src="<?php echo SERVIDOR.'/Subidas/'. $usuario->obtener_id(); ?>" class="img-responsive">
                    <?php
                }else{
                    ?>  
            <img src="img/user.svg" class="img-responsive">
                    <?php
                }
                    
                    ?>
            <img src="img/perfil.png" 
                 width="500"
                 height="250" 
                 class="img-responsive"><!-- comment -->
            
            <br>
            <form class="text-center" action="<?php echo RUTA_PERFIL; ?>" method="post" 
                  enctype="multipart/form-data">
                <label for="archivo_subido" id="label-archivo">INSERTA UNA IMAGEN</label>
                <input type="file" name="archivo_subido" id="archivo_subido"  class="boton_subir">
                <br><!-- comment -->
                <br>
                <input type="submit" value="Guardar" name="guardar_imagen" class="form-control">

            </form>
        </div>
        <div class="col-md-9">     
            <h4><small>Nombre de Usuario </small></h4>
            <h4><?php echo $usuario->obtener_nombre(); ?></h4>
            <br>
            <h4><small>Correo Electronico </small></h4>
            <h4><?php echo $usuario->obtener_email(); ?></h4>
            <br>
            <h4><small>Fecha de Registro </small></h4>
            <h4><?php echo $usuario->obtener_fecha_registro(); ?></h4>
        </div>
    </div>
</div>


<?php
include_once 'plantillas/cierre.inc.php';
