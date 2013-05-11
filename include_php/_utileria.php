<?php
      function upload_imagen($destination_dir,$name_media_field,$nuevo_nombre){
        $tmp_name = $_FILES[$name_media_field]['tmp_name'];
        if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
        {
            $img_type  = $_FILES[$name_media_field]['type'];
            if(isset($nuevo_nombre)){
                if($nuevo_nombre==null){
                    $nuevo_nombre  = $_FILES[$name_media_field]['name'];
                }
                else{
                    $img_file = $nuevo_nombre;
                }
            }
            else{
                $img_file=$_FILES[$name_media_field]['name'];
            }
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type,"jpg")) || strpos($img_type,"png") )){
                if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
                    return true;
                }
            }
        }
        return false;
    }
    function obtnerExtencionArchivo($img_type){
        if(strpos($img_type, "gif"))
            return '.'."gif";
        else
            if (strpos($img_type, "jpeg") )
                return '.'."jpeg";
            else
                if(strpos($img_type,"jpg"))
                    return '.'."jpg";
                else
                    if(strpos($img_type,"png") )
                        return '.'."png";
        return "";
    }
?>
