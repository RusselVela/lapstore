<?php
    $conexion = mysql_connect("localhost","root","");
    if(!$conexion){
        die('No he podido conectar: '.mysql_error());
    }
	
    if(mysql_query("CREATE DATABASE proyecto_web",$conexion)){
        echo "Se ha creado la base de datos";
    }
    else{
        echo "No se ha podido crear la base de datos por el siguiente error: ". mysql_error();
    }
    
    mysql_select_db("proyecto_web",$conexion);
    $sql = "CREATE TABLE usuarios(
        personaID int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(personaID),
        email varchar(15),
        contrasenia varchar(15))";
    
    mysql_query($sql,$conexion);
    
    mysql_close($conexion);
?>
