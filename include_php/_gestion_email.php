<?php
require("class.phpmailer.php");
function enviarEmail() {
    if (isset($_POST['comentario'])&& $_POST['comentario']!=""){
        $mail = new PHPMailer ();
        $mail->From = "usuario@lapstore.com";
        $mail->FromName = $_SESSION['nombre'];
        $mail->AddAddress("antonio_369_astry@hotmail.com");
        $mail->addBcc("astre369@gmail.com");
        $mail->Subject = "Comentarios y Opiniones";
        $mail->Body = "<b>Comentario:</b><br/>".$_POST['comentario'];
        $mail->IsHTML(true);

        $mail->IsSMTP();
        $mail->Host = 'ssl://smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'astre369@gmail.com';
        $mail->Password = 'astre369';
        
        if (!$mail->Send()) {
            
            return '<div class="error>Error al enviar comentario</div>"';
        } else {
            return '<div class="exito" >Comentario enviado</div>';
        }
    }
}

    
?>
