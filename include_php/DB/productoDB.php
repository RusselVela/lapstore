<?php
include_once 'conexionGeneral.php';
    function obtenerIdSiguiente(){
        $conexion = abrirConexion();
        selecionarBD($conexion);
        $sql="SELECT MAX(productoId) AS id FROM producto";
        $resulatdo_consulta = ejecutarConsulta($sql, $conexion);
        //$rs =// mysql_query("SELECT MAX(productoId) AS id FROM producto");
        if ($fila = mysql_fetch_row($resulatdo_consulta)) {
            $id = trim($fila[0])+1;
        }
        return $id;
    }
    function obtenerTodosProductos(){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM producto ORDER BY nombre ASC";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        $indice=0;
        $categorias = array();
        while ($fila = mysql_fetch_array($resultado_peticion)){
            $indice++;
            $categorias[$indice]=$fila;
        }
        cerrarConexion($conexion);
        return $categorias;        
    }
    
    
    
    function existe_Producto($nombre){
        //Verifica la existencia de la información solicitada (a través de una sentencia SQL) en la base de datos
        $conexionDB=  abrirConexion();
        selecionarBD($conexionDB);
        $existe_referencia = true;
        $sql = "SELECT * FROM producto WHERE nombre = '".mysql_real_escape_string($nombre)."'";
        //echo $sql;
        $lresult = mysql_query($sql, $conexionDB); 
        if (!$lresult){
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $cquery <br>";
            $cerror .= "Descripción: ".mysql_error($conexionDB);
            die($cerror);   
        }
        else{
            if ( mysql_num_rows($lresult) == 0 )
                $existe_referencia = false;   
        }   
        return $existe_referencia;
    }

    function obtenerProductoPorId($productoId){        
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM producto WHERE productoId ='".mysql_real_escape_string($productoId)."'";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        cerrarConexion($conexion);
        $productos=  array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $productos[0] = $fila;
        }
        return $productos;
    }
    
    function insertarProducto($nombre,$categoriaId,$envio,$costo,$cantidad,$descripcion,$imagen){
        $lentrada_creada = false;          
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql="INSERT INTO producto (nombre , categoriaId , envio , costo , cantidad, url_icono, descripcion )
            VALUES ('$nombre','$categoriaId','$envio','$costo','$cantidad','$imagen','$descripcion')";
        $resulta_consulta = ejecutarConsulta($sql,$conexion);
        if (!$resulta_consulta){
            $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: ".mysql_error();
            die($cerror);
        }
        else{
            if (mysql_affected_rows($conexion) >= 1)
                $lentrada_creada = true;
        }
//        mysql_free_result($conexion);
        cerrarConexion($conexion);
        return $lentrada_creada;
    }
    
    function actualizarProducto($nombre,$categoria,$productoId,$envio,$costo,$cantidad,$descripcion,$imagen){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $lentrada_creada = false; 
        if($imagen!=""){
            $sql = "UPDATE producto SET nombre = '".$nombre."',categoriaId = '".$categoria."', descripcion ='".$descripcion."',
                url_icono ='".$imagen."', envio = '$envio', costo='$costo', cantidad = '$cantidad'
                WHERE productoId = ".$productoId.";";
        }
        else{
             $sql = "UPDATE producto SET nombre = '".$nombre."',categoriaId = '".$categoria."', descripcion ='".$descripcion."',
                envio = '$envio', costo='$costo', cantidad = '$cantidad'
                WHERE productoId = ".$productoId.";";
        }
        //echo $sql;
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        
        if (!$resultado_peticion){
            $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: ".mysql_error();
            die($cerror);
        }
        else{
            if (mysql_affected_rows($conexion) >= 1)
                $lentrada_creada = true;
            }
        cerrarConexion($conexion);
    }

    function actualizarCantidadDeProducto($cantidad,$productoId){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $lentrada_creada = false;
        $sql = "UPDATE producto SET cantidad = '$cantidad'  WHERE productoId = ".$productoId.";";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        if (!$resultado_peticion){
            $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: ".mysql_error();
            die($cerror);
        }
        else{
            if (mysql_affected_rows($conexion) >= 1)
                $lentrada_creada = true;
            }
        cerrarConexion($conexion);
        return $lentrada_creada;
    }
    
    function obtenerProductosPorCategoria($categoriaId){        
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM producto WHERE categoriaId = '".mysql_real_escape_string($categoriaId)."'";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        $productos = array();
        $indice = 0;
        while($fila = mysql_fetch_array($resultado_peticion)){            
            $productos[$indice]= $fila;
            $indice++;
        }
        cerrarConexion($conexion);
        return $productos;
    }    
    
    function borrarProducto($idProducto){
        $conexion  = abrirConexion();
        selecionarBD($conexion);
        $registro_eliminado = false;
        $sql =  "DELETE FROM producto 
            WHERE productoId = '".mysql_real_escape_string($idProducto)."'";
       // echo $sql
       // ;
        $resultado = ejecutarConsulta($sql,$conexion);
        if (!$resultado){   
            $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
            $cerror .= "SQL: $sql <br>";
            $cerror .= "Descripción: ".mysql_error();
            die($cerror);
        }
        else{
            if (mysql_affected_rows($conexion) >= 1)
                $registro_eliminado = true;
        }
        cerrarConexion($conexion);
        return $registro_eliminado;
    }
    function  obtenerCaracteristicasDelProducto($productoId){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM caracteristicas WHERE idProducto ='".mysql_real_escape_string($productoId)."'";
//        echo $sql;
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        
        $caracteristicasProducto=  array();
        $i=0;
//        echo "zzzz";
        while ($fila = mysql_fetch_array($resultado_peticion)) {
//            echo "zzzz";
//            echo "<br>".$fila['DD']."<br>";
//            echo "zzzz";
            $caracteristicasProducto[$fila['atributo']] = $fila;
            $i++;
        }
        cerrarConexion($conexion);
//        echo "<br>".json_encode($caracteristicasProducto)."<br>";
        return $caracteristicasProducto;
    }

?>
