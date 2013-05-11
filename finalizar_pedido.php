<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_pedido.php';
filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin título</title>  
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        ?>        
        <script src="js/js_carrito_cookies.js" type="text/javascript"></script>
        <?php
        echo agregarCSSkMenuAdmin();
        ?>        
        <link href="css/css_actualizar_perfil.css" rel="stylesheet" type="text/css" />

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
            <h1>Finalizaci&oacute;n de Pedido</h1>                 
            <div class="marco">

                <?php
                echo agregarPedido();
                ?> 
                <script type="text/javascript">
                    eraseCookie(<?php echo "'" . $_SESSION['usuarioId'] . "carrito'" ?>);
                </script>
                <a href="principal.php" class="boton">Inicio</a>    
            </div>            
        </div>
    </body>
</html>