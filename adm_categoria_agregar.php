<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_catalogo.php';
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
        <script type="text/javascript" language="javascript" src="js/js_adm_categoria_agregar.js"></script>
        <title>Agregar Categoria</title>
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
            <h1>Agregar Categoria</h1>
            <div class="marco">                    
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
                    <table>
                        <?php
                        echo registrarCategoria();
                        ?>                
                        <tr>
                            <td><label>Nombre</label></td>
                            <td><input type="text" name="txt_nombre" id="campoNombre"/></td>
                        </tr>
                        <tr>
                            <td><label>Descripci&oacute;n<span>Opcional</span></label></td>
                            <td><textarea name="txt_descripcion" rows="2" cols="15"></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Imagen<span>Opcional</span></label></td>
                            <td><input type="file" id="fl_imagen" name="fl_imagen" /></td>
                        </tr>
                        <tr><td colspan="2"><input class="boton" type="submit" id="agregarCategoria" name="agregar_categoria" value="Agregar" /></td></tr>
                    </table>
                </form>
                <a href="principal.php" class="boton">Cancelar</a>                
            </div>
        </div>
    </body>
</html>
