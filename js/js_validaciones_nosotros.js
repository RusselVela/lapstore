// JavaScript Document
	window.onload = function(){
		document.getElementById("enviar").onclick=validarCamposComentario;
	}

	function validarCamposComentario(){
			if(!validarComentario()){
				alert("Comentario vacio");
				document.getElementById("comentario").focus();
				return false;			
			}
//			else{
//				return true;
//			}
    if(window.confirm("Esta seguro que desea realizar esta acción")){
        return true;
    }
    else{
        return false;
    }
		
	}
	function validarComentario(){
		if(document.getElementById("comentario").value!=""){
			return true;
		}
		else{
			return false;
		}
	}
