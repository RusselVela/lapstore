<?php 

include("DB/foroDB.php");

if(isset($_GET["crearPost"]) && $_GET["crearPost"]==true){
	$articulo=$_GET["articulo"];
	$idTema=$_GET["idTema"];
	$nombrePost=$_GET["nombrePost"];
	$idUsuario=$_GET["idUsuario"];
	agregarPost($idUsuario,$articulo,$idTema,$nombrePost);
	header("Location:../foro2.php");
}

?>