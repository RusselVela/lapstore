<?php    
    include_once 'conexionGeneral.php';
    
    function obtenerUsuarioPorEmail($usuarioEmail){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM usuarios WHERE email ='".mysql_real_escape_string($usuarioEmail)."'";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        cerrarConexion($conexion);
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            return $fila;
        }
        return $fila;
    }
    
    function obtenerUsuarioPorId($usuarioId){  
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM usuarios WHERE usuarioId ='".mysql_real_escape_string($usuarioId)."'";
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        cerrarConexion($conexion);
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            return $fila;
        }
        return $fila;
    }
    
    function obtanerDatosEnvioUsuarioPorId($usuarioId){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM datosUsuarioEnvio WHERE usuarioId ='".mysql_real_escape_string($usuarioId)."'";        
        $resultado_peticion = ejecutarConsulta($sql,$conexion);
        cerrarConexion($conexion);
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            return $fila;
        }
        return $fila;
    }
    
    function insertarUsuario($nombre,$apellido,$email,$contrasenia,$tipo){
        $es_registro_exitoso=false;
        $conexionDB=abrirConexion();
        selecionarBD($conexionDB);               
        $sql = "INSERT INTO USUARIOS (nombre,apellido,email,contrasenia,url_foto,tipo) VALUES (\"" . $nombre .
                "\",\"" . $apellido . "\",\"" . $email . "\", \"" . $contrasenia . "\", \"img/usuarios/usuario.png\",".$tipo.");";        
        //echo $sql;
        if (ejecutarConsulta($sql,$conexionDB)) {
            $es_registro_exitoso=true;
        }
        cerrarConexion($conexionDB);
        return $es_registro_exitoso;
    }
    
    function actualizarInformacionUsuario($usuarioId,$nombre,$apellido,$descripcion,$edad,$sexo,$urlFoto,$contrasenia){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        if($urlFoto!=""){
        $sql = "UPDATE usuarios SET nombre = '".$nombre."', apellido ='".$apellido."', descripcion = '".$descripcion."', edad =".$edad.", 
                sexo ='".$sexo."', url_foto ='".$urlFoto."', contrasenia='".$contrasenia."' WHERE usuarioId = ".$usuarioId.";";    
        }
        else{
            $sql = "UPDATE usuarios SET nombre = '".$nombre."', apellido ='".$apellido."', descripcion = '".$descripcion."', edad =".$edad.", 
                sexo ='".$sexo."', contrasenia='".$contrasenia."' WHERE usuarioId = ".$usuarioId.";";                
        }
        
        //echo $sql;
        $ejecutarConsulta = ejecutarConsulta($sql,$conexion);
        cerrarConexion($conexion);
        return $ejecutarConsulta;
    }
    
    function actualizarInformacionUsuarioDesdeAdmin($usuarioId,$contrasenia,$tipo){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "UPDATE usuarios SET  contrasenia='".$contrasenia."',tipo='".$tipo."' WHERE usuarioId = ".$usuarioId.";";                        
       // echo $sql;
        $ejecutarConsulta = ejecutarConsulta($sql,$conexion);
//k        echo $ejecutarConsulta;
        cerrarConexion($conexion);
        return $ejecutarConsulta;
    }
    
    function obtenerTodosUsuarios(){
        $conexion=abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM usuarios ORDER BY nombre ASC";
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
    
    function borrarUsuario($usuarioId){
        $conexion  = abrirConexion();
        selecionarBD($conexion);
        $registro_eliminado = false;
        $sql =  "DELETE FROM usuarios 
            WHERE usuarioId = '".mysql_real_escape_string($usuarioId)."'";
        //echo $sql
        ;
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
    
    function existe_usuario($email){
        //Verifica la existencia de la información solicitada (a través de una sentencia SQL) en la base de datos
        $conexionDB=  abrirConexion();
        selecionarBD($conexionDB);
        $existe_referencia = true;
        $sql = "SELECT * FROM usuarios WHERE email = '".mysql_real_escape_string($email)."'";
      //  echo $sql;
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
    ?>
