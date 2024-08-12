<div class="form-group">
    <label for="titulo">Nombre de Salon</label>
    <input type="text" class="form-control" id="titulo" name="titulo"
           <?php $validador -> mostrar_titulo();  ?> >
    <?php  $validador -> mostrar_error_titulo(); ?>
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url"
            <?php $validador -> mostrar_url(); ?> ><!-- comment -->
    <?php   $validador -> mostrar_error_url() ?>
</div>
<div class="form-group">
    <label for="contenido">Contactos y Referencias</label>
    <input type="text" class="form-control" id="texto" name="texto"
                <?php echo $validador -> mostrar_texto(); ?> ><!-- comment -->
    <?php $validador -> mostrar_error_texto() ?>
</div>

<div class = "form-group">
    <label for = "telefono">Telefonos o Celulares</label>
    <input type = "text" class = "form-control" placeholder = "+591" name="telefono" id="telefono"
           <?php $validador -> mostrar_telefono(); ?> ><!-- comment -->
    <?php  $validador -> mostrar_error_telefono() ?>
</div>

<div class = "form-group">
    <label for = "distrito">Nro de Distrito</label>
    <input type = "text" class = "form-control" placeholder = "nro de distrito" name="distrito" id="distrito"
           <?php $validador -> mostrar_distrito(); ?> ><!-- comment -->
    <?php  $validador -> mostrar_error_distrito() ?>
</div>

<div class = "form-group">
    <label for = "distrito">Capacidad de invitados de tu Salón</label>
    <input type = "text" class = "form-control" placeholder = "nro de invitados maximo" name="capacidad" id="capacidad"
           <?php $validador -> mostrar_capacidad(); ?> ><!-- comment -->
    <?php  $validador -> mostrar_error_capacidad() ?>
</div>


<div class="form-group">
    <label for="archivo_subido" id="label-archivo">INSERTA UNA IMAGEN</label>
    <input type="file" name="archivo_subido" id="archivo_subido"  class="boton_subir" name="Imagen" id="Imagen">
     
</div>

<div class = "checkbox">
    <label>
        <input type = "checkbox" name="publicar" value = "si"
               <?php if($entrada_publica) echo 'checked'; ?> 
               >Marcar para publicar la descripcion
    </label>
</div>
<br>
<button type = "submit" class = "btn btn-warning" name="guardar">Guardar Datos</button>



<?php

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
                DIRECTORIO_RAIZ. "/subidas/".$usuario->obtener_id())){
            echo "el archivo". basename($_FILES['archivo_subido']['name'])."ha sido subido.";
        }else{
            echo "Ha ocurrido un error.";
        }
    }
}


