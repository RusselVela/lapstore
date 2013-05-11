/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// JavaScript Document

var textoDefecto="¿Que es lo que busca?";

window.onload = function(){
    var sweet = new highlight();
    sweet.slider('highlight','navegation',6);
};

function borrarTextoDefault(){    
    var valor=document.getElementById("buscador").value;
    if(valor==textoDefecto){
        document.getElementById("buscador").value="";
	}
}

function colocarTextoDefault(){
    var valor=document.getElementById("buscador").value;
    if(valor=="")
        document.getElementById("buscador").value=textoDefecto;
}

function obtenerTextoDefecto(){
	return textoDefecto;
}