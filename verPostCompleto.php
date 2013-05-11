<?php 
    include_once 'config.inc.php';
    include_once 'include_php/_gestion_plantilla.php';    
    include_once 'include_php/_gestion_foro.php';      
    filtro_login();
?>  
<?php
if (isset($_GET['postId'])) {
    echo listarPost($_GET['postId']);
}
?>