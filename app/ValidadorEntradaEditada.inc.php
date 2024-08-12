<?php

include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntradaEditada extends validador {

    private $cambios_realizados;
    
    private $checkbox;
    
    private $titulo_original;
    private $url_original;
    private $texto_original;
    private $telefono_original;
    private $distrito_original;
    private $capacidad_original;
    private $Imagen_original;
    private $checkbox_original;

    public function __construct($titulo, $titulo_original, $url, $url_original, $texto, $texto_orignal, $telefono,
            $telefono_original, $distrito, $distrito_original, $capacidad, $capacidad_original, $Imagen, $Imagen_original, $checkbox, $checkbox_original, $conexion) {

        $this->titulo = $this->devolver_variable_si_iniciada($titulo);
        $this->titulo_original = $this->devolver_variable_si_iniciada($titulo_original);
        $this->url = $this->devolver_variable_si_iniciada($url);
        $this->url_original = $this->devolver_variable_si_iniciada($url_original);
        $this->texto = $this->devolver_variable_si_iniciada($texto);
        $this->texto_original = $this->devolver_variable_si_iniciada($texto_orignal);
        $this->telefono = $this->devolver_variable_si_iniciada($telefono);
        $this->telefono_original = $this->devolver_variable_si_iniciada($telefono_original);
        $this->distrito = $this->devolver_variable_si_iniciada($distrito);
        $this->distrito_original = $this->devolver_variable_si_iniciada($distrito_original);
        $this->capacidad = $this->devolver_variable_si_iniciada($capacidad);
        $this->capacidad_original = $this->devolver_variable_si_iniciada($capacidad_original);
        $this->Imagen = $this->devolver_variable_si_iniciada($Imagen);
        $this->Imagen_original = $this->devolver_variable_si_iniciada($Imagen_original);
        $this->checkbox = $this->devolver_variable_si_iniciada($checkbox);
        $this->checkbox_original = $this->devolver_variable_si_iniciada($checkbox_original);

        if ($this->titulo == $this->titulo_original &&
                $this->url == $this->url_original &&
                $this->texto == $this->texto_original &&
                $this->telefono == $this->telefono_original &&
                $this->distrito == $this->distrito_original &&
                $this->capacidad == $this->capacidad_original &&
                $this->Imagen == $this->Imagen_original &&
                $this->checkbox == $this->checkbox_original) {
            $this->cambios_realizados = false;
        } else {
            $this->cambios_realizados = true;
        }

        if ($this->cambios_realizados) {
            echo 'Hay cambios';

            $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
            $this->aviso_cierre = "</div>";
            
            if($this -> titulo !== $this -> titulo_original){
                $this -> error_titulo = $this -> validar_titulo($conexion, $this -> titulo);
            }else{
                $this -> error_titulo = "";
            }
             if($this -> url !== $this -> url_original){
                $this -> error_url = $this -> validar_url($conexion, $this -> url);
            }else{
                $this -> error_url = "";
            }
             if($this -> texto !== $this -> texto_original){
                $this -> error_texto = $this -> validar_texto($conexion, $this -> texto);
            }else{
                $this -> error_texto = "";
            }
             if($this -> telefono !== $this -> telefono_original){
                $this -> error_telefono = $this -> validar_telefono($conexion, $this -> telefono);
            }else{
                $this -> error_telefono = "";
            }
            if($this -> distrito !== $this -> distrito_original){
                $this -> error_distrito = $this -> validar_distrito($conexion, $this -> distrito);
            }else{
                $this -> error_distrito = "";
            }
            if($this -> capacidad !== $this -> capacidad_original){
                $this -> error_capacidad = $this -> validar_capacidad($conexion, $this -> capacidad);
            }else{
                $this -> error_capacidad = "";
            }
            
             if($this -> Imagen !== $this -> Imagen_original){
                $this -> error_Imagen = $this -> validar_Imagen($conexion, $this -> Imagen);
            }else{
                $this -> error_Imagen = "";
            }
        } else {
            echo 'No hay cambios';
            //se redirigen 
        }
    }

    private function devolver_variable_si_iniciada($variable) {
        if ($this->variable_iniciada($variable)) {
            return $variable;
        } else {
            return "";
        }
    }
    public function hay_cambios() {
        return $this -> cambios_realizados;
    }
    
    public function obtener_titulo_original() {
        return $this -> titulo_original;
    }
    
    public function obtener_url_original() {
        return $this -> url_original;
    }
    
    public function obtener_texto_original() {
        return $this -> texto_original;
    }
    
    public function obtener_telefono_original() {
        return $this -> telefono_original;
    }
    
    public function obtener_distrito_original() {
        return $this -> distrito_original;
    }
    
    public function obtener_capacidad_original() {
        return $this -> capacidad_original;
    }
    
    public function obtener_Imagen_original() {
        return $this -> Imagen_original;
    }
    
    public function obtener_checkbox_original() {
        return $this -> checkbox_original;
    }
    
    public function obtener_checkbox() {
        return $this -> checkbox;
    }
}
