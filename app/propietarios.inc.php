<?php

class Usuario {

    private $id;
    private $nombre;
    private $email;

    private $password;
    private $fecha_registro;
    private $activo;

    
    public function __construct($id, $nombre, $email,  $password, $fecha_registro, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
    }

    public function obtener_Id() {
        return $this->id;
    }

    public function obtener_Nombre() {
        return $this->nombre;
    }
     public function obtener_Email() {
        return $this->email;
    }
    
   

    public function obtener_password() {
        return $this->password;
    }


    public function obtener_Fecha_Registro() {
        return $this->fecha_registro;
    }

    public function obtener_Activo() {
        return $this->activo;
    }

    public function cambiar_Nombre($nombre) {
        $this->nombre = $nombre;
    }


    public function cambiar_Email($email) {
        $this->email = $email;
    }

    

    public function cambiar_Password($password) {
        $this->password = $password;
    }

    public function cambiar_Activo($activo) {
        $this->activo = $activo;
    }
}
