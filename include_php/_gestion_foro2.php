<?php 

include_once 'DB/foroDB.php';
include_once 'DB/usuarioDB.php';

function obtenerFormularioNuevoPost(){
	$html=" <div id='formularioPost'>
				<table>
					<tr><td><input type='hidden' id='usuario' value='".$_SESSION['usuarioId']."' /></td></tr>
					<tr>
						<td>Categoría</td>
						<td>".construirSelectTemas()."</td>
					</tr>
					<tr>
						<td>Título</td>
						<td><input type='text' id='nombrePost'/></td>
					</tr>
					<tr>
						<td>Contenido</td>
						<td class='fp'><textarea id='articulo'></textarea></td>
					</tr>
					<tr>
						<td colspan='2'><input type='button' value='Publicar' onclick='javascript:crearPost();'/></td>
					</tr>
				</table>
			</div>";
	return $html;
}

function construirSelectTemas(){
	$temas=obtenerTemas();
	$html="<select id='tema'>";
	foreach($temas as $tema){		
		$idTema=$tema["idTema"];
		$nombreTema=$tema["tema"];
		$html.="<option value='".$idTema."'>".$nombreTema."</option>";
	}
	$html.="</select>";
	return $html;
}

function crearPost($idUsuario){
}

function listarTemas(){
	$temas=obtenerTemas();
	$html="<table>";
	foreach($temas as $tema){
		$idTema=$tema["idTema"];
		$nombreTema=$tema["tema"];
		$usuario=obtenerUsuarioPorId($tema["creador"]);
		$nombreUsuario=$usuario["nombre"]." ".$usuario["apellido"];
		$numeroPosts=$tema["numeroPosts"];
		$html.="<tr>
					<th>".$nombreTema."</td>
					<th>".$nombreUsuario."</td>
					<th>".$numeroPosts." posts</td>
				</tr>";
		$html.=listarPostsPorTema($idTema);
	}
	
	$html.="</table>";
	return $html;
}

function listarPostsPorTema($idTema){
	$listaPosts=obtenerPostsPorTema($idTema);
	$html="";
	foreach($listaPosts as $post){
		$html.="<tr>";		
		$nombrePost=$post["nombre"];
		$usuario=obtenerUsuarioPorId($post["creador"]);		
		$nombreUsuario=$usuario["nombre"]." ".$usuario["apellido"];
		$numeroRespuestas=$post["respuestas"];
		$html.="<td><a href='post.php?idPost=".$post["idPost"]."'>".$nombrePost."</a></td>
				<td>".$nombreUsuario."</td>
				<td>".$numeroRespuestas." respuestas</td>";	
		$html.="</tr>";
	}
	return $html;
}

function construirPost($idPost){
	$post=obtenerPostPorId($idPost);    
	$SALTO = "\n";
    $cadena_post = "";
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
    if ($cadena_post == "") {
        $cadena_post = '<div class="marco">' . $SALTO;
        $cadena_post .="<h2>No hay post</h2>" . $SALTO;
        $cadena_post .= '</div>' . $SALTO;
    }
    return $cadena_post;
}

function listarPost($postId) {
    $SALTO = "\n";
    $posts = obtenerPostPorId($postId);
    foreach ($posts as $post) {
        $cadena_post = "";      
        $cadena_post .= '    <div class="clearboth"></div>' . $SALTO;
        $cadena_repost = listarRepostDePost($postId, $post['usuarioId']);
        if($cadena_repost==""){
            $cadena_post .='<div class="marco_interno">No hay comentarios</div>';
        }
        else{
            $cadena_post .= $cadena_repost;
        }
        $cadena_post .= generarFormRespuesta($postId);
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
    $cadena_responderPost .= '      <form action="post.php?idPost='.$postId.'" method="post" >' . $SALTO;
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
            $cadena_responderPost .="<form action='post.php?idPost=".$postId."' method='post' >" . $SALTO;
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
				header("Location:foro2.php");
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