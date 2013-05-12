<?php

include_once 'DB/catalogoDB.php';
include_once 'DB/productoDB.php';
include_once '_utileria.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function listarProductosConOpciones() {
    $SALTO = "\n";
    $productos = obtenerTodosProductos();

    $cadena_post = "";
    $index = 1;
    foreach ($productos as $producto) {
        // echo $producto['categoriaId'] ;
        $class = "";
        if ($index % 2 == 0)
            $class = "par";
        $categoria = obtenerCategoriaPorId($producto['categoriaId']);
        $cadena_post .='            <tr class="' . $class . '">' . $SALTO;
        $cadena_post .='                <td>' . $producto['productoId'] . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $categoria['nombre'] . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $producto['nombre'] . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $producto['costo'] . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $producto['cantidad'] . '</td>' . $SALTO;
        $cadena_post .='                <td class="editar"><a href="adm_producto_modificar.php?productoId=' . $producto['productoId'] . '"><img src="img/utileria/editar.png" alt="Editar"/></a></td>' . $SALTO;
        //href="adm_producto_borrar.php?productoId='.$producto['productoId'].'"
        $cadena_post .='               	<td class="borrar"><a onclick = "confirmarEliminacionProducto(' . $producto['productoId'] . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
//            $cadena_post .='                </td>'.$SALTO;
        $cadena_post .='            </tr>' . $SALTO;
        $index++;
    }
    if ($cadena_post == "") {
        $cadena_post .="<tr><td colspan='4'>No hay productos</td></tr>" . $SALTO;
    }
    return $cadena_post;
}

function registrarProducto() {
    if (isset($_POST['agregar_producto'])) {
        if (isset($_POST['slc_categoria']) && $_POST['txt_nombre'] != '') {
            if (!existe_Producto($_POST['txt_nombre'])) {
                $ruta = 'img/productos';
                $name = 'fl_imagen';
                $id = obtenerIdSiguiente();
                $nuevo_nombre = "producto" . $id;

                $img_type = $_FILES[$name]['type'];
                $nuevo_nombre .= obtnerExtencionArchivo($img_type);
                //echo $nuevo_nombre;

                $isUpload = upload_imagen($ruta, $name, $nuevo_nombre);
                if ($isUpload) {
                    insertarProducto($_POST['txt_nombre'], $_POST['slc_categoria'], $_POST['txt_envio'], $_POST['txt_costo'], $_POST['txt_cantidad'], $_POST["txt_descripcion"], $ruta . '/' . $nuevo_nombre);
                } else {
                    insertarProducto($_POST['txt_nombre'], $_POST['slc_categoria'], $_POST['txt_envio'], $_POST['txt_costo'], $_POST['txt_cantidad'], $_POST["txt_descripcion"], "$ruta/none.png");
                }
                return "<div class='exito'>Exito al regitrar el producto</div>";
            } else {
                $nombre = $_POST['txt_nombre'];
                return "<div class='error'>El producto $nombre ya existe</div>";
            }
        }
        else{
            return "<div class='error'>Error faltan datos</div>";
        }
        
    }
}

function modificarProducto() {
    if (isset($_POST['modificar_producto'])) {
        if ($_POST['modificar_producto'] == 'Modificar' && $_POST['txt_nombre'] != '') {
            $ruta = 'img/productos';
            $name = 'img_producto';
            $nuevo_nombre = "producto" . $_POST['productoId'];

            $img_type = $_FILES[$name]['type'];
            $nuevo_nombre .= obtnerExtencionArchivo($img_type);

            $var_dump = (upload_imagen($ruta, $name, $nuevo_nombre));

            if ($var_dump) {
                actualizarProducto($_POST['txt_nombre'], $_POST['slc_categoria'], $_POST['productoId'], $_POST['txt_envio'], $_POST['txt_costo'], $_POST['txt_cantidad'], $_POST["txt_descripcion"], $ruta . '/' . $nuevo_nombre);
            } else {
                actualizarProducto($_POST['txt_nombre'], $_POST['slc_categoria'], $_POST['productoId'], $_POST['txt_envio'], $_POST['txt_costo'], $_POST['txt_cantidad'], $_POST["txt_descripcion"], "");
            }
            return '<div class="exito">Exito al modificar el producto</div>';
        } else {
            return '<div class="error">Error al modificar Producto</div>';
        }
    }
}

