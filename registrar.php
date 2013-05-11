<?php
    include_once 'config.inc.php';
    include_once 'include_php/_gestion_usuario.php';
    include_once 'include_php/_gestion_plantilla.php';
    sesionActiva();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Login</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />        
        <link href="css/css_registro.css" type="text/css" rel="stylesheet"  />
        <script type="text/javascript" language="javascript" src="js/js_registrar.js" ></script>   
    </head>
    <body>    
        <div class="encabezado" id="encabezado">
            <div class="mini_perfil">
                <div class="slogan"><a href="index.php">LapStore</a></div>
                <div class="clearboth"></div>
            </div>
        </div>
        <div class="contenido">
            <div  class="marco">
                <div class="form_registro">
                    <h1>Registrate!</h1>
                    
                    <p>El mejor lugar para comprar :B</p>
                    <?php
                        echo agregarUsuario();
                    ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <table>
                            <tr>
                                <td><label for="nombre">Nombre:</label></td>
                                <td><input type="text" name="nombre" id="nombre" /></td>
                            </tr>
                            <tr>
                                <td><label for="apellido">Apellido:</label></td>
                                <td><input type="text" name="apellido" id="apellido" /></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email: <span>Agrega un correo valido</span></label></td>
                                <td><input type="text" name="email" id="email" /></td>
                            </tr>
                            <tr>
                                <td><label for="password_nuevo">Contrase&ntilde;a: </label></td>
                                <td><input type="password" name="password_nuevo" id="password_nuevo" /></td>
                            </tr>
                            <tr>
                                <td><label for="password_nuevo_v">Contrase&ntilde;a:<span>(Confirmar contrase&ntilde;a)</span></label></td>
                                <td><input type="password" name="password_nuevo_v" id="password_nuevo_v"/></td>
                            </tr>                            
                            <tr>
                                <td colspan="2"><input name="registrar" type="submit" class="boton" id="registrar" value="Registrarme"/></td>                                
                            </tr>
                        </table>                         
                    </form>
                </div>
                <a href="index.php" class="boton">Regresar</a>
            </div>            
        </div>
    </body>
</html>