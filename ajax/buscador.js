
function nuevoAjax()
{ 
    /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
    var xmlhttp=false; 
    try 
    { 
        // Creacion del objeto AJAX para navegadores no IE
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
    }
    catch(e)
    { 
        try
        { 
            // Creacion del objet AJAX para IE 
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
        catch(E) {
            xmlhttp=false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!="undefined") {
        xmlhttp=new XMLHttpRequest();
    } 

    return xmlhttp; 
}

function borrarTextoDefault(){    
    var textoDefault="¿Que busca?";
    var valor=document.getElementById("productoABuscar").value;
    if(valor==textoDefault)
        document.getElementById("productoABuscar").value="";
}

function colocarTextoDefault(){
    var textoDefault="¿Que busca?";
    var valor=document.getElementById("productoABuscar").value;
    if(valor=="")
        document.getElementById("productoABuscar").value=textoDefault;
}

function esTeclaValida(evento)
{
    var teclaPresionada=(document.all) ? evento.keyCode : evento.which;                    
    if(teclaPresionada>=65 && teclaPresionada<=90){
        return 1;
    }
    
    if(teclaPresionada>=48 && teclaPresionada<=57){
        return 1;
    }

    if(teclaPresionada>=96 && teclaPresionada<=105){
        return 1;
    }
    
    if(teclaPresionada==8){
        return 1;
    }
    return 0;
}


function desplegarResultados(){    
    var valor=document.getElementById("productoABuscar").value;
    // Valido con una expresion regular el contenido de lo que el usuario ingresa
    if(valor==""){
        document.getElementById("productosEncontrados").innerHTML="";
    }
    var reg=/(^[a-zA-Z0-9.@ ]{1,40}$)/;
    if(reg.test(valor)){
        var ajax=nuevoAjax();
        ajax.open("POST", "include_php/_gestion_buscador.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("busqueda="+valor);
        ajax.onreadystatechange=function(){	
            if (ajax.readyState==4){
                var respuesta="";
                if(ajax.responseText){
                    respuesta=ajax.responseText;
                    document.getElementById("productosEncontrados").innerHTML=respuesta;
                }
                else{
                    respuesta="No se encontraron productos que coincidan con el termino de busqueda";
                    document.getElementById("productosEncontrados").innerHTML=respuesta;
                }
            }
        }
    }
}