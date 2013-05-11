<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_banner.php';
filtroLoginAdmin();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        ?>        
        <link href="css/css_menu_adm.css" rel="stylesheet" type="text/css" />
        <link href="css/css_actualizar_perfil.css" rel="stylesheet" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/js_adm_actualizar_banner.js"></script>
        <title>Modificar Banner</title>
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
            <h1>Actualizar la Portada</h1>
            <div class="marco"> 
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
                    <div class="aviso">Recomendable:Imagenes de 550px X 255px<br/>Subir por lo menos una imagen </div>
                    <?php
                    echo actualizarImagenBanner();
                    ?> 
                    <table>               
                        <tr>
                            <td><label>Texto alt 1</label></td>
                            <td><input type="text" name="desc_1"/></td>
                        </tr>
                        <tr>
                            <td><label>Imagen 1</label></td>
                            <td><input type="file" id="fl_imagen1" name="imagen_1" /></td>
                        </tr>                        
                        <tr>
                            <td><label>Texto alt 2</label></td>
                            <td><input type="text" name="desc_2"/></td>
                        </tr>
                        <tr>
                            <td><label>Imagen 2</label></td>
                            <td><input type="file" id="fl_imagen2" name="imagen_2" /></td>
                        </tr>
                        <tr>
                            <td><label>Texto alt 3</label></td>
                            <td><input type="text" name="desc_3"/></td>
                        </tr>
                        <tr>
                            <td><label>Imagen 3</label></td>
                            <td><input type="file" id="fl_imagen3" name="imagen_3" /></td>
                        </tr>
                        <tr>
                            <td><label>Texto alt 4</label></td>
                            <td><input type="text" name="desc_4"/></td>
                        </tr>
                        <tr>
                            <td><label>Imagen 4</label></td>
                            <td><input type="file" id="fl_imagen4" name="imagen_4" /></td>
                        </tr>
                        <tr><td colspan="2"><input id="actualizar_banner" class="boton" type="submit" name="actualizar_banner" value="Actualizar" /></td></tr>
                    </table>
                </form>
                <a href="principal.php" class="boton">Cancelar</a>
            </div>
        </div>
    </body>
</html>
