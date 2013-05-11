<?php
include_once ('config.inc.php');
include_once ('include_php/_gestion_plantilla.php');
include_once ('include_php/_gestion_foro2.php');
filtro_login();
$idPost;

if(isset($_GET["idPost"])){
	$idPost=$_GET["idPost"];	
}else{	
	header("Location:foro2.php");
}

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
            ?>
        </div>       
        <div class="contenido" >
            <h1>Foro</h1>
            	<div><?php	
            			eliminarPost();
            			eliminarRepost();
            			registrarRepost();
						echo construirPost($idPost);
					 ?> 
                </div>           
                <div class="clearboth"></div>
        </div>
    </body>