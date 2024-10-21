<?php
namespace MiAplicacion\Clases;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use MiAplicacion\Interfaces\InterfazProveedorCorreo;

final class ProveedorMailtrap implements InterfazProveedorCorreo{
    public function enviarCorreo(string $paraQuien, string $asunto, string $mensaje): bool
    {
        // Crea una nueva instancia de PHPMailer, con true decimos que queremos generar excepciones si ocurren
        $mail = new PHPMailer(true);

        // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Habilita la salida de depuración detallada
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita el cifrado TLS; `ssl` también aceptado
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '02cf71a3731489';
        $mail->Password = '6b02661606bfaa'; 

        try {
            // Configura y envía el mensaje
            $mail->setFrom('ciza01@educantabria.es', 'carmen iza'); // 
            $mail->addAddress($paraQuien);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;
            $mail->send();
            return true; // si ejecuta esto es que ha ido bien
        } catch (Exception $e) {
            //echo 'Error de correo: ' . $mail->ErrorInfo;
            return false; // ha habido algún error

        }

    }

}

?>