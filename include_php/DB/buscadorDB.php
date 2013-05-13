<?php
include_once 'conexionGeneral.php';

function validaBusqueda($parametro) {
    // Funcion para validar la cadena de busqueda de la lista desplegable
    if (preg_match("^[a-zA-Z0-9.@ ]{1,40}$", $parametro))
        return TRUE;
    else
        return FALSE;
}

function buscarCoincidencias($parametro,$categoria) {
    //if (validaBusqueda($parametro)) {
		$filtro="";
		if($categoria!=-1){
			$filtro=" AND categoriaId=".$categoria;
		}
        $conexion = abrirConexion();
        selecionarBD($conexion);
        $sql = "SELECT * FROM producto WHERE nombre LIKE '" . mysql_real_escape_string($parametro) . "%'".$filtro." ORDER BY nombre ASC";

        $resultado_peticion = ejecutarConsulta($sql, $conexion);
        $indice = 0;

        $coincidencias = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $indice++;
            $coincidencias[$indice] = $fila;
        }
        cerrarConexion($conexion);    
        
        return $coincidencias;
   // }
}
?>