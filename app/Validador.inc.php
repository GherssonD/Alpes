<?php

abstract class Validador {

    protected $aviso_inicio;
    protected $aviso_cierre;
    protected $titulo;
    protected $url;
    protected $texto;
    protected $telefono;
    protected $distrito;
    protected $capacidad;
    protected $Imagen;
    protected $error_titulo;
    protected $error_url;
    protected $error_texto;
    protected $error_telefono;
    protected $error_distrito;
    protected $error_capacidad;
    protected $error_Imagen;

    function __construct() {
        
    }

    protected function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    protected function validar_titulo($conexion, $titulo) {
        if (!$this->variable_iniciada($titulo)) {
            return "Debes escribir el nombre del salon";
        } else {
            $this->titulo = $titulo;
        }
        if (strlen($titulo) > 255) {
            return "El titulo no puede ocupar más de 15 caracteres";
        }
        if (RepositorioEntrada :: titulo_existe($conexion, $titulo)) {
            return "Ya existe otro con el mismo nombre, por favor introdusca otro";
        }
    }

    protected function validar_url($conexion, $url) {
        if (!$this->variable_iniciada($url)) {
            return "Inserta un url correcto";
        } else {
            $this->url = $url;
        }

        $url_tratada = str_replace(' ', '', $url);
        $url_tratada = preg_replace('/\s+/', '', $url_tratada);

        if (strlen($url) != strlen($url_tratada)) { //para que no tenga espacios
            return "laurl no puede contener espacios vacios";
        }

        if (RepositorioEntrada :: url_existe($conexion, $url)) {
            return "ya existe otro artículo con el mismo url, elige otro";
        }
    }

    protected function validar_texto($conexion, $texto) {
        if (!$this->variable_iniciada($texto)) {
            return "campo obligatorio";
        } else {
            $this->texto = $texto;
        }
    }

    protected function validar_telefono($conexion, $telefono) {
        if (!$this->variable_iniciada($telefono)) {
            return "campo obligatorio";
        } else {
            $this->telefono = $telefono;
        }
    }

    protected function validar_distrito($conexion, $distrito) {
        if (!$this->variable_iniciada($distrito)) {
            return "campo obligatorio";
        } else {
            $this->distrito = $distrito;
        }
    }
    
    protected function validar_capacidad($conexion, $capacidad) {
        if (!$this->variable_iniciada($capacidad)) {
            return "campo obligatorio";
        } else {
            $this->capacidad = $capacidad;
        }
    }
    

    protected function validar_Imagen($conexion, $Imagen) {
        if (!$this->variable_iniciada($Imagen)) {
            return "necesita otro formato";
        } else {
            $this->Imagen = $Imagen;
        }
    }

    public function obtener_titulo() {
        return $this->titulo;
    }

    public function obtener_url() {
        return $this->url;
    }

    public function obtener_texto() {
        return $this->texto;
    }

    public function obtener_telefono() {
        return $this->telefono;
    }

    public function obtener_distrito() {
        return $this->distrito;
    }
    
    public function obtener_capacidad() {
        return $this->capacidad;
    }


    public function obtener_Imagen() {
        return $this->Imagen;
    }

    public function mostrar_titulo() {
        if ($this->titulo != "") {
            echo 'value = "' . $this->titulo . '"';
        }
    }

    public function mostrar_url() {
        if ($this->url != "") {
            echo 'value = "' . $this->url . '"';
        }
    }

    public function mostrar_texto() {
        if ($this->texto != "" && strlen(trim($this->texto)) > 0) {
            echo $this->texto;
        }
    }

    public function mostrar_telefono() {
        if (!$this->telefono != "") {
            echo 'value = "' . $this->telefono . '"';
        }
    }

    public function mostrar_distrito() {
        if (!$this->distrito != "") {
            echo 'value = "' . $this->distrito . '"';
        }
    }
    
    public function mostrar_capacidad() {
        if (!$this->capacidad != "") {
            echo 'value = "' . $this->capacidad . '"';
        }
    }
    

    public function mostrar_Imagen() {
        if (!$this->Imagen != "") {
            echo 'value = "' . $this->Imagen . '"';
        }
    }

    public function mostrar_error_titulo() {
        if ($this->error_titulo != "") {
            echo $this->aviso_inicio . $this->error_titulo . $this->aviso_cierre;
        }
    }

    public function mostrar_error_url() {
        if ($this->error_url != "") {
            echo $this->aviso_inicio . $this->error_url . $this->aviso_cierre;
        }
    }

    public function mostrar_error_texto() {
        if ($this->error_texto != "") {
            echo $this->aviso_inicio . $this->error_texto . $this->aviso_cierre;
        }
    }

    public function mostrar_error_telefono() {
        if ($this->error_telefono != "") {
            echo $this->aviso_inicio . $this->error_telefono . $this->aviso_cierre;
        }
    }

    public function mostrar_error_distrito() {
        if ($this->error_distrito != "") {
            echo $this->aviso_inicio . $this->error_distrito . $this->aviso_cierre;
        }
    }
    
    public function mostrar_error_capacidad() {
        if ($this->error_capacidad != "") {
            echo $this->aviso_inicio . $this->error_capacidad . $this->aviso_cierre;
        }
    }


    public function mostrar_error_Imagen() {
        if ($this->error_Imagen != "") {
            echo $this->aviso_inicio . $this->error_Imagen . $this->aviso_cierre;
        }
    }

    public function entrada_valida() {
        if ($this->error_titulo == "" && $this->error_url == "" && $this->error_texto == "" &&
                $this->error_telefono == "" && $this->error_distrito == "" && $this->error_capacidad
                 == "" && $this->error_Imagen == "") {
            return true;
        } else {
            return false;
        }
    }
}
