// JavaScript Document
var nombreCookieCarrito = "carrito";
var item_number =null;

function place(id_new_item,usuarioId){
    if (readCookie(usuarioId+nombreCookieCarrito)!= null){
        //alert(readCookie(usuarioId+nombreCookieCarrito));
        var old_cookie = readCookie(usuarioId+nombreCookieCarrito);
        eraseCookie(usuarioId+nombreCookieCarrito);
        value=old_cookie + escape(id_new_item + "-");
        createCookie(usuarioId+nombreCookieCarrito, value, 1);        
    }
    else{
        value=escape(id_new_item + "-");
        createCookie(usuarioId+nombreCookieCarrito, value, 1);
    }
    alert ("Producto agregado");
}

function process_cookie(usuarioId){
    if(readCookie(usuarioId+nombreCookieCarrito)){
        var whole_cookie = unescape(readCookie(usuarioId+nombreCookieCarrito));
//        var drop_name = whole_cookie.split("=");
        if (whole_cookie != ""){
            item_number = whole_cookie.split("[-]");
            return true;
        }
        return false;
    }
    else{
        return false;
    }
}

function actualizarCarrrito(usuarioId,productoId){
    cantidad=document.getElementById(productoId).value;
    if(readCookie(usuarioId+nombreCookieCarrito)){
        var n_carrito ="";
        var x=0;
        var carrito = unescape(readCookie(usuarioId+nombreCookieCarrito));
        if (carrito != ""){
            item_number = carrito.split("-");
            if (item_number==null || item_number.length < 1){
                    n_carrito += "";
            }
            else{                
                for (i = 0; i < item_number.length - 1; i++){
                    if(item_number[i]!=productoId){
                        n_carrito+=item_number[i]+"-";            
                    }
                    else{
                        if(x<cantidad){
                            n_carrito+=item_number[i]+"-";
                            x++;
                        }
                    }
                }
            }
        }
    }
    for(x; x < cantidad;x++){
        n_carrito+=productoId+"-";
    }
    eraseCookie(usuarioId+nombreCookieCarrito);
    createCookie(usuarioId+nombreCookieCarrito,n_carrito,3);
    window.location.reload();
}

function kill_cookies(usuarioId){
    
    eraseCookie(usuarioId+nombreCookieCarrito);    
    window.location.reload();
}
	
function remove(){
    var new_cookie_raw_data = "drop this";
    if (document.orderform.orderboxes){
        for (i = 0; i < document.orderform.orderboxes.length; i++){
            if (document.orderform.orderboxes[i].checked == false){
                new_cookie_raw_data = new_cookie_raw_data + document.orderform.orderboxes[i].value + "[-]";
            }
        }
    }
	
    var drop_initialization = new_cookie_raw_data.split("drop this");
	
    if (drop_initialization[1] == ""){
        kill_cookies()
    }
	
    if (drop_initialization[1] != ""){
        var clean_data = drop_initialization[1];
        document.cookie = "stuff=" + escape(clean_data);
    }
	
    window.location = "carrito.php";
}	
function createCookie(name,value,days){
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name){
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
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

//function crearCarritoPHP(usuarioId){
//    process_cookie(usuarioId);
//    var cadena ="";
//    if (item_number==null || item_number.length < 1){
//        cadena += "";
//    }
//    else{
//        for (i = 0; i < item_number.length - 1; i++){
//            cadena+=item_number[i]+",";            
//        }
//    }
//    document.location = "carrito.php?c="+cadena;
//}

//function crearCarrito(){
//    var cadena ="";
//    if (item_number.length < 1){
//        cadena += "<h4>No hay elementos en el carrito. Agrega algunos utilizando el enlace</h4>";
//    }
//    else{
//        for (i = 0; i < item_number.length - 1; i++){
//            productos[item_number[i]].cantidad++;
//        }
//        parametros="";
//        var total = 0;
//        var costoEnvio=0;
//        cadena +="<table>";
//        for (i = 0; i <productos.length; i++){
//            if(productos[i].cantidad!=0){
//                cadena +="<tr>";
//                cadena +="<th>Icono</th>";
////<input type=\"button\" class=\"boton\" onclick=\"remove()\" value=\"Eliminar\" /> Quitar: <input type=\"checkbox\" name=\"orderboxes\" value=\"" + productos[i].identificador + "\">                
//                cadena +="<th>Producto</th>";
//                cadena +="<th>Cantidad</th>";                
//                cadena +="<th>Precio unitario</th>";
//                cadena +="<th>Precio total por producto</th>";
//                cadena +="</tr>";
//                cadena +="<tr>";
//                cadena +="<td><img src=\""+productos[i].icono+"\" alt=\"Icono del producto\" \></td>";
//                cadena +="<td>" + productos[i].nombre+ "</td>";
//                cadena +="<td>"+productos[i].cantidad+"</td>";
//                cadena +="<td>$" + productos[i].costo+"</td>";
//                cadena +="<td>$" + (productos[i].costo*productos[i].cantidad)+"</td>";
//                total+=productos[i].costo*productos[i].cantidad+productos[i].envio;
//                costoEnvio+=productos[i].envio*productos[i].cantidad;
//                cadena +="</tr>";
//            }
//        }
//        cadena +="<tr>";
//        cadena +="<td class=\"totales\" colspan=\"3\"></td>";
//        cadena +="<td>Costos de envio:</td>";
//        cadena +="<td> $"+costoEnvio+"</td>";
//        cadena +="</tr>";
//        cadena +="<tr>";
//        cadena +="<td class=\"totales\" colspan=\"3\"></td>";
//        cadena +="<td>Total: </td>";
//        cadena +="<td> $"+total+"</td>";
//        cadena +="</tr>";
//        cadena +="<tr>";
//        cadena +="<td class=\"totales\" colspan=3></td>";
//        cadena +="<td class=\"totales\"></td>";
//        cadena +="</tr>";
//        cadena +="<tr>";
//        cadena +="<td class=\"totales\"></td>";
//        cadena +="<td class=\"totales\"><input type=\"button\" class=\"boton\" onclick=\"remove()\" value=\"Eliminar selecionados\" /></td>";						
//        cadena +="<td class=\"totales\" ><a href=\"javascript:kill_cookies()\"><input type=\"button\" class=\"boton\" value=\"Vaciar carrito\"/></a></td>";						
//        cadena +="<td class=\"totales\"><a href=\"#\"><input type=\"button\" class=\"boton\" value=\"Pagar\"/></a></td>";
//        cadena +="</tr>";																							
//        cadena +="</table>";
//    }					
//    window.document.getElementById("contenidoCarrito").innerHTML=cadena;
//}

// Gestión dde cookies
