<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function insertarPedido($productoId,$usuarioId,$cantidad){
        $conexionDB=abrirConexion();
        selecionarBD($conexionDB);
        $sql = "INSERT INTO pedido(productoId, usuarioId, cantidad,fecha)
            VALUES ('".mysql_real_escape_string($productoId)."','".mysql_real_escape_string($usuarioId)."','".mysql_real_escape_string($cantidad)."','".date('Y-m-d')."');";
        $exito = ejecutarConsulta($sql,$conexionDB);
        cerrarConexion($conexionDB);
        return $exito;
    }
    
?>
