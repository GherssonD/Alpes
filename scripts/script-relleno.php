<?php

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

include_once 'app/propietarios.inc.php';
include_once 'app/entrada.inc.php';
include_once 'app/Comentarios.inc.php';

include_once 'app/RepositorioPropietarios.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 100; $usuarios ++){
    $nombre = sa(10);
    $email = sa(5) . '@'  . sa(3);
    $nombre_de_salon = sa (10);
    $password = password_hash('123456', PASSWORD_DEFAULT);
    
    $usuario = new usuario ('',$nombre, $email, $nombre_de_salon,$password, '', '');
    RepositorioPropietarios::insertar_usuario(conexion::obtener_conexion(), $usuario);

}

for($entradas = 0; $entradas < 100; $entradas++){
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(1,100);
    
    $entrada = new entrada('', $autor, $titulo, $texto, '','');
    RepositorioEntradas::insertar_entrada(conexion::obtener_conexion(), $entrada); 
}

for($comentarios = 0; $comentario < 100; $comentario++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand (1,100);
    
    $comentario = new comentario ('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(conexion::obtener_conexion(),$comentario); 
}

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    
    for($i = 0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
        
    }
    return $string_aleatorio;
}

function lorem(){
    $lorem = 'El cliente es muy importante, el cliente será seguido por el cliente. Excepto la familia y los bienes raíces. Los niños o el empleado del lago urn dapibus pulvinar. Yo tampoco chateo, pero sí mi elemento CNN. Enfermedades y antes de la gran temporada. Duis necesita un puro ecológico, eso es lo que ponen los jugadores. Dolor total por no querer almohada, necesita el mayor consuelo. Vidas quieren beber en las gargantas de tincidun. Fue el fin de semana de su vida. Hasta que no fue él mismo, ni el elemento ni el micrófono, los resultados fueron favorables a los jugadores. Para beber en dos capas, la cama es conveniente para el cuidado. Entero volutpat lacinia porttitor. Ahora viven algunos miembros libres, o carcaj pero. Si el nivel de euismod Algunas recetas fáciles de ensalada y melaza. Phasellus placerat, quam vel eleifend aliquam, dui ipsum laoreet libero, dapibus tincidunt nunc turpis viverra erat Pero si quiere los confines de la tierra, esa proteína está libre de ansiedad.

Pero hay un arco, no se necesita aljaba, el cuerpo debe ser puro. No hay ni hay odio por la época de los camiones. Todos los miembros del equipo están en el vehículo del empleado. Hasta que lo atacaron, la oficina médica halagaba a los niños. Es un factor que desencadena un retraso en el tiempo. Estaré lleno de vida. Como no existen los camiones comerciales, las tareas domésticas las realiza el propio coche. El cliente es muy importante, el cliente será seguido por el cliente. Los niños son muy buenos, los niños que son más que eso, a veces no. Mauris sollicitudin laoreet tincidunt. Los niños invertirán antes que la vida de los jugadores. Hasta que lo odio y cómo genera algo de dinero. Como Lacinia necesitaba, era buena idea ponerlo.

En eleifend o ligalula o siempre. Fue un fin de semana. Porque el carcaj es blando y ni siquiera caliente. Eneas desde el arco y el augurio del curso de la garganta. Se dice que vivió en esta calle. Ahora esa red es ultricies masa fringilla sagittis. Y desde el arco. Como necesita una élite triste. Curabitur ligula leo, tincidunt pero gran vida, embarazada tincidunt odio.

Maecenas eu congue lacus. Los niños viven con enfermedades, vejez y niños, y sufren hambre y pobreza. Ahora es fácil ver quién era el activo más importante de la vida. Colocar ante él primero en las gargantas del hospital las camas del duelo y del cuidado; Ahora voy a desayunar y almorzar. A veces el hambre se espera y antes es lo primero que surge en la garganta. No existe una póliza de seguro de vida. No vale la pena el precio ni por el vulputate arcu, ni por el eleifend. Acueductos Eneos puros antes, como consecuencia del dolor del tiempo de la vida. El nivel del nivel es puro, y no los límites de la economía. Aliquam ultrices tellus felis, at ornare eros vulputate sed.

No hace falta invertir en la tierra de la vida, que a veces da un colchón. No ullamcorper pellentesque tincidunt. Colocar ante él primero en las gargantas del hospital las camas del duelo y del cuidado; De hecho, el desencadenante del chocolate no es un elemento de preocupación. No hay pureza, hendrerit et velit faucibus, faucibus consectetur mauris. Duis hendrerit ligula necesita los resultados necesarios. ¿Quién es el autor del premio de fútbol? Mañana el casino invertirá. Mañana invertirá en un hombre sabio y no en un eleifend ultrice. No es necesario ponerlo en el cuerpo. No hay ningún arco de superhéroe, sino mi embarazo. Pero el objetivo está libre, ni tampoco el carcaj. El jugador de baloncesto más grande. Pero siempre es feo.';

    return $lorem;
}

