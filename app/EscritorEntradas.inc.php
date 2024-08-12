<?php
include_once 'app/conexion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/entrada.inc.php';

class EscritorEntradas {
    
    public static function escribir_entradas() {
        $entradas = RepositorioEntrada::obtener_todas_por_fecha_descendente(conexion::obtener_conexion());

        if (count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribir_entrada($entrada);
            }
        }
    }
    
    public static function escribir_entrada($entrada) {
    if (!isset($entrada)) {
        return;
    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>SALON DE EVENTO <?php echo htmlspecialchars($entrada->obtener_titulo()); ?></h4>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>
                            <h4>Salon de Evento Ubicado en el Distrito Nro. <?php echo htmlspecialchars($entrada->obtener_distrito()); ?></h4>
                        </strong>
                        
                        <strong>
                            <h4>También el salon de evento socia tiene una capacidad de <?php echo htmlspecialchars($entrada->obtener_capacidad()); ?> de personas</h4>
                        </strong>
                        
                        <strong>
                            <h4>Contactos disponibles al <?php echo htmlspecialchars($entrada->obtener_telefono()); ?></h4>
                        </strong>
                        <br>
                        
                        <?php
                        $imagen_base64 = $entrada->obtener_Imagen(); // Asegúrate de que devuelve la cadena Base64 completa
                        ?>
                        <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($imagen_base64); ?>" alt="Imagen">
                    </p>
                    <div class="text-center">
                        <button type="submit" name="seguir leyendo" class="form-control btn btn-primary btn-seguir leyendo">
                        <a href="<?php echo htmlspecialchars(RUTA_ENTRADA . '/' . $entrada->obtener_url()); ?>" role="button">Mas Información</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}



    public static function mostrar_entradas_busqueda($entradas) {
        for ($i = 1; $i <= count($entradas); $i++) {
            if ($i % 3 == 0) {
                ?> <div class="row">   <?php
                }
                $entrada = $entradas[$i - 1];
                self::mostrar_entrada_busqueda($entrada);

                if ($i % 3 == 0) {
                    ?> </div>   <?php
            }
        }
    }
    
    public static function mostrar_entradas_busqueda_multiple($entradas) {
        for ($i = 0; $i < count($entradas); $i++) {
            
                ?> <div class="row">   <?php               
                $entrada = $entradas[$i];
                self::mostrar_entrada_busqueda_multiple($entrada);
                    ?> </div>   <?php
        }
    }

    public static function mostrar_entrada_busqueda($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    echo $entrada->obtener_titulo();
                    ?>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>
                            <h4>Contactos disponibles al <?php echo htmlspecialchars($entrada->obtener_telefono()); ?></h4>
                        </strong>
                        
                        <strong>
                            <h4>Que se encuentra en el distrito <?php echo htmlspecialchars($entrada->obtener_distrito()); ?></h4>
                        </strong>
                         
                        <strong>
                            <h4>que soporta a unos <?php echo htmlspecialchars($entrada->obtener_capacidad()); ?> personas</h4>
                        </strong>
                    </p>
                    <div class="text-center">
                        <a class="btn-primary" href="<?php echo RUTA_ENTRADA . '/' . $entrada->obtener_url() ?>" role="button">Seguir leyendo</a>
                    </div>



                </div>
            </div>
        </div>

        <?php
    }
    
    public static function mostrar_entrada_busqueda_multiple($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    echo $entrada->obtener_titulo();
                    ?>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>
                            <h4>Contactos disponibles al <?php echo htmlspecialchars($entrada->obtener_telefono()); ?></h4>
                        </strong>
                        
                        <strong>
                            <h4>Que se encuentra en el distrito <?php echo htmlspecialchars($entrada->obtener_distrito()); ?></h4>
                        </strong>
                         
                        <strong>
                            <h4>que soporta a unos <?php echo htmlspecialchars($entrada->obtener_capacidad()); ?> personas</h4>
                        </strong>
                    </p>
                    <div class="text-center">
                        <a class="btn-primary" href="<?php echo RUTA_ENTRADA . '/' . $entrada->obtener_url() ?>" role="button">Seguir leyendo</a>
                    </div>



                </div>
            </div>
        </div>

        <?php
    }
    

    public static function resumir_texto($texto) {
        $longitud_maxima = 400;

        $resultado = '';

        if (strlen($texto) >= $longitud_maxima) {
            $resultado = substr($texto, 0, $longitud_maxima);

            //$resultado . = '...' ;
        } else {
            $resultado = $texto;
        }
        return $resultado;
    }
    
    
    
    
}
