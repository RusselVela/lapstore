// JavaScript Document
window.onload=function(){
	document.getElementById("agregarProducto").onclick=sonCamposCorrectos;
}

function sonCamposCorrectos(){
	if(!esNombreCorrecto()){
		alert("El nombre del producto no puede estar vacío");
		document.getElementById("campoNombre").focus();
		return false;
	}else{
		if(!esCostoEnvioCorrecto()){
			document.getElementById("campoCostoE").focus();
			return false;
		}else{
			if(!esCostoUnitarioCorrecto()){
				document.getElementById("campoCostoU").focus();
				return false;
			}else{
				if(!esCantidadCorrecta()){
					document.getElementById("campoCantidad").focus();
					return false;
				}else{
					if(!esDescripcionCorrecta()){
						alert("La descripción del producto no puede ser vacía");
						document.getElementById("campoDescripcion").focus();
						return false;
					}else{
//						if(!esURLImagenCorrecta()){
//							alert("El producto debe tener una imagen.");
//							document.getElementById("campoURLImagen").focus();
//							return false;
//						}
//                                                else{
//							return true;
//						}
    if(window.confirm("Esta seguro que desea realizar esta acción")){
        return true;
    }
    else{
        return false;
    }
					}
				}
			}
		}
	}
	
}

function esNombreCorrecto(){
	var nombre=document.getElementById("campoNombre").value;
	if(nombre==""){
		return false;
	}
	return true;
}

function esCostoEnvioCorrecto(){
	var costo=document.getElementById("campoCostoE").value;
	if(costo==""){
		alert("Costo de envío vacío.");
		return false;
	}
	if(!esNumeroFlotante(costo)){
		alert("Solo se permiten cantidades decimales");
		return false;
	}
	return true;
}

function esCostoUnitarioCorrecto(){	
	var costo=document.getElementById("campoCostoU").value;	

	if(costo==""){
		alert("Costo unitario vacío.");
		return false;
	}
	if(!esNumeroFlotante(costo)){			
	alert("Solo se permiten cantidades decimales");	
		return false;
	}
	return true;
}

function esNumeroFlotante(numero){	
	var expresionFlotante=/^([0-9])*[.]?[0-9]*$/;
	if(numero.match(expresionFlotante)){
		return true;
	}else{
		return false;
	}
}

function esCantidadCorrecta(){
	var cantidad=document.getElementById("campoCantidad").value;
	if(cantidad==""){
		alert("Cantidad del producto vacía.");
		return false;
	}
	if(isNaN(cantidad)){
		alert("Solo se permiten números enteros.");
		return false;
	}
	if(cantidad<0){
		alert("La cantidad tiene que ser mayor o igual a cero.");
		return false;
	}
	return true;
}

function esDescripcionCorrecta(){
	var descripcion=document.getElementById("campoDescripcion").value;
	if(descripcion==""){
		return false;
	}
	return true;
}

function esURLImagenCorrecta(){
	var urlImagen=document.getElementById("campoURLImagen").value;
	if(urlImagen==""){
		return false;
	}
        return true;
}
