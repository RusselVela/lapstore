<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_email.php';
filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Nosotros</title>    	
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        echo agregarCSSkMenuAdmin();
        ?>
        <link rel="stylesheet" type="text/css" href="css/css_principal.css" />
        <script type="text/javascript" language="javascript" src="js/js_validaciones_nosotros.js"> </script>
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
            <h1>Nosotros</h1> 
            <div class="marco">
                <div class="resenia">
                    <p>Nosotros somos una empresa ...Auctor eu faucibus quis, imperdiet et eros. Suspendisse nec auctor mi. Donec mollis ultricies eros. Duis vel nisi ipsum. Praesent tincidunt lorem vitae urna gravida et lobortis arcu aliquet. Donec quis felis eget quam venenatis sagittis. Fusce a sapien sed orci pretium pretium.Auctor eu faucibus quis, imperdiet et eros. Suspendisse nec auctor mi. Donec mollis ultricies eros. </p>
                </div>
                <div class="marco">
                    <p>Envianos tus Comentarios:</p>
                    <?php
                    echo enviarEmail();
                    ?>                                
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <table class="tabla_formulario">
                            <tr>
                                <td><label>Comentario:</label></td>
                                <td><textarea name="comentario" id="comentario"></textarea></td>
                            </tr>
                            <tr>
                                <input type="hidden" name="to" value="antonio_369_astry@hotmail.com" />
                                <td colspan="2"><input type="submit" name="enviar_correo" id="enviar" class="boton" value="Enviar"  /></td>							
                            </tr>                        
                        </table>
                    </form>
                    <a href="index.php" class="boton">Inicio</a>
                </div>  
            </div>          
        </div>
    </body>
</html>
