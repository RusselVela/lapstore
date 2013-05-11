<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_banner.php';
include_once 'include_php/_gestion_login.php';
include_once 'include_php/_gestion_plantilla.php';
sesionActiva();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Login</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <link href="css/css_login.css" type="text/css" rel="stylesheet"  />
        <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>   
        <script src="js/js_highlight.js" type="text/javascript"></script>
        <link href="css/CSS_highlight.css" type="text/css" rel="stylesheet"  />
    </head>
    <body>    
        <div class="encabezado" id="encabezado">
            <div class="mini_perfil">
                <div class="slogan"><a href="index.php">LapStore</a></div>
                <div class="clearboth"></div>        
            </div>         
        </div>
        <div class="contenido">
            <div class="marco">            
                <div id="highlight"> 
                    <?php
                    echo listarImagenesBanner();
                    ?>
                    <div id="navegation">
                        <p class="selected"> <a href="javascript:;"><span></span></a></p>
                        <p> <a href="javascript:;"><span></span></a></p>
                        <p> <a href="javascript:;"><span></span> </a></p>
                        <p class="withoutborder"> <a href="javascript:;"><span></span>
                            </a></p>
                    </div>
                    <div class="navegationbg">&nbsp;</div>
                </div>            


                <div class="form_login">
                    <h1>Iniciar Sesi&oacute;n!</h1>

                    <?php
                    echo login_usuario();
                    ?>
                    <!--                    include_php/_gestion_login.php-->
                    <form  method="post" action="<? echo $_SERVER['PHP_SELF'] ?>" >
                        <table>
                            <tr>
                                <td><label for="usuario">Usuario :<span>(Email)</span></label></td>                          	
                            </tr>
                            <tr>
                                <td><input type="text" id="usuario" name="usuario"/></td>
                            </tr>
                            <tr>
                                <td><label for="password">Contrase&ntilde;a : </label></td>                          	
                            </tr>
                            <tr>
                                <td><input type="password" id="password" name="password" /></td>
                            </tr>
                            <tr>
                                <td></td>                            
                            </tr>
                            <tr>
                                <td><span id="recordar"><input type="checkbox"  id="c_recordar" name="recordar"/><label for="c_recordar">Recordar me</label></span></td>
                            </tr>                            
                            <tr>
                                <input type="hidden" name="login" value="login"/>
                                <td ><input type="submit" class="boton"  id="acceder" value="Iniciar sesi&oacute;n"/></td>
                            </tr>                    
                        </table>
                    </form>
                </div>
            </div>
            <div  class="marco">                
                <h2>¿Eres nuevo?</h2>
                <span id="span_registro"><a href="registrar.php">Registrate aqui!</a></span>
            </div>
        </div>
    </body>
</html>
