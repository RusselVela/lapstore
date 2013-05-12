<?php
include_once 'config.inc.php';
include_once 'include_php/_gestionComparacion.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/DB/productoDB.php';
include_once 'config.inc.php';
filtro_login();
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
        <link href="css/css_tablas.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>
        <title>Lista de Productos</title>

    </head>
    <body>
        <div class="encabezado">

            <?php
            echo generarEncabezadoHTML();
            echo generarMenu();
//            echo generarMenuAdmin();
            ?>        
        </div>
        <div class="contenido">
            <h1>Lista de Productos</h1>
            <div class="marco">

                    <div class="tabla">                 
                        <?php
                            $g = new gestorComparacion();
                            echo $g->compararProductos();
                        ?>
                    </div>
              
            </div>
        </div>
    </body>
</html>
