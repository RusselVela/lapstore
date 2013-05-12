<?php
    include_once 'conexionGeneral.php';
  
  	function obtenerTemas(){
		$conexion=abrirConexion();
		selecionarBD($conexion);
		$sql="SELECT * FROM temas ORDER BY idTema DESC";
		$resultado_peticion=ejecutarConsulta($sql,$conexion);
		$indice=0;
		$temas=array();
		while($fila=mysql_fetch_array($resultado_peticion)){
			$numeroPosts=obtenerNumeroPostsPorTema($fila["idTema"]);
			$temas[$indice]["idTema"]=$fila["idTema"];
			$temas[$indice]["tema"]=$fila["nombreTema"];
			$temas[$indice]["creador"]=$fila["idUsuarioCreador"];
			$temas[$indice]["numeroPosts"]=$numeroPosts;
			$indice++;
		}
		cerrarConexion($conexion);
		return $temas;
	}
    
	function obtenerNumeroPostsPorTema($idTema){
		$conexion=abrirConexion();
		selecionarBD($conexion);
		$sql="SELECT * FROM post WHERE idTema=".$idTema;
		$resultado_peticion=ejecutarConsulta($sql,$conexion);
		$indice=0;
		while($fila=mysql_fetch_array($resultado_peticion)){
			$indice++;
		}
		cerrarConexion($conexion);
		return $indice;
	}
	
	function obtenerPostsPorTema($idTema){
		$conexion=abrirConexion();
		selecionarBD($conexion);
		$sql="SELECT * FROM post WHERE idTema=".$idTema;
		$resultado_peticion=ejecutarConsulta($sql,$conexion);
		$indice=0;
		$listaPost=array();
		while($fila=mysql_fetch_array($resultado_peticion)){
			$listaPost[$indice]["idPost"]=$fila["postId"];
			$listaPost[$indice]["nombre"]=$fila["nombrePost"];
			$listaPost[$indice]["creador"]=$fila["usuarioId"];
			$listaPost[$indice]["respuestas"]=count(obtenerRepostDePostPorId($fila["postId"]));
			$indice++;
		}
		cerrarConexion($conexion);
		return $listaPost;
	}
	
	//FIN MODIFICACIONES
	
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
        $posts;
        if($fila = mysql_fetch_array($resultado_peticion)){ 
			$posts=$fila;
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
    
    function agregarPost($usuarioId,$articulo,$idTema,$nombrePost){  
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "INSERT INTO post (usuarioId, articulo, fecha,idTema,nombrePost)
                VALUES ('".mysql_real_escape_string($usuarioId)."','".mysql_real_escape_string($articulo)."','".date('Y-m-d')."','".mysql_real_escape_string($idTema)."','".mysql_real_escape_string($nombrePost)."');";
		//echo $sql;
        if (ejecutarConsulta($sql,$conexion)) {
			
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
