<input type="hidden" id="id-entrada" name="id-entrada" value="<?php echo $id_entrada; ?>"> 
<div class="form-group">
    <label for="titulo">Nombre de Salon</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php  echo $validador -> obtener_titulo();?>">
    <input type="hidden" id="titulo-original" name="tittulo-original" value="<?php $entrada_recuperada -> obtener_titulo(); ?>">    
</div>
<?php  $validador -> mostrar_error_titulo();  ?>
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="Dirrecion unica sin espacios para la entrada"
          value="<?php  echo $validador -> obtener_url();?>" >
    <input type="hidden" id="url-original" name="url-original" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
</div>
<?php  $validador -> mostrar_error_url();  ?>
<div class="form-group">
    <label for="contenido">Contactos y Referencias</label>
    <input type="text" class="form-control" id="texto" name="texto" value="value="<?php  echo $validador -> obtener_texto();?>">
    <input type="hidden" id="texto-original" name="texto-original" value="<?php echo $entrada_recuperada -> obtener_texto(); ?>">
</div>
<?php  $validador -> mostrar_error_texto();  ?>

<div class = "form-group">
    <label for = "telefono">Telefonos o Celulares</label>
    <input type = "text" class = "form-control"  placeholder = "+591" name="telefono" id="telefono"
           value="<?php  echo $validador -> obtener_telefono();?>">
           <input type="hidden" id="telefonos-original" name="telefonos-original" value="<?php echo $entrada_recuperada -> obtener_telefono(); ?>">
</div>
<?php  $validador -> mostrar_error_telefono();  ?>

<div class = "form-group">
    <label for = "distrito">Número de distrito</label>
    <input type = "text" class = "form-control"  placeholder = "nuemro de distrito" name="distrito" id="distrito"
           value="<?php  echo $validador -> obtener_distrito();?>">
           <input type="hidden" id="distrito-original" name="distrito-original" value="<?php echo $entrada_recuperada -> obtener_distrito(); ?>">
</div>
<?php  $validador -> mostrar_error_distrito();  ?>

<div class = "form-group">
    <label for = "capacidad">Capacidad de personas de tu Salón de evento</label>
    <input type = "text" class = "form-control"  placeholder = "nuemro de personas maxima" name="capacidad" id="capacidad"
           value="<?php  echo $validador -> obtener_capacidad();?>">
           <input type="hidden" id="capacidad-original" name="capacidad-original" value="<?php echo $entrada_recuperada -> obtener_capacidad(); ?>">
</div>
<?php  $validador -> mostrar_error_capacidad();  ?>


<div class="form-group">
    <label for="archivo_subido" id="label-archivo">INSERTA UNA IMAGEN</label>
    <input type="file" name="archivo_subido" id="archivo_subido"  class="boton_subir">
    <input type="hidden" id="imagen-original" name="imagne-original" value="<?php echo $entrada_recuperada -> obtener_Imagen(); ?>">
</div>
<?php  $validador -> mostrar_error_Imagen();  ?>
<div class = "checkbox">
    <label>
        <input type = "checkbox" name="publicar" value = "si" 
            <?php  if ($validador -> obtener_checkbox()) echo 'checked'; ?>>Marcar para publicar la descripcion
        <input type="hidden" id="publicar-original" name="publicar-original" value="
            <?php echo $entrada_recuperada -> obtener_imagen();; ?>">
    </label>
</div>
<br>
<button type = "submit" class = "btn btn-warning" name="guardar_cambios_entrada">Guardar Datos</button>
CRUD CREATE READ UPDATE DELETE


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
                DIRECTORIO_RAIZ. "/Subidas/".$usuario->obtener_id())){
            echo "el archivo". basename($_FILES['archivo_subido']['name'])."ha sido subido.";
        }else{
            echo "Ha ocurrido un error.";
        }
    }
}

