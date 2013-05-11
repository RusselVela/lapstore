<?php
    
    function actualizarImagenes($cadena_sql){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        if($cadena_sql!=""){
        $sql = "UPDATE banner SET ".$cadena_sql." WHERE bannerId = 1;";    
        }
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        cerrarConexion($conexion);
        return $resultado_peticion;
    }
    
    function obtenerTodasImagen(){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM banner WHERE bannerId=1";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        $indice=0;
        $banners = array();
        while ($fila = mysql_fetch_array($resultado_peticion)){
            $indice++;
            $banners[$indice]=$fila;
        }
        cerrarConexion($conexion);
        return $banners;  
    }
?>