function listarTodosProductos() {
    $SALTO = "\n";
    $productos = obtenerTodosProductos();
    $cadena_producto = "";
    foreach ($productos as $producto) {
        if ($producto['cantidad'] > 0) {
            $cadena_producto .='    <div class="marco">' . $SALTO;
            $cadena_producto .='        <div class="imagen">' . $SALTO;
            $cadena_producto .='            <a href="' . $producto['url_icono'] . '" rel="lightbox"><img src="' . $producto['url_icono'] . '" alt="Imagen del producto" /></a>' . $SALTO;
            $cadena_producto .='        </div>' . $SALTO;
            $cadena_producto .='        <div class="descripcion">' . $SALTO;
            $cadena_producto .='            <h2>' . $producto['nombre'] . '</h2>' . $SALTO;
            $cadena_producto .='            <p>' . $producto['descripcion'] . '</p>' . $SALTO;
	    $cadena_producto.='				<div class="precio">Precio: $'.$producto['costo'].'</div>';
                $cadena_producto .='       <input type="checkbox" id="compCK'.$producto['productoId'].'" value="comp" onchange="generarInpustHidenCompa('.$producto['productoId'].','."'".$producto['nombre']."'".')"> comparar<br>';
                $cadena_producto .='<div id="comparacion'.$producto['productoId'].'">';
                $cadena_producto .='</div>';
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

function eliminarProducto() {
    if (isset($_GET["productoId"])) {
        if (borrarProducto($_GET["productoId"])) {
            return "<div class='exito'>Producto Eliminado</div>";
        } else {
            return'<div class="error">Error al eliminar Producto</div>';
        }
    }
}

function modificarCantidadProducto($productoId, $cantidad_vendida) {
    $productos = obtenerProductoPorId($productoId);
    $producto = $productos[0];
    $valor = $producto['cantidad'];
    $valor-=$cantidad_vendida;
    actualizarCantidadDeProducto($valor, $productoId);
}

function verDetalleProducto(){
    $SALTO = "\n";
    $cadena_detalle = "";
    if (isset($_GET['productoId'])) {
        $productos = obtenerProductoPorId($_GET['productoId']);
        foreach ($productos as $producto) {
            $cadena_detalle .='                <h1><span id="nombre_lap">' . $producto['nombre'] . '</span></h1>' . $SALTO;
            $cadena_detalle .='                <div class="textos">' . $SALTO;
            $cadena_detalle .='    <div class="descripcion">' . $SALTO;
            $cadena_detalle .='        <p id="descripcion">' . $SALTO;
            $cadena_detalle .=$producto['descripcion'] . $SALTO;
            $cadena_detalle .='                        </p>' . $SALTO;
            $cadena_detalle .='                        <table>' . $SALTO;
            $cadena_detalle .='                            <caption>Especificaciones de venta</caption>' . $SALTO;
            $cadena_detalle .='                            <tr>' . $SALTO;
            $cadena_detalle .='                                <td class="prop">Costo:</td>' . $SALTO;
            $cadena_detalle .='                                <td>$' . $producto['costo'] . '</td>' . $SALTO;
            $cadena_detalle .='                            </tr>' . $SALTO;
            $cadena_detalle .='                            <tr>' . $SALTO;
            $cadena_detalle .='                                <td class="prop">Envio:</td>' . $SALTO;
            $cadena_detalle .='                                <td>$' . $producto['envio'] . '</td>' . $SALTO;
            $cadena_detalle .='                            </tr>' . $SALTO;
            $cadena_detalle .='                            <tr>' . $SALTO;
            $cadena_detalle .='                                <td class="prop">Disponibles:</td>' . $SALTO;
            $cadena_detalle .='                                <td>' . $producto['cantidad'] . '</td>' . $SALTO;
            $cadena_detalle .='                            </tr>' . $SALTO;
            $cadena_detalle .='                        </table>' . $SALTO;
            $cadena_detalle .='                </div>' . $SALTO;
            $cadena_detalle .='            <input type="button" class="boton"   onclick="javascript:place(' . $producto['productoId'] . ',' . $_SESSION['usuarioId'] . ')" value="AgregarCarrito"/>' . $SALTO;
            $cadena_detalle .='                </div>' . $SALTO;
            $cadena_detalle .='                <div class="imagenes">' . $SALTO;
            $cadena_detalle .='                    <img src="' . $producto['url_icono'] . '" />' . $SALTO;
            $cadena_detalle .='                </div>' . $SALTO;

            $cadena_detalle .='                <div class="clearboth"></div>' . $SALTO;
        }
        if ($cadena_detalle == "") {
            $cadena_detalle .= '<div class="error">' . $SALTO;
            $cadena_detalle .="<h2>Sin datos</h2>" . $SALTO;
            $cadena_detalle .= '</div>' . $SALTO;
        }
    } else {
        $cadena_detalle = "<div class='error'>No se selecciono un producto</div>";
    }

    return $cadena_detalle;
}

?>
