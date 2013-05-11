<?php
    include_once  'include_php/_gestion_plantilla.php';
    include_once 'include_php/DB/usuarioDB.php';
    include_once 'config.inc.php';
    include_once 'include_php/_gestion_usuario.php'; '';
    filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Modificar Perfil</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        echo agregarCSSkMenuAdmin();
        ?>        
        <link href="css/css_actualizar_perfil.css" rel="stylesheet" type="text/css" />
        <script src="js/js_actualizar_perfil.js" type="text/javascript"></script>
        <script src="js/js_validaciones_eliminar.js" type="text/javascript"></script>
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
            <h1>Informacion de perfil</h1>     
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" >
                <div class="marco">
                    <h1>Datos personales</h1>
                     <?php
                        echo actualizarPerfilUsuario();
                        $datosUsuario =  obtenerUsuarioPorId($_SESSION['usuarioId']);
                     ?>                    
                    <table>
                        <input type="hidden" name="tipo" value="<?php echo (isset($datosUsuario['tipo']))? $datosUsuario['tipo'] : '';?>"/>
                        <tr>
                            <td><label for="nombre">Nombre</label></td>
                            <td><input type="text" id="nombre" name="nombre" value="<?php echo (isset($datosUsuario['nombre']))? $datosUsuario['nombre'] : '';?>"/></td>
                        </tr>
                        <tr>
                            <td><label for="apellido">Apellido</label></td>
                            <td><input type="text" id="apellido" name="apellido" value="<?php echo (isset($datosUsuario['apellido']))? $datosUsuario['apellido'] : '';?>"/></td>
                        </tr>
                        <tr>
                            <td><label for="edad">Edad</label></td>
                            <td > 
                                <select  id="edad"  name="edad" >
                                    <?php
                                        echo generarEdadOptions((isset($datosUsuario['edad']))? $datosUsuario['edad'] :6);
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2"><label>Sexo</label></td>
                            <td><input type="radio" name="sexo" id="sexo1"  value="M" <?php echo ((isset($datosUsuario['sexo']))&&$datosUsuario['sexo']=="M")?'checked="checked"':""?>/> <label for="sexo1">M</label>
                            </td>
                        </tr>
                        <tr>
                            <td>   <input type="radio" name="sexo" id="sexo2"  value="H" <?php echo ((isset($datosUsuario['sexo']))&&$datosUsuario['sexo']=="H")?'checked="checked"':""?> /> <label for="sexo2">H</label>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="descripcion">Descripci&oacute;n</label></td>
                            <td><textarea rows="5" cols="30" id="descripcion" name="descripcion" ><?php echo (isset($datosUsuario['descripcion']))? $datosUsuario['descripcion'] : '';?></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="password_nuevo">Contrase&ntilde;a : </label></td>
                            <td><input type="password" name="password_nuevo" id="password_nuevo" value="<?php echo (isset($datosUsuario["contrasenia"])) ? $datosUsuario["contrasenia"] : ""; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="password_nuevo_v">Contrase&ntilde;a :<span>(Confirmar contrase&ntilde;a)</span></label></td>
                            <td><input type="password" name="password_nuevo_v" id="password_nuevo_v" value="<?php echo (isset($datosUsuario["contrasenia"])) ? $datosUsuario["contrasenia"] : ""; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label>Subir foto</label></td>
                            <td><input type="file" id="foto" name="foto"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input id="guardar" type="submit" name="guardar_usuario" class="boton" value="Guardar" /></td>
                        </tr>
                    </table>
                    <a href="principal.php" class="boton">Cancelar</a>
                </div>
            </form>
        </div>
    </body>
</html>
