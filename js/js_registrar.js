// JavaScript Document
window.onload = function(){   
    document.getElementById("registrar").onclick=validarCamposRegsitro;
}
function validarCamposRegsitro(){
    if(!validarNombre()){
        alert("Nombre invalido");
        document.getElementById("nombre").focus();
        return false;
    }
    else{
        if(!validarApellido()){
            alert("Apellido invalido");
            document.getElementById("apellido").focus();
            return false;			
        }
        else{
            if(!esEmailValido(document.getElementById("email"))){
                alert("Email invalido");
                document.getElementById("email").focus();
                return false;
            }
            else{
                if(!validarContraseniasRegistros()){
                    alert("Escriba correctamente la contraseña");
                    document.getElementById("password_nuevo").focus();
                    return false;
                }
//                else{ 
//                    return true;
//                }
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

function esEmailValido(email){
    if (email != undefined && email.value != "" ){
        var expreEmail=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
        if(!email.value.match(expreEmail)){
            return false;
        }
        else{
            return true;
        }
    }
    else{
        return false;
    }
}
function validarContraseniasRegistros(){
    var contrasenia1 = document.getElementById("password_nuevo").value;
    var contrasenia2 = document.getElementById("password_nuevo_v").value;		
    if(contrasenia1==contrasenia2 && contrasenia1!=""){
        return true;
    }
    else{
        return false;
    }
}
	
function validarApellido(){
    if(document.getElementById("apellido").value!=""){
        return true;
    }
    else{
        return false;
    }
}
function validarNombre(){
    if(document.getElementById("nombre").value!=""){
        return true;
    }
    else{
        return false;
    }
}
