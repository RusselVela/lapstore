//función para leer cookies
function GetCookie (name, InCookie) {
	var prop = name + "="; // propiedad buscada
	var plen = prop.length;
	var clen = InCookie.length;
	var i=0;
	if (clen>0) { // Cookie no vacío
		i = InCookie.indexOf(prop,0); // aparición de la propiedad
		if (i!=-1) { // propiedad encontrada
			// Buscamos el valor correspondiente
			j = InCookie.indexOf(";",i+plen);
			if(j!=-1) // valor encontrado
				return unescape(InCookie.substring(i+plen,j));
			else //el último no lleva ";"
				return unescape(InCookie.substring(i+plen,clen));
		}
		else
			return "";
	}
	else
            return "";
}

//función para escribir cookies
function SetCookie (name, value) {
	// número de parámetros variable.
	var argv = SetCookie.arguments;
	var argc = SetCookie.arguments.length;
	// asociación de parámetros a los campos cookie. 
	var expires = (argc > 2) ? argv[2] : null
	var path = (argc > 3) ? argv[3] : null
	var domain = (argc > 4) ? argv[4] : null
	var secure = (argc > 5) ? argv[5] : false
	// asignación de la propiedad tras la codificación URL
	document.cookie = name + "=" + escape(value) +
		((expires==null) ? "" : ("; expires=" + expires.toGMTString())) +
		((path==null) ? "" : (";path=" + path)) +
		((domain==null) ? "" : ("; domain=" + domain)) +
		((secure==true) ? "; secure" : "");
}

function EstablecerPresentacion(usuarioId){
    if(window.confirm("Esta seguro que desea cambiar el tema")){
	SetCookie(usuarioId+"estilo",document.presentacion.estilo.value)
	SetCookie(usuarioId+"elemento",document.presentacion.estilo.selectedIndex)
	window.location.reload()        
        return true;
    }
    else{
        return false;
    }
}

function EscribirEstilo(usuarioId) {
	var estilo
	var cadena

	estilo = GetCookie(usuarioId+"estilo",document.cookie)
	if ( estilo == "" ) {
		cadena = "<link rel=\"stylesheet\" href=\"css/css_plantilla.css\" type=\"text/css\">"
	} else {
            
		cadena = "<link rel=\"stylesheet\" href=\"css/" + estilo + "\" type=\"text/css\">"
	}
	document.writeln (cadena)
}

function DefinirForma(usuarioId) {
    if(GetCookie(usuarioId+"elemento", document.cookie)!=""){        
	document.presentacion.estilo.selectedIndex = GetCookie(usuarioId+"elemento", document.cookie);
    }
}