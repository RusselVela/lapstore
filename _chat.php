<?php
include_once 'config.inc.php';
include_once 'include_php/_gestion_plantilla.php';
include_once 'include_php/_gestion_email.php';
filtro_login();
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Chat Grupal</title>    	
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <?php
        echo estilo();
        echo agregarCSSkMenuAdmin();
        ?>
        <link rel="stylesheet" type="text/css" href="css/css_principal.css" />
        <link rel="stylesheet" type="text/css" href="css/css_chat.css"/>
        <script stype="text/javascript" src="ajax/js_chat.js">
            
//			function ventanachat(){
//				var xmlHttp;
//				if (window.XMLHttpRequest)
//				  {
//				  xmlHttp=new XMLHttpRequest();
//				  }
//				else
//				  {
//				  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
//				  }
//				  var fetch_unix_timestamp ="";
//					fetch_unix_timestamp = function()
//						{
//						return parseInt(new Date().getTime().toString().substring(0, 10))
//						}
//					var timestamp = fetch_unix_timestamp();
//				xmlHttp.onreadystatechange=function(){
//						if(xmlHttp.readyState==4){
//							document.getElementById("ventanachat").innerHTML=xmlHttp.responseText;
//							setTimeout('ventanachat()',1000);
//						}
//						
//						}
//						xmlHttp.open("GET","include_php/_gestion_chat_1.php"+"?t="+timestamp,true);
//					xmlHttp.send(null);
//			}
//			window.onload = function startrefresh(){
//					setTimeout('ventanachat()',1000);
//				}
	</script>
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
            <h1>Chat</h1> 
            <div class="marco">
                
                <p>Un espacio para resolver tus dudas con otros usuarios:</p>
                <!--include_php/_gestion_chat.php-->
                <form action="" method="post">
                    <div class="entrada">
                        <input type="text" name="mensaje" id="enviachat" />
                        <input name="insertar" onclick="nuevoDato();" type="submit" value="Enviar" class="boton"/>
                    </div>
		</form>
		<div  id="ventanachat" class="ventanachat">
			<script type="text/javascript">
				ventanachat();
			</script>
		</div>
                    <a href="index.php" class="boton">Inicio</a>
            </div>          
        </div>
    </body>
</html>
