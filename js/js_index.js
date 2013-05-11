// JavaScript Document
window.onload = function(){    
    document.getElementById("acceder").onclick=validarCamposAcceso;
    var sweet = new highlight();
    sweet.slider('highlight','navegation',6);
    validarRecuerdame();
}

function validarCamposAcceso(){
    if(!esEmailValido(document.getElementById("usuario"))){
        alert("Usuario (Email invalido)");
        document.getElementById("usuario").focus();
        return false;
    }
    else{
        if(!validarContrasenia()){
            alert("Escriba correctamente la contraseña");
            document.getElementById("password").focus();
            return false;
        }
        else{  
            if(window.document.getElementById("c_recordar").checked){
                createCookie("recordar","true",6,"/recordar");
                createCookie("nombre",window.document.getElementById("usuario").value,6,"/nombre");
                return true;
            }
            else{
                eraseCookie("recordar");
                eraseCookie("nombre");
                return true;
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

function validarContrasenia(){
    var contrasenia1 = document.getElementById("password").value;
    if(contrasenia1!=""){
        return true;
    }
    else{
        return false;
    }
}	

function validarRecuerdame(){
    //		c_recordar
    if(readCookie("recordar")!=null && readCookie("recordar")=="true"){
        window.document.getElementById("c_recordar").checked="checked";
        window.document.getElementById("usuario").value=readCookie("nombre");
    }
    return true;
}
// Gestión dde cookies
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else 
        var expires = "";
    document.cookie = name+"="+value+expires+" ;path=/";
}

function readCookie(name){
    var nameEQ = name + "=";
    //alert(window.document.cookie);
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') 
            c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}	