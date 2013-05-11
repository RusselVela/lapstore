<?php
include_once 'DB/chatDB.php';
include_once 'DB/usuarioDB.php';
include_once '../config.inc.php';

session_start();
    $SALTO = "\n";
    $productos =obtenerMensajes();
    $cadena_producto = "";
    foreach ($productos as $producto) {
        $usuario=obtenerUsuarioPorId($producto['usuarioId']);
            $cadena_producto .=$usuario['nombre'].": ".$producto['mensaje']."<br/>".$SALTO;
    }
    if ($cadena_producto == "") {        
        $cadena_producto .="No hay mensajes" . $SALTO;
    }    
    echo $cadena_producto;
?>
