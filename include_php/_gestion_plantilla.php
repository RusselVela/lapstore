<?php

include_once '_gestion_catalogo.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function generarBuscador(){
	$html="<div class='div_buscador'>
				<input type='text' id='buscador' onfocus='javascript:borrarTextoDefault();' onblur='javascript:colocarTextoDefault();' value='¿Que es lo que busca?' size='35'/>
           </div>";
	return $html;
}

function generarEncabezadoHTML() {
    return '
            <div class="mini_perfil">                
                <div class="slogan"><a href="principal.php">LapStore</a></div>
                <ul>
					'.//<li class="buscador"><a href="categoria.php">Buscar</a>'.generarBuscador().'</li>
                    '<li class="verPerfil"><a  href ="#">Mi cuenta</a>
                    	<ul>
	                        <li class="verPerfil"><a href="actualizar_perfil.php">Modificar</a></li>
                            <li class="verPerfil"><a href="preferencias.php">Preferencias</a></li>
	                    	<li ><a href="include_php/logout.php">Logout</a></li>
                        </ul>
					</li>	
                    <li class="verCarrito"><a href="carrito.php">Carrito</a></li>	
                    <li><img src="' . $_SESSION['foto'] . '" alt="imagen usuario"/></li>
                </ul>
            </div>
            <div class="clearboth"></div>
            ';
}

function generarMenu() {
    return '            <div class="menu">
                <ul>
                    <li><a  href="principal.php">Principal</a></li>
                    <li class="categoria"><a href="categoria.php">Productos</a>'
            . listarCategoriasMenu() .
            '</li>                   
                    <li><a href="foro.php">Foro</a></li>
                    <li><a href="acerca.php">Nosotros</a></li>
                   
                </ul>  
                <div class="clearboth"></div>                     
            </div> ';
}

function generarMenuAdmin() {
    if ($_SESSION['tipo'] == 1) {
        return '
                    <div id="menu_adm">
					<span id="t_menu">Menu Admin</span>
                <ul>
                    <li><a href="adm_actualizar_banner.php">Banner</a></li>
                    <li>
                        <a href="adm_categoria_lista.php">Categorias</a>
                    </li>
                    <li>
                        <a href="adm_producto_lista.php">Productos</a>
                    </li>
                    <li>
                        <a href="adm_usuarios_lista.php">UsuarioS</a>
                    </li>                
                </ul>
            </div>';
    } else {
        return '';
    }
}

function filtro_login() {
    session_start();
    if (isset($_SESSION['login'])) {
        $logueado = $_SESSION['login'];
        if (!$logueado) {
            header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
        }
    } else {
        header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
    }
}

function sesionActiva() {
    session_start();
    if (isset($_SESSION['login'])) {
        $logueado = $_SESSION['login'];
        if ($logueado) {
            header("Location: " . $GLOBALS['raiz_sitio'] . "principal.php");
        }
    }
}

function filtroLoginAdmin() {
    session_start();
    if (isset($_SESSION['login'])) {
        $logueado = $_SESSION['login'];
        if (!$logueado || $_SESSION['tipo'] == 0) {
            header("Location: " . $GLOBALS['raiz_sitio'] . "principal.php");
        }
    } else {
        header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
    }
}

function agregarCSSkMenuAdmin() {
    if ($_SESSION['tipo'] == 1) {
        return '<link href="css/css_menu_adm.css" rel="stylesheet" type="text/css" />';
    } else {
        return '';
    }
}

function estilo() {
    return'       <script language="JavaScript" src="js/js_estilos.js">
        </script>        
        <script language="JavaScript">
        <!--
        EscribirEstilo(' . $_SESSION['usuarioId'] . ')
        //-->
        </script>';
}

?>
