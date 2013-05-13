<?php

include_once 'DB/catalogoDB.php';
include_once 'DB/productoDB.php';
include_once '_gestion_producto.php';
include_once '_utileria.php';

function listarCategorias() {
    $SALTO = "\n";
    $categorias = obtenerTodasCategorias();
    $cadena_post = "";
    foreach ($categorias as $categoria) {
        $cadena_post .='    <div class="marco">' . $SALTO;
        $cadena_post .='        <div class="imagen">' . $SALTO;
        $cadena_post .='        	<a href="categoria.php?categoriaId=' . $categoria['categoriaId'] . '">' . $SALTO;
        $cadena_post .='            <img src="' . $categoria['url_icono'] . '" alt="Imagen ' . $categoria['descripcion'] . '" /></a>' . $SALTO;
        $cadena_post .='        </div>' . $SALTO;
        $cadena_post .='        <div class="clearboth"></div>' . $SALTO;
        $cadena_post .='    </div>' . $SALTO;
    }
    if ($cadena_post == "") {
        $cadena_post .= '<div class="marco">' . $SALTO;
        $cadena_post .="<h2>No hay categorias</h2>" . $SALTO;
        $cadena_post .= '</div>' . $SALTO;
    }
    return $cadena_post;
}

function listarCategoriasMenu() {
    $SALTO = "\n";
    $categorias = obtenerTodasCategorias();
    $cadena_post = "";
    if (count($categorias) > 0) {
        $cadena_post .='            <ul>' . $SALTO;
    }
    foreach ($categorias as $categoria) {
        $cadena_post .='                <li><a href="categoria.php?categoriaId=' . $categoria['categoriaId'] . '">' . $categoria['nombre'] . '</a></li>' . $SALTO;
    }
    if ($cadena_post != "") {
        $cadena_post .='            </ul>' . $SALTO;
    }
    return $cadena_post;
}

function obtenerCategoriasSelect() {
    $SALTO = "\n";
    $categorias = obtenerTodasCategorias();
    $cadena_post = "";
    foreach ($categorias as $categoria) {
        $cadena_post .='                <option value="' . $categoria['categoriaId'] . '">' . $categoria['nombre'] . '</option>' . $SALTO;
    }
//    if ($cadena_post == "") {
//        $cadena_post .='Ninguna' . $SALTO;
//    }
    return $cadena_post;
}

function obtenerCategoriasSelected($index) {
    $SALTO = "\n";
    $categorias = obtenerTodasCategorias();
    $cadena_post = "";
    foreach ($categorias as $categoria) {         
        if ($index == $categoria['categoriaId']) {
            $cadena_post .='                <option selected="selected" value="' . $categoria['categoriaId'] . '">' . $categoria['nombre'] . '</option>' . $SALTO;
        } else {
            $cadena_post .='                <option value="' . $categoria['categoriaId'] . '">' . $categoria['nombre'] . '</option>' . $SALTO;
        }
    }
//    if ($cadena_post == "") {
//        $cadena_post .='Ninguna' . $SALTO;
//    }
    return $cadena_post;
}

function listarCategoriasOpciones() {
    $SALTO = "\n";
    $categorias = obtenerTodasCategorias();
    $cadena_post = "";
    $index = 1;
    foreach ($categorias as $categoria) {
        $class = "";
        if ($index % 2 == 0)
            $class = "par";
        $cadena_post .='            <tr class="' . $class . '">' . $SALTO;
        $cadena_post .='                <td>' . $categoria['categoriaId'] . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $categoria['nombre'] . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $categoria['descripcion'] . '</td>' . $SALTO;
        $cadena_post .='                <td class="editar"><a href="adm_categoria_modificar.php?categoriaId=' . $categoria['categoriaId'] . '"><img src="img/utileria/editar.png" alt="Editar"/></a></td>' . $SALTO;
        //adm_categoria_borrar.php?categoriaId='.$categoria['categoriaId'].'
        $cadena_post .='               	<td class="borrar"><a   onclick = "confirmarEliminacionCategoria(' . $categoria['categoriaId'] . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
        $cadena_post .='            </tr>' . $SALTO;
        $index++;
    }
    if ($cadena_post == "") {
        $cadena_post .="<tr><td colspan='4'>No hay categorias</td></tr>" . $SALTO;
    }
    return $cadena_post;
}

