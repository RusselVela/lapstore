<?php

include_once 'DB/pedidoDB.php';

function agregarPedido() {
    if (isset($_POST['finalizar'])) {
        $cadena = @split("-", $_COOKIE[$_SESSION['usuarioId'] . 'carrito']);
        $cantidadesProductos = array();
        $idProductos = array();
        $index = 0;
        foreach ($cadena as $item) {
            if (trim($item) != "") {
                if (!isset($cantidadesProductos[$item])) {
                    $cantidadesProductos[$item] = 1;
                    $idProductos[$index] = $item;
                    $index++;
                } else {
                    $cantidadesProductos[$item]++;
                }
            }
        }
        if (count($idProductos) > 0) {
            foreach ($cantidadesProductos as $productoId => $cantidad) {
                insertarPedido($productoId, $_SESSION['usuarioId'], $cantidad);
                modificarCantidadProducto($productoId, $cantidad);
            }
            return "<div class='exito'>Pedido agregado con exito<br/> En un periodo de 24hrs nuestro equipo de ventas se comunicara con usted para <br/>  formalizar la venta y corroborar los datos</div>";
        } else {
            return "<div class='error'>Error al intentar agregar pedido</div>";
        }
    } else {
        return "<div class='error'>Error por acceso inadecuado</div>";
    }
}

?>
