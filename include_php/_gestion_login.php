<?php

include_once 'DB/usuarioDB.php';

function login_usuario() {
    if (isset($_POST['login'])) {
        if (isset($_POST["usuario"])) {
            $usuarioEmail = $_POST["usuario"];
            if (isset($_POST["password"])) {
                $password = $_POST["password"];
                $usuario = obtenerUsuarioPorEmail($usuarioEmail);
                if ($usuario != null) {
                    if ($usuarioEmail == trim($usuario['email']) && $password == trim($usuario['contrasenia'])) {
                        $_SESSION['login'] = true;
                        $_SESSION['usuarioId'] = $usuario['usuarioId'];
                        $_SESSION['nombre'] = $usuario['nombre'];
                        $_SESSION['foto'] = $usuario['url_foto'];
                        $_SESSION['tipo'] = $usuario['tipo'];
                        //echo $_SESSION['foto'];
						header('Location: ' . $GLOBALS['raiz_sitio'] . 'principal.php');
                    } else {
                        $_SESSION['login'] = false;
                        return "<div class='error'>Contrase&ntilde;a incorrecta</div>";
                    }
                } else {
                    return "<div class='error'>Usuario incorrecto</div>";
                }
            }
        }
    }
}
?>

