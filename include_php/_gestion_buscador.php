<?php
include_once 'DB/buscadorDB.php';
include_once '../config.inc.php';

function listarProductosEncontrados($parametro) {
    $SALTO = "\n";
    $productos =buscarCoincidencias($parametro);
    $cadena_producto = "";
    foreach ($productos as $producto) {
        if($producto['cantidad']>0){
            $cadena_producto .='    <div class="marco">' . $SALTO;
            $cadena_producto .='        <div class="imagen">' . $SALTO;
            $cadena_producto .='            <a href="' . $producto['url_icono'] . '" rel="lightbox"><img src="' . $producto['url_icono'] . '" alt="Imagen del producto" /></a>' . $SALTO;
            $cadena_producto .='        </div>' . $SALTO;
            $cadena_producto .='        <div class="descripcion">' . $SALTO;
            $cadena_producto .='            <h2>' . $producto['nombre'] . '</h2>' . $SALTO;
            $cadena_producto .='            <p>' . $producto['descripcion'] . '</p>' . $SALTO;
			$cadena_producto.='				<div class="precio">Precio:$'.$producto['costo'].'</div>';
            $cadena_producto .='            <input type="button" class="boton"   onclick="javascript:place(' . $producto['productoId'] . ',' . $_SESSION['usuarioId'] . ')" value="AgregarCarrito"/>' . $SALTO;
            $cadena_producto .='            <input type="button" class="boton" onclick="verDetalleProducto(' . $producto['productoId'] . ')"  value="Ver Detalles"/>' . $SALTO;
            $cadena_producto .='        </div>' . $SALTO;
            $cadena_producto .='        <div class="clearboth"></div>' . $SALTO;
            $cadena_producto .='    </div>' . $SALTO;
        }
    }
    if ($cadena_producto == "") {
        $cadena_producto .= '<div class="marco">' . $SALTO;
        $cadena_producto .="<h2>No hay productos</h2>" . $SALTO;
        $cadena_producto .= '</div>' . $SALTO;
    }
    
    return $cadena_producto;
}

session_start();

if(isset($_POST["busqueda"])){
    echo listarProductosEncontrados($_POST["busqueda"]);
}

?>
