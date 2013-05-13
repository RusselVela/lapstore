<?php
include 'include_php/_gestion_plantilla.php';
include_once 'config.inc.php';
include_once 'include_php/_gestion_catalogo.php';
//    session_start();
//    if(isset($_SESSION['login'])){
//        if(Plantilla::filtro_login($_SESSION['login'])){
filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Documento sin título</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        ?>

        <link href="css/css_catalogo.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

        <?php
        echo agregarCSSkMenuAdmin();
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="js/js_producto.js" language="javascript" type="text/javascript"></script>
        <script src="js/js_carrito_cookies.js" language="javascript" type="text/javascript"></script>
        <script src="ajax/buscador.js" language="javascript" type="text/javascript"></script>
    </head>    
    <body>
        <div class="encabezado">
            <?php
            echo generarEncabezadoHTML();
            echo generarMenu();
            echo generarMenuAdmin();
            ?>            
        </div>       
        <div class="contenido" >        
            <h1><span>Productos</span></h1>
            <div class="marco">
                <div class="div_buscador">
                <?php 	echo recibirBusqueda();
						echo obtenerOpcionesAvanzadas();
				?>
<!--                    <input type="text" id="productoABuscar" onkeyup="if(esTeclaValida(event)==1){desplegarResultados();}"  onfocus="borrarTextoDefault();" onblur="colocarTextoDefault();" value="¿Que busca?"/>-->
                </div>
            </div>
            <form action="comparacionProductos.php" method="get">
                <input type="submit" name="nombre"   value="COMPARAR"/>       
                <div class="productos" id="productosEncontrados">
                    <?php
                    echo listarProductosDeCategoria();
                    ?>
                </div>
            </form>
        </div>        
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="js/jquery.smooth-scroll.min.js"></script>
        <script src="js/lightbox.js"></script>

<<<<<<< HEAD
        <script>
            jQuery(document).ready(function($) {
                $('a').smoothScroll({
                    speed: 1000,
                    easing: 'easeInOutCubic'
                });
=======
<script>
  jQuery(document).ready(function($) {		
  		$("#btnOcultarAvanzadas").css("display","none");
		$("#avanzadas").css("display","none");
		
		parametro=$('#productoABuscar').val();
		if(parametro!="¿Que busca?" && parametro!=""){
			desplegarResultados();
		}	
	  
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });
//>>>>>>> origin/Russel

                $('.showOlderChanges').on('click', function(e){
                    $('.changelog .old').slideDown('slow');
                    $(this).fadeOut();
                    e.preventDefault();
                })
            });

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-2196019-1']);
            _gaq.push(['_trackPageview']);

//<<<<<<< HEAD
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <script type="text/javascript" >
            function generarInpustHidenCompa(id,nombre)
            {
                if(document.getElementById('compCK'+id).checked){
                    imputs = '<input type="hidden" name="idComp[]"  value="'+id+'"/>';
                    imputs += '<input type="hidden" name="nomComp[]"  value="'+nombre+'"/>hola';
                    document.getElementById('comparacion'+id).innerHTML=imputs;
                }
                else{
                    document.getElementById('comparacion'+id).innerHTML=""; 
                }
            }            
        </script>
=======
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
 function mostrarAvanzadas(){
	 $("#btnOcultarAvanzadas").fadeIn("slow");
	 $("#avanzadas").fadeIn("slow");
	 $("#btnMostrarAvanzadas").fadeOut("slow");
 }
 
 function ocultarAvanzadas(){	 
 	$("#btnMostrarAvanzadas").fadeIn("fast");
	$("#avanzadas").fadeOut("fast");	 
	$("#btnOcultarAvanzadas").fadeOut("fast");
	$("#selectCategoria option[value=-1]").attr("selected",true);
 }
</script>
>>>>>>> origin/Russel
    </body>
</html>
