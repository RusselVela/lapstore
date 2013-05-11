<?php
include_once 'conexionGeneral.php';
function obtenerMensajes() {
    $conexion = abrirConexion();
    selecionarBD($conexion);
    $sql = "SELECT * FROM chat ORDER BY mensajeId DESC;";
    $resultado_peticion = ejecutarConsulta($sql, $conexion);
    $indice = 0;
    $categorias = array();
    while ($fila = mysql_fetch_array($resultado_peticion)) {
        $indice++;
        $categorias[$indice] = $fila;
    }
    cerrarConexion($conexion);
    return $categorias;
}

function insertarMensaje($mensaje,$usuario){
   $lentrada_creada = false;
    $conexion = abrirConexion();
    selecionarBD($conexion);
    $sql = "INSERT INTO chat (mensaje , usuarioId , fecha) VALUES ('".mysql_real_escape_string($mensaje)."','".mysql_real_escape_string($usuario)."','".date('Y-m-d')."');";
    $lresult = ejecutarConsulta($sql, $conexion);
    if (!$lresult) {
        $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
        $cerror .= "SQL: $sql <br>";
        $cerror .= "Descripción: " . mysql_error();
        die($cerror);
    } else {
        if (mysql_affected_rows($conexion) >= 1)
            $lentrada_creada = true;
    }
    cerrarConexion($conexion);
    return $lentrada_creada;

}
?>
