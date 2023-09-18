<?php
    $destinatario = "leo_diego_03@hotmail.com"; // correo donde se recibiran los emails
    $nombre = $_POST['nameContacto'];
    $email = $_POST['emailContacto'];
    $asunto = $_POST['asuntoContacto'];
    $mensaje = $_POST['mensajeContacto'];

    $mensajeCompleto = '
        <html>
            <head>
                <title> Prueba de envio de correo</title>
            </head>
            <body>
                <h1>Solicitud de contacto desde correo de prueba! </h1>
                <p>
                    Contacto: '.$nombre.' - '.$asunto.' </br>
                    Mensaje: '.$mensaje.'
                </p>
            </body>
        </html>
    ';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF8\r\n";
    $headers .= "FROM: $nombre <$email> \r\n";

    // con esta funcion enviamos el mensaje
    mail($destinatario,$asunto,$mensajeCompleto,$headers);
    
    echo "<script>alert('Correo enviado exitosamente');</script>";
    echo "<script> setTimeout(\"location.href='../index.php'\",100);</script>";
?>