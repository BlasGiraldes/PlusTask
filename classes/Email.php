<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'de31401d2140e8';
        $mail->Password = '533b92e8baf0a0';

        $mail->setFrom('blas@plustask.com');
        $mail->addAddress('blas@plustask.com', 'PlusTask.com');
        $mail->Subject = 'Confirma tu cuenta';

        // SET HTML

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Body = "
        <html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        p {
            line-height: 18px;
        }

        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }

        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #000000;
            color: #ffffff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
    </style>
    <body>
        <h1>PlusTask</h1>
        <h2>Hola, " . $this->nombre . ". ¡Gracias por registrarte!</h2>
        <p>Confirma tu correo electrónico para que puedas comenzar a disfrutar de PlusTask</p>
        <a href='http://localhost:3000/confirmar?token=" . $this->token . "'><button>Verificar</button></a>
        <p>Si tú no te registraste en PlusTask, por favor ignora este correo electrónico.</p>
        <div><p></p></div>
        <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
    </body>
    </html>";

        // Enviar mail

        $mail->send();
    }

    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'de31401d2140e8';
        $mail->Password = '533b92e8baf0a0';

        $mail->setFrom('blas@plustask.com');
        $mail->addAddress('blas@plustask.com', 'PlusTask.com');
        $mail->Subject = 'Reestablece tu Contraseña';

        // SET HTML

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Body = "
        <html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        p {
            line-height: 18px;
        }

        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }

        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #000000;
            color: #ffffff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
    </style>
    <body>
        <h1>PlusTask</h1>
        <h2>Hola, " . $this->nombre . ". Solicitaste un reestablecimiento de contraseña.</h2>
        <p>Sigue el siguiente enlace:</p>
        <a href='http://localhost:3000/reestablecer?token=" . $this->token . "'><button>Reestablecer</button></a>
        <p>Si tú no solicitaste reestablecerla, por favor ignora este correo electrónico.</p>
        <div><p></p></div>
        <p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correo electrónico entrante. Por favor no respondas a este mensaje.</span></p>
    </body>
    </html>";

        // Enviar mail

        $mail->send();
        $mail->send();
    }

}
