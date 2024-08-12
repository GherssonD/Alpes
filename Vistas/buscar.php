<?php
include_once 'app/EscritorEntradas.inc.php';

$busqueda = null;
$resultados = [];
$resultados_multiples = false;
$ordenar_por = null;
$buscar_titulo = false;
$buscar_texto = false;
$buscar_distrito = false;
$buscar_autor = false;
$entradas_por_titulo = [];
$entradas_por_texto = [];
$entradas_por_distrito = [];
$entradas_por_autor = [];

if (isset($_POST['buscar']) && isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
    $busqueda = $_POST['termino-buscar'];
    $resultados_multiples = false;

    conexion::abrir_conexion();
    $resultados = RepositorioEntrada::buscar_entradas_todos_los_campos(conexion::obtener_conexion(), $busqueda);
    conexion::cerrar_conexion();
}

if (isset($_POST['busqueda-avanzada']) && isset($_POST['campos'])) {
    if (in_array("titulo", $_POST['campos'])) {
        $buscar_titulo = true;
    }
    if (in_array("texto", $_POST['campos'])) {
        $buscar_texto = true;
    }
    if (in_array("distrito", $_POST['campos'])) {
        $buscar_distrito = true;
    }
    if (in_array("autor", $_POST['campos'])) {
        $buscar_autor = true;
    }

    $orden = ($_POST['fecha'] == "recientes") ? "DESC" : "ASC";

    if (isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
        $busqueda = $_POST['termino-buscar'];
        $resultados_multiples = true;

        conexion::abrir_conexion();
        if ($buscar_titulo) {
            $entradas_por_titulo = RepositorioEntrada::buscar_entradas_por_titulo(conexion::obtener_conexion(), $busqueda, $orden);
        }

        if ($buscar_texto) {
            $entradas_por_texto = RepositorioEntrada::buscar_entradas_por_texto(conexion::obtener_conexion(), $busqueda, $orden);
        }

        if ($buscar_distrito) {
            $entradas_por_distrito = RepositorioEntrada::buscar_entradas_por_distrito(conexion::obtener_conexion(), $busqueda, $orden);
        }

        if ($buscar_autor) {
            $entradas_por_autor = RepositorioEntrada::buscar_entradas_por_autor(conexion::obtener_conexion(), $busqueda, $orden);
        }
        
        conexion::cerrar_conexion();
        
        $ordenar_por = isset($_POST['fecha']) ? $_POST['fecha'] : null;
    }
}

$titulo = "Buscar en ALPES";

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h1 class="text-center">Buscar</h1>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                        <div class="form-group">
                            <input type="search" name="termino-buscar" class="form-control" placeholder="QUE BUSCAS" required value="<?php echo htmlspecialchars($busqueda); ?>">
                        </div>
                        <button type="submit" name="buscar" class="form-control btn btn-primary btn-buscar">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#avanzada">Busqueda Avanzada</a>
                    </h4>
                </div>
                <div id="avanzada" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo RUTA_BUSCAR; ?>">
                            <div class="form-group">
                                <input type="search" name="termino-buscar" class="form-control" placeholder="que buscas?" required value="<?php echo htmlspecialchars($busqueda); ?>">
                            </div>
                            <p>Buscar en los siguientes campos determinados</p>
                            <label class="checkbox inline"><input type="checkbox" name="campos[]" value="titulo" 
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_titulo) {
                                        echo "checked";
                                    }
                                } else {
                                    echo "checked";
                                }
                                ?> >Salon</label>
                            <label class="checkbox inline"><input type="checkbox" name="campos[]" value="texto"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_texto) {
                                        echo "checked";
                                    }
                                } else {
                                    echo "checked";
                                }
                                ?> >Direcciones</label>
                            <label class="checkbox inline"><input type="checkbox" name="campos[]" value="distrito"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_distrito) {
                                        echo "checked";
                                    }
                                } else {
                                    echo "checked";
                                }
                                ?> >NRO. Distrito</label>
                            <label class="checkbox inline"><input type="checkbox" name="campos[]" value="autor"
                                <?php
                                if (isset($_POST['busqueda-avanzada'])) {
                                    if ($buscar_autor) {
                                        echo "checked";
                                    }
                                }
                                ?>>Nombre de Propietario o Encargado</label>

                            <hr>
                            <p>Ordenar por</p>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="recientes"
                                <?php
                                if (isset($_POST['busqueda-avanzada']) && isset($orden) && $orden == 'DESC') {
                                    echo "checked";
                                }
                                if (!isset($_POST['busqueda-avanzada'])) {
                                    echo "checked";
                                }
                                ?>>Más grandes y populares
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="fecha" value="antiguas"
                                <?php
                                if (isset($_POST['busqueda-avanzada']) && isset($orden) && $orden == 'ASC') {
                                    echo "checked";
                                }
                                ?>>Entradas recientes
                            </label>
                            <hr>
                            <button type="submit" name="busqueda-avanzada" class="btn btn-primary btn-buscar">
                                Búsqueda avanzada
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="resultados">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Resultados</h1>
                <?php
                if (isset($_POST['buscar']) && count($resultados) > 0) {
                    ?> 
                    <small><?php echo count($resultados); ?></small>  
                    <?php
                }
                if (isset($_POST['busqueda-avanzada'])) {
                    $hay_resultados = count($entradas_por_titulo) > 0 ||
                        count($entradas_por_texto) > 0 ||
                        count($entradas_por_distrito) > 0 ||
                        count($entradas_por_autor) > 0;

                    if ($hay_resultados) {
                        $parametros = count($_POST['campos']);
                        $ancho_columnas = 12 / $parametros;
                        ?>
                        <div class="row">
                            <?php for ($i = 0; $i < $parametros; $i++) { ?>
                                <div class="<?php echo 'col-md-' . $ancho_columnas; ?> text-center">
                                    <h4><?php echo 'coincidencias en ' . htmlspecialchars($_POST['campos'][$i]); ?></h4>
                                    <br>
                                    <?php
                                    switch ($_POST['campos'][$i]) {
                                        case "titulo":
                                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_titulo);
                                            break;
                                        case "texto":
                                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_texto);
                                            break;
                                        case "distrito":
                                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_distrito);
                                            break;
                                        case "autor":
                                            EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_autor);
                                            break;
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                }
                if (count($resultados) > 0) {
                    if (!$resultados_multiples) {
                        EscritorEntradas::mostrar_entradas_busqueda($resultados);
                    } else {
                        ?>
                        <div class="row">
                            <?php
                            $parametros = isset($_POST['campos']) ? count($_POST['campos']) : 0;
                            $ancho_columnas = $parametros > 0 ? 12 / $parametros : 12;
                            for ($i = 0; $i < $parametros; $i++) {
                                ?>
                                <div class="<?php echo 'col-md-' . $ancho_columnas; ?> text-center">
                                    <h4><?php echo 'coincidencias en ' . htmlspecialchars($_POST['campos'][$i]); ?></h4>
                                    <br>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <h3>Sin coincidencias</h3>
                    <br>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
