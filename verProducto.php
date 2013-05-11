<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_producto.php';
//    session_start();
//    if(isset($_SESSION['login'])){
//        if(Plantilla::filtro_login($_SESSION['login'])){            
filtro_login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Detalle</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <?php
        echo agregarCSSkMenuAdmin();
        echo estilo();
        ?>
        <link href="css/css_producto.css" rel="stylesheet" type="text/css" media="screen" />        
        <script src="js/js_carrito_cookies.js" language="javascript" type="text/javascript"></script>
        <script src="js/js_producto.js" language="javascript" type="text/javascript"></script>        
    </head>
    <body>        
        <div class="encabezado">
            <div class="mini_perfil">                
                <div class="slogan"><a href="#">LapStore</a></div>
                <ul>
                    <li class="verCarrito"><a href="javascript:cerrarDetalle()">Cerrar</a></li>	
                    <li><img src="<?php echo $_SESSION['foto'] ?>" alt="Imagen usuario"/></li>
                </ul>
            </div>
            <div class="clearboth"></div>                       
        </div>       
        <div class="contenido" >	
            <div class="marco">
                <?php
                echo verDetalleProducto();
                ?>
            </div>
        </div>
    </body>
</html>
