<?php
include 'include_php/_gestion_plantilla.php';
include_once 'config.inc.php';
include_once 'include_php/_gestion_carrito.php';
filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Documento sin título</title>
        <link href="css/css_plantilla.css" type="text/css" rel="stylesheet" />         
        <?php
        echo estilo();
        ?>
        <link href="css/css_carrito.css" type="text/css" rel="stylesheet" />
        <script src="js/js_carrito_cookies.js" language="javascript" type="text/javascript"></script>
        <script src="js/js_validaciones_eliminar.js" language="javascript" type="text/javascript"></script>
        <?php
        echo agregarCSSkMenuAdmin();
        ?>
    </head>    
    <body>
        <div class="encabezado">
            <?php
            echo generarEncabezadoHTML();
            echo generarMenu();
            echo generarMenuAdmin();
            ?>            
        </div>       
        <div class="contenido" >	
            <h1>Mi carrito</h1>
            <div class="marco">
                <form name="orderform"  method="post" action="finalizar_pedido.php">
                    <div id="contenidoCarrito">
                        <?php
                        echo listarCarrito();
                        ?>
                    </div>
                    
                </form>                
                <a href="principal.php" class="boton">Cancelar</a>
                <a href="categoria.php"><input type="button" class="boton" value="Agregar productos"/></a>
            </div>
        </div>
    </body>
</html>
