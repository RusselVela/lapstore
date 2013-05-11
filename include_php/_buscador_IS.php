<?php 


function generarBuscador(){
	$html="<div class='contenedor-buscador'>";
	$html.="	<div class='toogle-buscador'>Buscador</div>";
	$html.="	<div class='cajaBusqueda'><input type='text' id='buscador' size='30'/></div>";
	$html.="	<div class='resultadosAjax'></div>";
	$html.="</div>";
	
	return $html;
}


?>