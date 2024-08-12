<?php

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/salon.inc.php';

class RepositorioSalones {
    
    public static function insertar_salones($conexion, $salones){
        $salones_insertada = false;
        
        if(isset($conexion)){
            try{
                $sql = 'INSERT INTO salones (nombre_de_salon, caracteristicas, telefonos, direccion, otros) VALUES(:nombre_de_salon, :caracteristicas, :telefonos, :direccion, :otros, NOW(), 0)';
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':nombre_de_salon', $salones -> obtener_nombre_de_salon(), PDO::PARAM_STR);
                $sentencia -> bindParam(':caracteristicas', $salones -> obtener_caracteristicas(), PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $salones -> obtener_telefono(), PDO::PARAM_STR);
                $sentencia -> bindParam(':direccion', $salones -> obtener_direccion(), PDO::PARAM_STR);
                $sentencia -> bindParam(':otros', $salones -> obtener_otros(), PDO::PARAM_STR);
                
                $salones_insertada = $sentencia -> execute();
                
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();

            }
        }
        return $salones_insertada;
    }
}

