<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_banner.php';
filtro_login();
?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Principal</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <?php
        echo agregarCSSkMenuAdmin();
        echo estilo();
        ?>
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />    
        <link href="css/highlight.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="js/jquery-1.7.2.min.js"></script>    
        <script type="text/javascript" language="javascript" src="js/highlight.js"></script>
        <script type="text/javascript" language="javascript" src="js/js_principal.js"></script>
        
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
            <h1>Bienvenido</h1>
            <div id="highlight"> 
                <?php
				echo generarBuscador();
                echo listarImagenesBanner();
                ?>
                <div id="navegation">
                    <p class="selected"> <a href="javascript:;"><span>1</span><br />1</a></p>
                    <p> <a href="javascript:;"><span>2</span><br />
                            2</a></p>
                    <p> <a href="javascript:;"><span>3</span><br />
                            3</a></p>
                    <p class="withoutborder"> <a href="javascript:;"><span>4</span><br />
                            4</a></p>
                </div>
                <div class="navegationbg">&nbsp;</div>
            </div>
        </div>
    </body>
</html>
