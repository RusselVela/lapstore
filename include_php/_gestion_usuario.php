<?php

include_once 'DB/usuarioDB.php';
include_once '_utileria.php';

function actualizarPerfilUsuario() {
    if (isset($_POST['guardar_usuario'])) {
        $ruta = 'img/usuarios';
        $exito = false;
        $name = 'foto';
        $nuevo_nombre = "usuario" . $_SESSION['usuarioId'];
        $img_type = $_FILES[$name]['type'];
        $nuevo_nombre .= obtnerExtencionArchivo($img_type);
        $var_dump = (upload_imagen($ruta, $name, $nuevo_nombre));
        if ($var_dump) {
            //echo 'FALOO';
            $exito = actualizarInformacionUsuario($_SESSION['usuarioId'], $_POST['nombre'], $_POST['apellido'], $_POST['descripcion'], $_POST['edad'], $_POST['sexo'], $ruta . '/' . $nuevo_nombre, $_POST['password_nuevo']);
        } else {
            $exito = actualizarInformacionUsuario($_SESSION['usuarioId'], $_POST['nombre'], $_POST['apellido'], $_POST['descripcion'], $_POST['edad'], $_POST['sexo'], "", $_POST['password_nuevo']);
        }
        $usuario = obtenerUsuarioPorId($_SESSION['usuarioId']);
        $_SESSION['login'] = true;
        $_SESSION['usuarioId'] = $usuario['usuarioId'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['foto'] = $usuario['url_foto'];
        if ($exito) {
            if ($var_dump)
                return "<div class='exito'>Datos guardados con exito</div>";
            else
                return "<div class='exito'>Datos guardados con exito<br/>No se subio imagen</div>";
        }
        else {
            return "<div class='error'>Error al actualizar</div>";
        }
    }
}

function actualizarPerfilUsuarioDesdeAdmin() {
    if (isset($_POST['guardar_usuario'])) {
        $exito = false;
        $exito = actualizarInformacionUsuarioDesdeAdmin($_GET['usuarioId'], $_POST['password_nuevo'], $_POST['tipo']);
        if ($exito) {
            return "<div class='exito'>Datos guardados con exito</div>";
        } else {
            return "<div class='error'>Error al actualizar</div>";
        }
    }
}

function listarUsuarios() {
    $SALTO = "\n";
    $usuarios = obtenerTodosUsuarios();

    $cadena_post = "";
    $index = 1;
    foreach ($usuarios as $usuario) {
        if ($usuario['usuarioId'] != $_SESSION['usuarioId']) {
            $class = "";
            if ($index % 2 == 0)
                $class = "par";
            $cadena_post .='            <tr class="' . $class . '">' . $SALTO;
            $cadena_post .='                <td>' . $usuario['usuarioId'] . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $usuario['nombre'] . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $usuario['apellido'] . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $usuario['tipo'] . '</td>' . $SALTO;
            $cadena_post .='                <td class="email"><div>' . $usuario['email'] . '</div></td>' . $SALTO;
            $cadena_post .='                <td>' . $usuario['edad'] . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $usuario['sexo'] . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $usuario['contrasenia'] . '</td>' . $SALTO;
            $cadena_post .='                <td class="editar"><a href="adm_usuario_modificar.php?usuarioId=' . $usuario['usuarioId'] . '"><img src="img/utileria/editar.png" alt="Editar"/></a></td>' . $SALTO;
            //'.$_SERVER['PHP_SELF'].'?usuarioId='.$usuario['usuarioId'].'
            $cadena_post .='               	<td class="borrar"><a onclick="confirmarEliminacionUsuario(' . $usuario['usuarioId'] . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
//            $cadena_post .='                </td>'.$SALTO;
            $cadena_post .='            </tr>' . $SALTO;
            $index++;
        }
    }
    if ($cadena_post == "") {
        $cadena_post .="<tr><td colspan='4'>No hay productos</td></tr>" . $SALTO;
    }
    return $cadena_post;
}

function eliminarUsuario() {
    if (isset($_GET["usuarioId"])) {
        if (borrarUsuario($_GET["usuarioId"])) {
            return "<div class='exito'>Usuario Eliminado</div>";
        } else {
            return'<div class="error">Error al eliminar Usuario</div>';
        }
    }
}

function generarEdadOptions($edad) {
    $cadenaOptions = "";  
    for ($i = 6; $i < 100; $i++) {
        if ($i == $edad) {
            $cadenaOptions .="<option value='$i' selected='selected'>$i</option>";
        } else {
            $cadenaOptions .="<option value='$i' >$i</option>";
        }
    }
    return $cadenaOptions;
}

function agregarUsuario() {
    if (isset($_POST['registrar'])) {
        $exito = false;
        if (!existe_usuario($_POST["email"])) {
            if ($_POST["nombre"] != "" && $_POST['password_nuevo_v'] == $_POST['password_nuevo']) {
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $email = $_POST["email"];
                $contrasenia = $_POST["password_nuevo"];
                if (isset($_POST['tipo'])) {
                    $exito = insertarUsuario($nombre, $apellido, $email, $contrasenia, $_POST['tipo']);
                } else {
                    $exito = insertarUsuario($nombre, $apellido, $email, $contrasenia, 0);
                }
            }
        } else {
            return '<div class="error" >Email en uso, intente con otro mail</div>';
        }
        if ($exito) {
            return '<div class="exito" >Usuario agregado con exito</div>';
        } else {
            return '<div class="error" >Error al agregar usuario</div>';
        }
    }
}

function buscarUsuarioPorId() {
    if (isset($_GET['usuarioId'])) {
        return obtenerUsuarioPorId($_GET['usuarioId']);
    }
}
?>


