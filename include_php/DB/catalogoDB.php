<?php

include_once 'conexionGeneral.php';

function obtenerTodasCategorias() {
    $conexion = abrirConexion();
    selecionarBD($conexion);
    $sql = "SELECT * FROM categoria ORDER BY nombre ASC";
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

function insertarCategoria($nombre, $descripcion, $url_img) {
    $lentrada_creada = false;
    $conexion = abrirConexion();
    selecionarBD($conexion);
    $sql = "INSERT INTO categoria (nombre , cantidad , url_icono , descripcion )
            VALUES ('" . $nombre . "','0','" .$url_img . "','" . $descripcion . "')";
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
//        mysql_free_result($conexion);
    cerrarConexion($conexion);
    return $lentrada_creada;
}

function existe_categoria($nombre) {
    //Verifica la existencia de la información solicitada (a través de una sentencia SQL) en la base de datos
    $conexionDB = abrirConexion();
    selecionarBD($conexionDB);

    $lexiste_referencia = true;

    $sql = "SELECT * FROM categoria WHERE nombre = '" . mysql_real_escape_string($nombre) . "'";
    //echo $sql;
    $lresult = mysql_query($sql, $conexionDB);
    if (!$lresult) {
        $cerror = "No fue posible recuperar la información de la base de datos.<br>";
        $cerror .= "SQL: $cquery <br>";
        $cerror .= "Descripción: " . mysql_error($conexionDB);
        die($cerror);
    } else {
        if (mysql_num_rows($lresult) == 0)
            $lexiste_referencia = false;
    }
    return $lexiste_referencia;
}

function obtenerCategoriaPorId($categoriaId) {
    //Verifica la existencia de la información solicitada (a través de una sentencia SQL) en la base de datos
    $conexionDB = abrirConexion();
    selecionarBD($conexionDB);
    $sql = "SELECT * FROM categoria WHERE categoriaId = '" . mysql_real_escape_string($categoriaId) . "'";
    //echo $sql;
    $resultado_peticion = mysql_query($sql, $conexionDB);
    if (!$resultado_peticion) {
        $cerror = "No fue posible recuperar la información de la base de datos.<br>";
        $cerror .= "SQL: $cquery <br>";
        $cerror .= "Descripción: " . mysql_error($conexionDB);
        die($cerror);
    } else {
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            return $fila;
        }
        return "";
    }
}

function borrarCategoria($idCategoria) {
    $conexion = abrirConexion();
    selecionarBD($conexion);
    $registro_eliminado = false;
    $sql = "DELETE FROM categoria WHERE categoriaId = '" . mysql_real_escape_string($idCategoria) . "'";
    //echo $sql
    
    $resultado = ejecutarConsulta($sql, $conexion);

    if (!$resultado) {
        $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
        $cerror .= "SQL: $sql <br>";
        $cerror .= "Descripción: " . mysql_error();
        die($cerror);
    } else {
        if (mysql_affected_rows($conexion) >= 1)
            $registro_eliminado = true;
    }
    cerrarConexion($conexion);
    return $registro_eliminado;
}

function actualizarCategoria($categoriaId, $nombre, $descripcion, $url) {
    $conexion = abrirConexion();
    selecionarBD($conexion);
    $lentrada_creada = false;
    if ($url != "") {
        $sql = "UPDATE categoria SET nombre = '" . $nombre . "', descripcion ='" . $descripcion . "', url_icono ='" . $url . "' WHERE categoriaId = " . $categoriaId . ";";
    } else {
        $sql = "UPDATE categoria SET nombre = '" . $nombre . "', descripcion ='" . $descripcion . "' WHERE categoriaId = " . $categoriaId . ";";
    }

    $resultado_peticion = ejecutarConsulta($sql, $conexion);

    if (!$resultado_peticion) {
        $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
        $cerror .= "SQL: $sql <br>";
        $cerror .= "Descripción: " . mysql_error();
        die($cerror);
    } else {
//        if (mysql_affected_rows($conexion) >= 1)
            $lentrada_creada = true;
    }
    cerrarConexion($conexion);
    return $lentrada_creada;
}

?>
