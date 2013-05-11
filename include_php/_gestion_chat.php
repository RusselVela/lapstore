<?php
include_once 'DB/chatDB.php';
include_once '../config.inc.php';
function agregarMensaje(){
    //if(isset($_POST['insertar'])){
        if($_POST['mensaje']!=null){
            insertarMensaje($_POST['mensaje'],$_SESSION['usuarioId']);
            //return '<meta http-equiv="REFRESH" content="0;url='.$GLOBALS['raiz_sitio'].'_chat.php">';
        }
//    }
}
session_start();
echo agregarMensaje();
?>
