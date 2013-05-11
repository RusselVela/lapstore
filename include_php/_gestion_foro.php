<?php

include_once 'DB/foroDB.php';
include_once 'DB/usuarioDB.php';

function listarPosts() {
    $SALTO = "\n";
    $posts = obtenerTodosPost();
    $cadena_post = "";
    foreach ($posts as $post) {
        $usuarioPost = obtenerUsuarioPorId($post['usuarioId']);
        $cadena_post .= '<div class="marco">' . $SALTO;
        $cadena_post .= '    <div id="info_usuario">' . $SALTO;
        $cadena_post .= '        <img src="' . $usuarioPost['url_foto'] . '" alt="icono del usuario"/>' . $SALTO;
        $cadena_post .= '        <span class="usuario">' . $usuarioPost['nombre'] . '</span>' . $SALTO;
        $cadena_post .= '        <span class="fecha">' . $post['fecha'] . '</span>' . $SALTO;
        $cadena_post .= '    </div>' . $SALTO;
        $cadena_post .= '    <div class="articulo">' . $SALTO;
        $cadena_post .= '        <p>' . $post['articulo'] . '</p>' . $SALTO;
        $cadena_post .= '    </div>' . $SALTO;
//            $cadena_post .= '       <input type="button" class="boton"  id="verComentario" value="VerComen" onclick= "verComentarios('.$post['postId'].')" />';
        $cadena_post .= '       <input type="button" class="boton"  id="verComentario" value="VerComen" onclick="MostrarConsulta(\'respuestas' . $post['postId'] . '\',\'verPostCompleto.php?postId=' . $post['postId'] . '\'); return false" />';
        $cadena_post .= "   <input type=\"button\" class=\"boton\"  id=\"agregar_repost\" value=\"Comentar\" onclick=\"show('nuevo_repost" . $post['postId'] . "','".$post['postId']."')\"/>";
        if ($post['usuarioId'] == $_SESSION['usuarioId'] || $_SESSION['tipo'] == 1) {
            $cadena_post .= "<form action='" . $_SERVER['PHP_SELF'] . "' method='post' >" . $SALTO;
            $cadena_post .= '    <input type="hidden" name="id_post" value="' . $post['postId'] . '"/>' . $SALTO;
            $cadena_post .= '    <input type="hidden" name="id_usuario" value="' . $post['usuarioId'] . '"/>' . $SALTO;
            $cadena_post .= '    <input type="submit" class="boton"  onclick="return confirmarEliminacion()" name="eliminar_post" value="Eliminar"/>' . $SALTO;
            $cadena_post .= '</form>' . $SALTO;
        }
        $cadena_post .= '    <div class="clearboth"></div>' . $SALTO;
        $cadena_post .= '<div class="respuestas" id="respuestas' . $post['postId'] . '">' . $SALTO;
        $cadena_post .= generarFormRespuesta($post['postId']);
        $cadena_post .= '</div>' . $SALTO;
        $cadena_post .= '</div>' . $SALTO;
    }
    if ($cadena_post == "") {
        $cadena_post = '<div class="marco">' . $SALTO;
        $cadena_post .="<h2>No hay post</h2>" . $SALTO;
        $cadena_post .= '</div>' . $SALTO;
    }
    return $cadena_post;
}

function listarPost($postId) {
    $SALTO = "\n";
    //s$cadena_post = '';
    $posts = obtenerPostPorId($postId);
    foreach ($posts as $post) {
        $cadena_post = "";      
        $cadena_post .= '    <div class="clearboth"></div>' . $SALTO;
        //$cadena_responderPost = '<div class="respuestas">' . $SALTO;
        $cadena_repost = listarRepostDePost($postId, $post['usuarioId']);
        if($cadena_repost==""){
            $cadena_post .='<div class="marco_interno">No hay comentarios</div>';
        }
        else{
            $cadena_post .= $cadena_repost;
        }
        $cadena_post .= generarFormRespuesta($postId);
        //$cadena_responderPost .= '</div>' . $SALTO;
        $cadena_post .= '</div>' . $SALTO;
    }
    if ($cadena_post == "") {
        $cadena_post = '<div class="marco">' . $SALTO;
        $cadena_post = "<h2>No selecciono un post correcto</h2>" . $SALTO;
        $cadena_post .= '</div>' . $SALTO;
    }
    return $cadena_post;
}

