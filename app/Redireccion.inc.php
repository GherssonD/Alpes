<?php

class Redireccion {
    public static function redirigir($url){   //unique resource location
        header('Location:'. $url, true,301);//502
        exit();
    }
}
