<?php 

class salones {
    
    private $id;
    private $nombre_de_salon;
    private $caracteristicas;
    private $telefonos;
    private $direccion;
    private $otros;
    
    public function __construct($id, $nombre_de_salon, $caracteristicas, $telefonos, $direccion, $otros){
        $this -> id = $id;
        $this -> autor_id = $nombre_de_salon;
        $this -> titulo = $caracteristicas;
        $this -> texto = $telefonos;
        $this -> fecha = $direccion;
        $this -> activa = $otros; 
        
    }
    
    public function obtener_id(){
        return $this -> id;
    }
    
    public function obtener_nombre_de_salon(){
        return $this -> nombre_de_salon;
    }
    
    public function obtener_caracteristicas(){
        return $this -> caracteristicas;
    }
    
    public function obtener_telefonos(){
        return $this -> telefonos;
    }
    
    public function obtener_direccion(){
        return $this -> direccion;
    }
    
    public function obtener_otros(){
        return $this -> otros;
    }
    
    public function cambiar_nombre_de_salon($nombre_de_salon){
        $this -> titulo = $nombre_de_salon;
    }
    
    public function cambiar_caracteristicas($caracteristicas){
        $this -> texto = $caracteristicas;
    }
    
    public function cambiar_telefono($telefono){
        $this -> activa = $telefono;
    }   
    
    public function cambiar_direccion($direccion){
        $this -> activa = $direccion;
    }
}