function generarFormRespuesta($postId) {
    $SALTO = "\n";
    $cadena_responderPost = '  <div class="marco_interno" id="nuevo_repost' . $postId . '" style="display:none;">' . $SALTO;
    $cadena_responderPost .= '<a name="Responder"></a>';
    $cadena_responderPost .= '      <form action="foro.php" method="post" >' . $SALTO;
    $cadena_responderPost .= '          <div id="info_usuario">' . $SALTO;
    $cadena_responderPost .= '              <img src="' . $_SESSION['foto'] . '" alt="icono del usuario"/>' . $SALTO;
    $cadena_responderPost .= '              <span class="usuario">' . $_SESSION["nombre"] . '</span>' . $SALTO;
    $cadena_responderPost .= '              <input type="hidden" name="usuarioId" value="' . $_SESSION["usuarioId"] . '" />' . $SALTO;
    $cadena_responderPost .= '              <input type="hidden" name="postId" value="' . $postId . '" />' . $SALTO;
    $cadena_responderPost .= '              <div class="clearboth"></div>' . $SALTO;
    $cadena_responderPost .= '          </div>' . $SALTO;
    $cadena_responderPost .= '          <div class="articulo_nuevo">' . $SALTO;
    $cadena_responderPost .='               <input type="hidden" name="postId" value="' . $postId . '"/>' . $SALTO;
    $cadena_responderPost .= '              <textarea id="comen_post'.$postId.'" name="comen_repost"></textarea>' . $SALTO;
    $cadena_responderPost .= '              <input type="submit" class="boton"  id="agregar_repost" name="agregar_repost" value="Responder"/> ' . $SALTO;
    $cadena_responderPost .= '          </div>' . $SALTO;
    $cadena_responderPost .= '      </form>' . $SALTO;
    $cadena_responderPost .= '      <div class="clearboth"></div>' . $SALTO;
    $cadena_responderPost .= '  </div>' . $SALTO;
    return $cadena_responderPost;
}

function listarRepostDePost($postId, $usuarioId) {
    $SALTO = "\n";
    $cadena_responderPost = "";
    $reposts = obtenerRepostDePostPorId($postId);
    foreach ($reposts as $repost) {
        $usuarioPost = obtenerUsuarioPorId($repost['usuarioId']);
        $cadena_responderPost .='   <div class="marco_interno">' . $SALTO;
        $cadena_responderPost .='       <div id="info_usuario">' . $SALTO;
        $cadena_responderPost .='           <img src="' . $usuarioPost['url_foto'] . '" alt="icono del usuario"/>' . $SALTO;
        $cadena_responderPost .='           <span class="usuario">' . $usuarioPost['nombre'] . '</span>' . $SALTO;
        $cadena_responderPost .='           <span class="fecha">' . $repost['fecha'] . '</span>' . $SALTO;
        $cadena_responderPost .='       </div>' . $SALTO;
        $cadena_responderPost .='       <div class="articulo">' . $SALTO;
        $cadena_responderPost .='           <p>' . $repost['articulo'] . '</p>' . $SALTO;
        $cadena_responderPost .='       </div>' . $SALTO;

        if ($repost['usuarioId'] == $_SESSION['usuarioId'] || $usuarioId == $_SESSION['usuarioId'] || $_SESSION['tipo'] == 1) {
            $cadena_responderPost .="<form action='foro.php' method='post' >" . $SALTO;
            $cadena_responderPost .='    <input type="hidden" name="postId" value="' . $postId . '"/>' . $SALTO;
            $cadena_responderPost .='    <input type="hidden" name="id_repost" value="' . $repost['repostId'] . '"/>' . $SALTO;
            $cadena_responderPost .='    <input type="hidden" name="id_usuario" value="' . $repost['usuarioId'] . '"/>' . $SALTO;
            $cadena_responderPost .='    <input type="submit" class="boton"  onclick="return confirmarEliminacion()"  name="eliminar_repost" value="Eliminar"/>' . $SALTO;
            $cadena_responderPost .='</form>' . $SALTO;
        }
        $cadena_responderPost .='       <div class="clearboth"></div>' . $SALTO;
        $cadena_responderPost .='   </div>' . $SALTO;
    }
    return $cadena_responderPost;
}

function registrarPost() {
    if (isset($_POST['usuarioId'])) {
        if (isset($_POST['agregar_post'])) {
            if ($_POST['agregar_post'] == 'Publicar' && $_POST['comen_post'] != '') {
                agregarPost($_POST["usuarioId"], $_POST["comen_post"]);
            }
        }
    }
}

function eliminarPost() {
    if (isset($_SESSION['usuarioId'])) {
        if (isset($_POST['eliminar_post'])) {
            if ($_POST['eliminar_post'] == 'Eliminar' && ($_POST['id_usuario'] == $_SESSION['usuarioId'] || $_SESSION['tipo'] == 1)) {
                borrarPost($_POST["id_post"]);
            }
        }
    }
}

function registrarRepost() {
    if (isset($_POST['usuarioId'])) {
        if (isset($_POST['agregar_repost'])) {
            if ($_POST['agregar_repost'] == 'Responder' && $_POST['comen_repost'] != '') {
                agregarRepost($_POST['postId'], $_POST["usuarioId"], $_POST["comen_repost"]);
            }
        }
    }
}

function eliminarRepost() {
    if (isset($_SESSION['usuarioId'])) {
        if (isset($_POST['eliminar_repost'])) {
            if ($_POST['eliminar_repost'] == 'Eliminar' && ( $_POST['id_usuario'] == $_SESSION['usuarioId'] || $_SESSION['tipo'] == 1 )) {
                borrarRepost($_POST["id_repost"]);
            }
        }
    }
}

?>