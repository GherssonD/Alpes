<?php 
        
include_once 'app/EscritorEntradas.inc.php';
?>


<div class="row">
    <div class="col-md-12">
        <hr><!-- comment -->
        <h3>Otros Salones disponibles de la ciudad ALTEÑA</h3>
    </div>
    <?php 
        for ($i = 0; $i < count($entrada_al_azar); $i++){
            $entrada_actual = $entrada_al_azar[$i];
        
    ?>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><p class="text-center">
                <?php echo $entrada_actual -> obtener_titulo();  ?>
            </div>
            <div class="pael-body">
                <p>
                    Disponible en distrito 
                    <?php echo $entrada_actual -> obtener_distrito();  ?> Con capacidad de <?php  echo $entrada_actual -> obtener_capacidad(); ?> personas.
                    <br>
                    Contactos
                    <?php echo $entrada_actual -> obtener_telefono();  ?>
                    <br>
                    Detalle General
                    <img src="<?php echo $entrada_actual -> obtener_Imagen();  ?>">
                    
                    <?php EscritorEntradas::resumir_texto(nl2br($entrada_actual -> obtener_texto())); ?>
                    
                    <div class="text-center">
                            <button type="submit" name="Mas referencias" class="form-control btn btn-primary btn-seguir leyendo" >
                            <a href="<?php echo RUTA_ENTRADA . '/' . $entrada->obtener_url() ?>" role="button">Mas referencias</a></button>
                        </div>
                </p>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div class="col-md-12">
        <hr>
    </div>
</div>
