/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function ventanachat(){
    var xmlHttp;
    if (window.XMLHttpRequest)
    {
        xmlHttp=new XMLHttpRequest();
    }
    else
    {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    var fetch_unix_timestamp ="";
    fetch_unix_timestamp = function()
    {
        return parseInt(new Date().getTime().toString().substring(0, 10))
    }
    var timestamp = fetch_unix_timestamp();
    xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readyState==4){
            document.getElementById("ventanachat").innerHTML=xmlHttp.responseText;
            setTimeout('ventanachat()',1000);
        }
						
    }
    xmlHttp.open("GET","include_php/_gestion_chat_1.php"+"?t="+timestamp,true);
    xmlHttp.send(null);
}
//////////////////////////////////////////////////////////////////
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

function nuevoDato()
{
    var inputIngreso=document.getElementById("enviachat");
    if(inputIngreso.value!=""){       
        var valor=inputIngreso.value;
        inputIngreso.disabled=true; 
        inputIngreso.value="Ingresando...";
        var ajax=nuevoAjax();
        ajax.open("POST", "include_php/_gestion_chat.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                
        ajax.send("mensaje="+valor);

        ajax.onreadystatechange=function()
        {
            if (ajax.readyState==4)
            {
                inputIngreso.value="";
                inputIngreso.disabled=false;
            }
        }
    }
    else{
        return false;
    }
}



window.onload = function startrefresh(){
    setTimeout('ventanachat()',1000);
}