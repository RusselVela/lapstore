<?php
include_once 'DB/portadaDB.php';
include_once 'DB/conexionGeneral.php';

function actualizarImagenBanner() {
    if (isset($_POST['actualizar_banner'])) {
        $ruta = 'img/banner';
        $name1 = 'imagen_1';
        $name2 = 'imagen_2';
        $name3 = 'imagen_3';
        $name4 = 'imagen_4';
        $respuesta = "";
        $cadena_sql = "";
        $nuevo_nombre = $name1;
        $img_type = $_FILES[$name1]['type'];
        $nuevo_nombre .= obtnerExtencionArchivo($img_type);
        $var_dump = (upload_imagen($ruta, $name1, $nuevo_nombre));
        if ($var_dump) {
            if ($_POST['desc_1'] != "") {
                $desc = ", desc_1='" . $_POST['desc_1'] . "' ";
            }
            else
                $desc = "";
            $cadena_sql .="imagen_1='" . $ruta . '/' . $nuevo_nombre . "' " . $desc . "";            
            $respuesta .="<div class='exito'>Imagen 1 subida<div>";
        }
        else {
            $respuesta .="<div class='error'>No se subio la imagen 1<div>";
        }

        $nuevo_nombre = $name2;
        $img_type = $_FILES[$name2]['type'];
        $nuevo_nombre .= obtnerExtencionArchivo($img_type);
        $var_dump = (upload_imagen($ruta, $name2, $nuevo_nombre));
        if ($var_dump) {
            if ($_POST['desc_2'] != "") {
                $desc = ", desc_2='" . $_POST['desc_2'] . "' ";
            } else {
                $desc = "";
            }
            if ($cadena_sql != "")
                $cadena_sql .=", imagen_2='" . $ruta . '/' . $nuevo_nombre . "' " . $desc . "";
            else
                $cadena_sql .=" imagen_2='" . $ruta . '/' . $nuevo_nombre . "' " . $desc . "";
            $respuesta .="<div class='exito'>Imagen 2 subida<div>";
        }
        else {
            $respuesta .="<div class='error'>No se subio la imagen 2<div>";
        }

        $nuevo_nombre = $name3;
        $img_type = $_FILES[$name3]['type'];
        $nuevo_nombre .= obtnerExtencionArchivo($img_type);
        $var_dump = (upload_imagen($ruta, $name3, $nuevo_nombre));
        if ($var_dump) {
            if ($_POST['desc_3'] != "") {
                $desc = ", desc_3='" . $_POST['desc_3'] . "' ";
            } else {
                $desc = "";
            }
            if ($cadena_sql != "")
                $cadena_sql .=", imagen_3='" . $ruta . '/' . $nuevo_nombre . "' " . $desc . "";
            else
                $cadena_sql .=" imagen_3='" . $ruta . '/' . $nuevo_nombre . "' " . $desc . "";
            $respuesta .="<div class='exito'>Imagen 3 subida<div>";
        }
        else {
            $respuesta .="<div class='error'>No se subio la imagen 3<div>";
        }

        $nuevo_nombre = $name4;
        $img_type = $_FILES[$name4]['type'];
        $nuevo_nombre .= obtnerExtencionArchivo($img_type);
        $var_dump = (upload_imagen($ruta, $name4, $nuevo_nombre));
        if ($var_dump) {
            if ($_POST['desc_4'] != "") {
                $desc = ", desc_4='" . $_POST['desc_4'] . "' ";
            } else {
                $desc = "";
            }
            if ($cadena_sql != "")
                $cadena_sql .=", imagen_4='" . $ruta . '/' . $nuevo_nombre . "' " . $desc;
            else
                $cadena_sql .=" imagen_4='" . $ruta . '/' . $nuevo_nombre . "' " . $desc;
            $respuesta .="<div class='exito'>Imagen 1 subida<div>";
        }
        else {
            $respuesta .="<div class='error'>No se subio la imagen 4<div>";
        }
        //echo $cadena_sql;
        $actualizarImagenes = actualizarImagenes($cadena_sql);
        if ($actualizarImagenes) {
            $respuesta .="<div class='exito'>Exito al actualizar portada</div>";
        } else {
            $respuesta = "<div class='error'>Error al actualizar portada</div>";
        }
        return $respuesta;
    }
}

function listarImagenesBanner() {
    $SALTO = "\n";
    $imagenes = obtenerTodasImagen();
    $cadena_img = "";
    foreach ($imagenes as $imagen) {
        $cadena_img .='<img src="' . $imagen['imagen_1'] . '" alt="' . $imagen['desc_1'] . '" />' . $SALTO;
        $cadena_img .='<img src="' . $imagen['imagen_2'] . '" alt="' . $imagen['desc_2'] . '" />' . $SALTO;
        $cadena_img .='<img src="' . $imagen['imagen_3'] . '" alt="' . $imagen['desc_3'] . '" />' . $SALTO;
        $cadena_img .='<img src="' . $imagen['imagen_4'] . '" alt="' . $imagen['desc_4'] . '" />' . $SALTO;
    }
    return $cadena_img;
}

?>