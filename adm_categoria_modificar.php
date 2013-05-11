<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_catalogo.php';
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
        <script type="text/javascript" language="javascript" src="js/js_adm_categoria_agregar.js"></script>
        <title>Modificar Categoria</title>
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
            <h1>Modificar Categoria</h1> 
            <div class="marco">

                <?php
                if (isset($_GET['categoriaId'])) {
                    echo modificarCategoria();
                    $categoria = obtenerCategoriaPorId($_GET['categoriaId']);
                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

                    <table>        

                        <tr>
                            <td><label for="nombre">Nombre</label></td>
                            <td><input type="text" id="campoNombre" name="nombre" value="<?php echo (isset($categoria["nombre"])) ? $categoria["nombre"] : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Descripcion<span>Opcional</span></label></td>
                            <td><textarea name="descripcion" rows="2" cols="15"><?php echo (isset($categoria["descripcion"])) ? $categoria["descripcion"] : ""; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Imagen<span>Opcional</span></label></td>
                            <td><input type="file" id="img_categoria" name="img_categoria" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="boton" name="modificar_categoria" value="Modificar" id="agregarCategoria" />
                                <input type="hidden" name="categoriaId" value="<?php echo (isset($categoria["categoriaId"])) ? $categoria["categoriaId"] : ""; ?>"/>
                            </td>
                        </tr>
                    </table>
                </form>
                <a href="principal.php" class="boton">Cancelar</a>    
            </div>
        </div>
    </body>
</html>
