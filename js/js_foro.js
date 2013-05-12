// JavaScript Document

$(window).load(function(){
	$('#formularioPost').css("display", "none");
	//$('#formularioPost').fadeOut('slow');
});

function mostrarFormulario(){
	$('#formularioPost').fadeIn('slow');
}

function show(bloq,postId) {
    obj = document.getElementById(bloq);
    obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
    document.getElementById("comen_post"+postId).focus();
}

function crearPost(){
	nombrePost=$('#nombrePost').val();
	articulo=$('#articulo').val();
	idTema=$('#tema :selected').val();
	usuario=$('#usuario').val();
	if(nombrePost=="" || articulo==""){
		alert("Debe llenar los campos de nombre y Descripción");
		return;
	}
	if(usuario==""){
		alert("No se ha iniciado sesión");
		return;
	}
	
	direccion="include_php/crearPost.php?crearPost=true&articulo="+articulo+"&idTema="+idTema+"&nombrePost="+nombrePost+"&idUsuario="+usuario;
	location.href=direccion;
}