function listarProductosDeCategoria() {
    if (isset($_GET['categoriaId'])) {
        $categoriaId = $_GET['categoriaId'];
        $SALTO = "\n";
        $productos = obtenerProductosPorCategoria($categoriaId);
        $cadena_post = "";
        foreach ($productos as $producto) {
            if ($producto['cantidad'] > 0) {
                $cadena_post .='    <div class="marco">' . $SALTO;
                $cadena_post .='        <div class="imagen">' . $SALTO;
            	$cadena_post .='            <a href="' . $producto['url_icono'] . '" rel="lightbox"><img src="' . $producto['url_icono'] . '" alt="Imagen del producto" /></a>' . $SALTO;
                $cadena_post .='        </div>' . $SALTO;
                $cadena_post .='        <div class="descripcion">' . $SALTO;
                $cadena_post .='       <input type="checkbox" id="compCK'.$producto['productoId'].'" value="comp" onchange="generarInpustHidenCompa('.$producto['productoId'].','."'".$producto['nombre']."'".')"> comparar<br>';
                $cadena_post .='<div id="comparacion'.$producto['productoId'].'">';
                $cadena_post .='</div>';
                $cadena_post .='            <h2>' . $producto['nombre'] . '</h2>' . $SALTO;
                $cadena_post .='            <p>' . $producto['descripcion'] . '</p>' . $SALTO;
		$cadena_post .='			<div class="precio">Precio:$'.$producto['costo'].'</div>';
                $cadena_post .='            <input type="button" class="boton" onclick="javascript:place(' . $producto['productoId'] . ',' . $_SESSION['usuarioId'] . ')" value="AgregarCarrito"/>' . $SALTO;
                $cadena_post .='            <input type="button" class="boton" onclick="verDetalleProducto(' . $producto['productoId'] . ')"  value="Ver Detalles"/>' . $SALTO;
                $cadena_post .='        </div>' . $SALTO;                
                $cadena_post .='        <div class="clearboth"></div>' . $SALTO;
                $cadena_post .='    </div>' . $SALTO;
            }
        }
        if ($cadena_post == "") {
            $cadena_post .= '<div class="marco">' . $SALTO;
            $cadena_post .="<h2>No hay productos</h2>" . $SALTO;
            $cadena_post .= '</div>' . $SALTO;
        }
        return $cadena_post;
    } else {
        return listarTodosProductos();
    }
}

function registrarCategoria() {
    if (isset($_POST['agregar_categoria'])) {
        if ($_POST['agregar_categoria'] == 'Agregar' && $_POST['txt_nombre'] != '') {
            if (!existe_categoria($_POST['txt_nombre'])) {
                $ruta = 'img/categorias';
                $name = 'fl_imagen';

                $rs = mysql_query("SELECT MAX(categoriaId) AS id FROM categoria");
                if ($row = mysql_fetch_row($rs)) {
                    $id = trim($row[0]) + 1;
                }

                $nuevo_nombre = "categoria" . $id;

                $img_type = $_FILES[$name]['type'];
                $nuevo_nombre .= obtnerExtencionArchivo($img_type);
                //echo $nuevo_nombre;

                $isUpload = upload_imagen($ruta, $name, $nuevo_nombre);
                if ($isUpload) {
                    insertarCategoria($_POST['txt_nombre'], $_POST["txt_descripcion"], $ruta . '/' . $nuevo_nombre);
                } else {
                    insertarCategoria($_POST['txt_nombre'], $_POST["txt_descripcion"], "$ruta/none.png");
                }

                return "<div class='exito'>Exito al crear la categoria</div>";
            } else {
                $nombre = $_POST['txt_nombre'];
                return "<div class='error'>La categoria $nombre ya existe</div>";
            }
        } else {
            return "<div class='error'>Error al intentar agregar categoria</div>";
        }
    }
}

function modificarCategoria() {
    if (isset($_POST['modificar_categoria'])) {
        if ($_POST['modificar_categoria'] == 'Modificar' && $_POST['nombre'] != '') {
            $ruta = 'img/categorias';
            $name = 'img_categoria';
            $nuevo_nombre = "categoria" . $_POST['categoriaId'];

            $img_type = $_FILES[$name]['type'];
            $nuevo_nombre .= obtnerExtencionArchivo($img_type);

            $var_dump = (upload_imagen($ruta, $name, $nuevo_nombre));

            if ($var_dump) {
                $exito = actualizarCategoria($_POST['categoriaId'], $_POST['nombre'], $_POST["descripcion"], $ruta . '/' . $nuevo_nombre);
                
            } else {
                $exito = actualizarCategoria($_POST['categoriaId'], $_POST['nombre'], $_POST["descripcion"], "");
            }
            if($exito){
                if($var_dump){
                    return "<div class='exito'>Exito al actualizar categoria</div>";
                }
                else{
                    return "<div class='exito'>Exito al actualizar categoria<br/>No se subio imagen</div>";
                }
            }
            else{
                return "Error al modificar categoria";
            }
        }
    }
}

function eliminarCategoria() {  
    if (isset($_GET["categoriaId"])) {
        if (borrarCategoria($_GET["categoriaId"])) {
            return "<div class='exito'>Categoria Eliminada</div>";
        } else {
            return'<div class="error">Error al eliminar Categoria</div>';
        }
    }
}


function recibirBusqueda(){
	$html='<input type="text" id="productoABuscar" onkeyup="if(esTeclaValida(event)==1){desplegarResultados();}"  onfocus="borrarTextoDefault();" onblur="colocarTextoDefault();" value="';
	if(isset($_GET["buscar"]) && isset($_GET["parametro"])){
		if($_GET["buscar"]=="true" && $_GET["parametro"]!=""){
			$html.=$_GET["parametro"].'"/>';
		}else{
			$html.='¿Que busca?"/>';
		}
	}else{
		$html.='¿Que busca?"/>';
	}
	return $html;
}
?>
