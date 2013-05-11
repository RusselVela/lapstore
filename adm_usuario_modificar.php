<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_usuario.php';
include_once 'include_php/_gestion_plantilla.php';
filtroLoginAdmin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        ?> 
        <link href="css/css_menu_adm.css" rel="stylesheet" type="text/css" />
        <link href="css/css_actualizar_perfil.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="js/js_registrar.js" ></script>
        <script type="text/javascript" language="javascript" src="js/js_adm_actualizar_usuario.js"></script>
        <title>Agregar Producto</title>
    </head>
    <body>
        <div class="encabezado">
            <?php
            echo generarEncabezadoHTML();
            echo generarMenu();
            echo generarMenuAdmin();
            ?>
        </div>
        <div class="contenido">
            <h1>Agregar nuevo Usuario</h1>
            <div class="marco">    
                <?php
                echo actualizarPerfilUsuarioDesdeAdmin();

                $usuario = buscarUsuarioPorId();
                ?>
                <div class="exito"><label><?php echo ((isset($usuario['email']))) ? $usuario['email'] : "" ?></label></div>
                <br/>
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <table>
                        <tr>
                            <td rowspan="2"><label>Tipo</label></td>
                            <td><input type="radio" name="tipo" id="tipo1" value="1" <?php echo ((isset($usuario['tipo'])) && $usuario['tipo'] == 1) ? 'checked="checked"' : "" ?>/> <label for="tipo1">Administrador</label>
                            </td>
                        </tr>
                        <tr>
                            <td>   <input type="radio" name="tipo" id="tipo0" value="0" <?php echo ((isset($usuario['tipo'])) && $usuario['tipo'] == 0) ? 'checked="checked"' : "" ?> /> <label for="tipo0">Cliente</label>
                            </td>
                        </tr>                            

                        <tr>
                            <td><label for="password_nuevo">Contrase&ntilde;a : </label></td>
                            <td><input type="password" name="password_nuevo" id="password_nuevo" value="<?php echo (isset($usuario["contrasenia"])) ? $usuario["contrasenia"] : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="password_nuevo_v">Contrase&ntilde;a :<span>(Confirmar contrase&ntilde;a)</span></label></td>
                            <td><input type="password" name="password_nuevo_v" id="password_nuevo_v" value="<?php echo (isset($usuario["contrasenia"])) ? $usuario["contrasenia"] : ""; ?>"/></td>
                        </tr>                            
                        <tr>
                            <td colspan="2"><input type="submit" name="guardar_usuario" class="boton" id="registrar" value="Guardar"/></td>
                        </tr>        
                    </table>        
                </form>
                <a href="principal.php" class="boton">Cancelar</a>    
            </div>
        </div>

    </body>
</html>
