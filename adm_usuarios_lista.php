<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_usuario.php';
include_once 'include_php/_gestion_plantilla.php';
filtroLoginAdmin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <title>Lista de Usuarios</title>
        <?php
        echo estilo();
        ?>        
        <link href="css/css_menu_adm.css" rel="stylesheet" type="text/css" />
        <link href="css/css_tablas.css" rel="stylesheet" type="text/css"/>
        <script language="javascript" type="text/javascript" src="js/js_validaciones_eliminar.js"></script>
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
            <h1>Lista de Usuarios</h1>
            <div class="marco">                
                <div class="tabla">
                    <?php
                    echo eliminarUsuario();
                    ?>
                    <table>
                        <caption><a class="boton" href="adm_usuario_agregar.php">Agregar Nuevo</a></caption>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>                
                            <th>Email</th>                
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Contrase&ntilde;a</th>
                            <th>Modificar</th>
                            <th>Borrar</th>                
                        </tr>
                        <?php
                        echo listarUsuarios();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
