<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Preferencias</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        echo agregarCSSkMenuAdmin();
        ?>
        <link rel="stylesheet" type="text/css" href="css/css_preferencias.css" />
    </head>
    <body onload="DefinirForma(<?php echo $_SESSION['usuarioId'] ?>)">
        <div class="encabezado">
            <?php
            echo generarEncabezadoHTML();
            echo generarMenu();
            echo generarMenuAdmin();
            ?>            
        </div>       
        <div class="contenido" > 
            <h1>Selecciona tu tema</h1> 
            <div class="marco">
                <form name="presentacion" id="presentacion" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <br/>                    
                    <div class="personaliza">
                        Estilo: 
                        <select id="estilo" name="estilo">
                            <option value="css_plantilla.css">Azul</option>
                            <option value="css_plantilla_v2.css">Rosa</option>
                            <option value="css_plantilla_v3.css">Verde</option>
                        </select>
                        <br />   
                        <input type="button" class="boton" name="boton" value="Cambiar" onclick= "EstablecerPresentacion(<?php echo $_SESSION['usuarioId'] ?>)"/>

                    </div>
                </form>
                <a href="index.php" class="boton">Inicio</a>
            </div>  
        </div>
    </body>
</html>
