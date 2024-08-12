<?php

include_once 'app/conexion.inc.php';
include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/EscritorEntradas.inc.php';
$titulo = 'ASOCIACION ALPES';

include_once 'plantillas/declaración.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1>SALONES DE EVENTOS SOCIALES ALPES</h1>
        <p> Donde se realizan cualquier tipo eventos sociales y otros tipos servicios</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> BÚSQUEDA
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role ="form" method="post" action="<?php echo RUTA_BUSCAR;?>">
                                <div class="form-group">
                                    <input type="search" name="termino-buscar" class="form-control" placeholder="QUE BUSCAS">
                                </div>
                                <button type="submit" name="buscar" class="form-control btn btn-primary">buscar</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>Filtro
                        </div> 
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Archivo
                        </div> 
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <?php 
            EscritorEntradas :: escribir_entradas();
            ?>
        </div>    
    </div>
</div>


