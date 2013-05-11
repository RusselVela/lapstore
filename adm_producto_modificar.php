<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_catalogo.php';
include_once 'include_php/_gestion_producto.php';
include_once 'include_php/_gestion_plantilla.php';
filtroLoginAdmin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        ?>        
        <link href="css/css_menu_adm.css" rel="stylesheet" type="text/css" />
        <link href="css/css_actualizar_perfil.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="js/js_adm_producto_mod.js"></script>
        <title>Modificar Producto</title>

    </head>
    <body>
        <div class="encabezado">
            <?php
            echo generarEncabezadoHTML();
            echo generarMenu();
            echo generarMenuAdmin();
            ?>        

        </div>
        <div class="contenido">
            <h1>Modificar Productos</h1> 
            <div class="marco">
                <?php
                if (isset($_GET['productoId'])) {
                    echo modificarProducto();
                    $productos = obtenerProductoPorId($_GET['productoId']);
                    $producto = $productos[0];
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . (isset($_GET['productoId'])) ? "?productoId=" . $_GET['productoId'] : "" ?>" method="post" enctype="multipart/form-data" >

                    <table>        

                        <tr>
                            <td><label>Categoria</label></td>
                            <td>                                
                                <select name="slc_categoria">
                                    <?
                                    if (isset($producto["categoriaId"]))
                                        echo obtenerCategoriasSelected($producto["categoriaId"]);
                                    else
                                        echo obtenerCategoriasSelect();
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Nombre</label></td>
                            <td><input type="text" id="campoNombre" name="txt_nombre" value="<?php echo (isset($producto["nombre"])) ? $producto["nombre"] : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Descripcion</label></td>
                            <td><textarea name="txt_descripcion" id="campoDescripcion" rows="2" cols="15"><?php echo (isset($producto["descripcion"])) ? $producto["descripcion"] : ""; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Costo de Envio</label></td>
                            <td><input type="text" id="campoCostoE" name="txt_envio" value="<?php echo (isset($producto["envio"])) ? $producto["envio"] : ""; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label>Costo Unitario</label></td>
                            <td><input type="text" id="campoCostoU" name="txt_costo" value="<?php echo (isset($producto["costo"])) ? $producto["costo"] : ""; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label>Cantidad</label></td>
                            <td><input type="text" id="campoCantidad" name="txt_cantidad" value="<?php echo (isset($producto["cantidad"])) ? $producto["cantidad"] : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Imagen<span>Opcional</span></label></td>
                            <td><input type="file" id="campoURLImagen" name="img_producto" /></td>
                        </tr>
                        <tr><td colspan="2">
                                <input type="submit" class="boton" id="agregarProducto" name="modificar_producto" value="Modificar" />
                                <input type="hidden" name="productoId" value="<?php echo (isset($producto["productoId"])) ? $producto["productoId"] : ""; ?>"/>
                            </td>
                        </tr>

                    </table>
                </form>                
                <a href="principal.php" class="boton">Cancelar</a>
            </div>
        </div>
    </body>
</html>
