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
	alert("ehhh");
}