<?php
    include_once 'conexionGeneral.php';
//    include_once 'usuarioDB.php';
    
    function obtenerTodosPost(){        
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM post ORDER BY postId DESC";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        $indice=0;
        $posts = array();
        while ($fila = mysql_fetch_array($resultado_peticion)){
            $indice++;
            $posts[$indice]=$fila;
        }
        cerrarConexion($conexion);
        return $posts;
    }
   
    function obtenerPostPorId($postId){
        
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM post WHERE postId = '".mysql_real_escape_string($postId)."'";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        $posts = array();
        while($fila = mysql_fetch_array($resultado_peticion)){
            $posts[0]= $fila;
        }
        cerrarConexion($conexion);
        return $posts;
    }
    
    function obtenerRepostDePostPorId($postId){
        
        $conexion = abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM repost WHERE postID='".$postId."'ORDER BY postId ASC";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        $indice=0;
        $posts=array();
        while ($fila = mysql_fetch_array($resultado_peticion)){
            $indice++;
            $posts[$indice]=$fila;
        }
        cerrarConexion($conexion);
        return $posts;
    }
    
    function agregarPost($usuarioId,$articulo){
        
        $conexionDB=abrirConexion();
        selecionarBD($conexionDB);
        $sql = "INSERT INTO post (usuarioId, articulo, fecha)
                VALUES ('".mysql_real_escape_string($usuarioId)."','".mysql_real_escape_string($articulo)."','".date('Y-m-d')."');";
        if (ejecutarConsulta($sql,$conexionDB)) {
            
        }
        cerrarConexion($conexionDB);
    }
    
    function borrarPost($postId){
        $postId = $_POST["id_post"];        
        $conexionDB=abrirConexion();
        selecionarBD($conexionDB);
        $sql = "DELETE FROM `post` WHERE `postId` = ".mysql_real_escape_string($postId);
        if (ejecutarConsulta($sql,$conexionDB)) {
            
        }
        cerrarConexion($conexionDB);
    }
    
    function agregarRepost($postId,$usuarioId,$articulo){
        
        $conexionDB=abrirConexion();
        selecionarBD($conexionDB);
        $sql = "INSERT INTO repost (postID, usuarioId, articulo, fecha) 
            VALUES ('".mysql_real_escape_string($postId)."','".mysql_real_escape_string($usuarioId)."','".mysql_real_escape_string($articulo)."','".date('Y-m-d')."');";
        if (ejecutarConsulta($sql,$conexionDB)){
            
        }
        cerrarConexion($conexionDB);
    }
    
    function borrarRepost($repostId){
        
        $conexionDB=abrirConexion();
        selecionarBD($conexionDB);
        $sql = "DELETE FROM `repost` WHERE `repostId` = ".mysql_real_escape_string($repostId);
        if (ejecutarConsulta($sql,$conexionDB)) {
            
        }
        cerrarConexion($conexionDB);
    }    
    

  
?>
