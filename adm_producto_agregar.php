<?php
include_once 'config.inc.php';
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
        <script type="text/javascript" language="javascript" src="js/js_adm_producto_agregar.js"></script>
        <title>Agregar Producto</title>
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
            <h1>Agregar Prodcuto</h1>
            <div class="marco">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
                    <table>

                        <?php
                        echo registrarProducto();
                        ?>
                        <tr>
                            <td><label>Categoria</label></td>
                            <td>

                                <select name="slc_categoria">
                                    <?
                                    echo obtenerCategoriasSelect();
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Nombre</label></td>
                            <td><input type="text" name="txt_nombre" id="campoNombre" /></td>
                        </tr>
                        <tr>
                            <td><label>Costo de Envio</label></td>
                            <td><input type="text" name="txt_envio" id="campoCostoE"/></td>
                        </tr>
                        <tr>
                            <td><label>Costo Unitario</label></td>
                            <td><input type="text" name="txt_costo" id="campoCostoU" /></td>
                        </tr>
                        <tr>
                            <td><label>Cantidad</label></td>
                            <td><input type="text" name="txt_cantidad" id="campoCantidad"/></td>
                        </tr>
                        <tr>
                            <td><label>Descripcion</label></td>
                            <td><textarea name="txt_descripcion" id="campoDescripcion" cols="15" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Imagen</label></td>
                            <td><input type="file" name="fl_imagen" id="campoURLImagen" /></td>
                        </tr>
                        <tr><td colspan="2"><input type="submit" class="boton" id="agregarProducto" name="agregar_producto" value="Agregar" /></td></tr>

                    </table>
                </form>
                <a href="principal.php" class="boton">Cancelar</a>    
            </div>
        </div>

    </body>
</html>
