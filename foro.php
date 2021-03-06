<?php
include_once ('config.inc.php');
include_once ('include_php/_gestion_plantilla.php');
include_once ('include_php/_gestion_foro.php');
filtro_login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Foro</title>      
        <script src="js/js_foro.js" language="javascript" type="text/javascript" ></script>		
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" /> 
        <?php
        echo estilo();
        ?>        
        <link href="css/css_foro.css" rel="stylesheet" type="text/css" />
        <script language="JavaScript" type="text/javascript" src="ajax/ajax.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/js_validaciones_eliminar.js"></script>
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
			//echo generarBuscador();
            ?>
        </div>       
        <div class="contenido" >
            <h1>Foro</h1>            
            <div class="marco" id="nuevo_post">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >
                    <div id="info_usuario">
                        <img src="<?php echo $_SESSION['foto'] ?>" alt="icono del usuario"/>
                        <span class="usuario"><?php echo $_SESSION["nombre"] ?></span>
                        <input type="hidden" name="usuarioId" value="<?php echo $_SESSION["usuarioId"] ?>" />
    <!--                    <span class="fecha">2011-01-8</span>-->
                        <div class="clearboth"></div>
                    </div>
                    <div class="articulo_nuevo">
                        <textarea id="comen_post" name="comen_post"></textarea>
                        <input type="submit" class="boton"  id="agregar_post" name="agregar_post" value="Publicar"/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/>a<br/> 
                    </div>
                </form>
                <div class="clearboth"></div>
            </div>  

            <?php
            registrarPost();
            eliminarPost();
            eliminarRepost();
            registrarRepost();
            echo listarPosts();
            ?>
        </div>
    </body>
</html>

