<?php

include_once 'DB/catalogoDB.php';
include_once 'DB/productoDB.php';

function listarCarrito() {
    $SALTO = "\n";
    $cadena = @split("-", $_COOKIE[$_SESSION['usuarioId'] . 'carrito']);
    $cantidadProducto = array();
    $idProductos = array();
    $index = 0;
    foreach ($cadena as $item) {
        if (trim($item) != "") {
            if (!isset($cantidadProducto[$item])) {
                $cantidadProducto[$item] = 1;
                $idProductos[$index] = $item;
                $index++;
            } else {
                $cantidadProducto[$item]++;
            }
        }
    }
    $total = 0;
    $costoEnvio = 0;
    if (count($idProductos) > 0) {
        $cadena_tabla = '<table>' . $SALTO;
        for ($i = 0; $i < count($idProductos); $i++) {
            $productos = obtenerProductoPorId($idProductos[$i]);
            $producto = $productos[0];
            if ($cantidadProducto[$idProductos[$i]] != 0 && isset($producto['cantidad'])) {
                $cadena_tabla .='<tr>' . $SALTO;
                $cadena_tabla .='<th>Icono</th>' . $SALTO;
                //<!--<input type=\"button\" class=\"boton\" onclick=\"remove()\" value=\"Eliminar\" /> Quitar: <input type=\"checkbox\" name=\"orderboxes\" value=\"" + productos[i].identificador + "\">                -->
                $cadena_tabla .='<th>Producto</th>' . $SALTO;
                $cadena_tabla .='<th>Cantidad</th>' . $SALTO;
                $cadena_tabla .='<th>Precio unitario</th>' . $SALTO;
                $cadena_tabla .='<th>Precio total por producto</th>' . $SALTO;
                $cadena_tabla .='</tr>' . $SALTO;
                $cadena_tabla .='<tr>' . $SALTO;
                $cadena_tabla .='<td><img src="' . $producto['url_icono'] . '" alt="Icono del producto" /></td>' . $SALTO;
                $cadena_tabla .='<td>' . $producto['nombre'] . '</td>' . $SALTO;


                $cadena_tabla .='<td><select onchange="actualizarCarrrito(' . $_SESSION['usuarioId'] . ',' . $producto['productoId'] . ')" id="' . $producto['productoId'] . '">'; //.$cantidadProducto[$idProductos[$i]].'</td>'.$SALTO;
                $cadena_tabla .=generarOptions($cantidadProducto[$idProductos[$i]], $producto['cantidad']);
                $cadena_tabla .='</select></td>' . $SALTO;

                $cadena_tabla .='<td>$' . $producto['costo'] . '</td>' . $SALTO;
                $cadena_tabla .='<td>$' . ($producto['costo'] * $cantidadProducto[$idProductos[$i]]) . '</td>' . $SALTO;
                $costoEnvio+=$producto['envio'] * $cantidadProducto[$idProductos[$i]];
                $total+=($producto['costo'] * $cantidadProducto[$idProductos[$i]]) + $producto['envio'] * $cantidadProducto[$idProductos[$i]];
                $cadena_tabla .='</tr>' . $SALTO;
            }
        }
        $cadena_tabla .='<tr>' . $SALTO;
        $cadena_tabla .='<td class="totales" colspan="3"></td>' . $SALTO;
        $cadena_tabla .='<td>Costos de envio:</td>' . $SALTO;
        $cadena_tabla .='<td> $' . $costoEnvio . '</td>' . $SALTO;
        $cadena_tabla .='</tr>' . $SALTO;
        $cadena_tabla .='<tr>' . $SALTO;
        $cadena_tabla .='<td class="totales" colspan="3"></td>' . $SALTO;
        $cadena_tabla .='<td>Total: </td>' . $SALTO;
        $cadena_tabla .='<td> $' . $total . '</td>' . $SALTO;
        $cadena_tabla .='</tr>' . $SALTO;
        $cadena_tabla .='<tr>' . $SALTO;
        $cadena_tabla .='<td class="totales" colspan="3"></td>' . $SALTO;
        $cadena_tabla .='<td class="totales" colspan="2"></td>' . $SALTO;
        $cadena_tabla .='</tr>' . $SALTO;
        $cadena_tabla .='<tr>' . $SALTO;
        $cadena_tabla .='<td class="totales"></td>' . $SALTO;
        $cadena_tabla .='<td class="totales"></td>' . $SALTO;
        $cadena_tabla .='<td class="totales"></td>' . $SALTO;
        $cadena_tabla .='<td class="totales" ><a href="javascript:kill_cookies(' . $_SESSION['usuarioId'] . ')"><input type="button" class="boton" value="Vaciar carrito"/></a></td>' . $SALTO;
        $cadena_tabla .='<td class="totales"><a href="finalizar_pedido.php"><input name="finalizar" type="submit"  onclick="return confirmarPedido()"  class="boton" value="Finalizar Venta"/></a></td>' . $SALTO;
        $cadena_tabla .='</tr>' . $SALTO;
        $cadena_tabla .='</table>' . $SALTO;
    } else {
        $cadena_tabla = "<h2>No se han agregado productos al carrito</h2>";
    }
    return $cadena_tabla;
}

function generarOptions($valorSelect, $cantidad){
    $opciones = "";
    $selectoUno = false;
    for ($i = 0; $i <= $cantidad; $i++) {
        if ($i == $valorSelect){
            $opciones.="<option selected='selected'>$i</option>";
            $selectoUno = true;
        } else {
            if ($selectoUno == false && $i == $cantidad) {
                $opciones.="<option selected='selected'>$i</option>";
            } else {
                $opciones.="<option>$i</option>";
            }
        }
    }
    return $opciones;
}

?>
