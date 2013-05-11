<?php       
    function abrirConexion() {
        $conexion = @mysql_connect($GLOBALS["servidor"], $GLOBALS["usuarioDB"], $GLOBALS["contrasenaDB"]) or 
                die('<div class="error" style="font-family:Arial, Helvetica, sans-serif;font-size:20px;">Intente acceder en otro momento ERROR: " ' . mysql_error()).'"</div>';
        return $conexion;
    }

    function selecionarBD($conexion) {
        return @mysql_select_db($GLOBALS["base_datos"], $conexion);
    }

    function ejecutarConsulta($query,$onexion) {
        return @mysql_query($query, $onexion);
    }

    function cerrarConexion($conexion) {
        return @mysql_close($conexion);
    }


?>
