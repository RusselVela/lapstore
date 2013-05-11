// JavaScript Document

window.onload=function(){
	document.getElementById("agregarCategoria").onclick=validarFormulario;
}
	
function validarFormulario(){
	if(!validarNombreCategoria()){
		alert("Nombre de Categoría no puede ser vacío");
		document.getElementById("campoNombre").focus();
		return false;
	}
        //return true;
    if(window.confirm("Esta seguro que desea realizar esta acción")){
        return true;
    }
    else{
        return false;
    }
}
	
function validarNombreCategoria(){
	var nombre=document.getElementById("campoNombre").value;
	if(nombre==""){
		return false;
	}else{
		return true;
	}
}