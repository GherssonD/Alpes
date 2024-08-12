<?php 

class entrada {
    
    private $id;
    private $autor_id;
    private $url;
    private $titulo;
    private $texto;
    private $telefono;
    private $distrito;
    private $capacidad;
    private $fecha;
    private $activa;
    private $Imagen;


    public function __construct($id, $autor_id, $url, $titulo, $texto, $telefono, $distrito, $capacidad, $fecha, $activa, $Imagen){
        $this -> id = $id;
        $this -> autor_id = $autor_id;
        $this -> url = $url;
        $this -> titulo = $titulo;
        $this -> texto = $texto;
        $this -> telefono = $telefono;
        $this -> distrito = $distrito;
        $this -> capacidad = $capacidad;
        $this -> fecha = $fecha;
        $this -> activa = $activa; 
        $this -> Imagen = $Imagen;
        
    }
    
    public function obtener_id(){
        return $this -> id;
    }
    
    public function obtener_autor_id(){
        return $this -> autor_id;
    }
     public function obtener_url(){
        return $this -> url;
    } 
    
    public function obtener_titulo(){
        return $this -> titulo;
    }
    
    public function obtener_texto(){
        return $this -> texto;
    }
    public function obtener_telefono(){
        return $this -> telefono;
    }
    
    public function obtener_distrito(){
        return $this -> distrito;
    }
    
    public function obtener_capacidad(){
        return $this -> capacidad;
    }
    
    public function obtener_fecha(){
        return $this -> fecha;
    }
    
    public function esta_activa(){
        return $this -> activa;
    }
    public function obtener_Imagen(){
        return $this -> Imagen;
    }
    
     public function cambiar_url($url){
        $this -> url = $url;
    }
    
    
    public function cambiar_titulo($titulo){
        $this -> titulo = $titulo;
    }
    
    public function cambiar_texto($texto){
        $this -> texto = $texto;
    }
    public function cambiar_telefono($telefono){
        $this -> telefono = $telefono;
    }
    
     public function cambiar_distrito($distrito){
        $this -> distrito = $distrito;
    }
    public function cambiar_capacidad($capacidad){
        $this -> distrito = $capacidad;
    }
    
    
    public function cambiar_activa($activa){
        $this -> activa = $activa;
    }   
    public function cambiar_Imagen($Imagen){
        $this -> Imagen = $Imagen;
    }  
}
