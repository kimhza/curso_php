<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Enviar email 

* Enviar email en texto plano:
Al trabajar en forma local o en VPS, los correos no se envian, por lo tanto 
hay que instalar un servidor SMTP. Una opcion es usar un cliente de SMTP
que conecte con un proveedor. 
1- Para esto basta con instalar: sudo apt-get install ssmtp (en ubuntu)
o descargar hMailServer en Windows.
2- Posteriormente abrimos la configuracion de PHP (php.ini)
que se encuentra en esta ruta: /etc/php/{versión}/cli/php.ini
3- Modificamos sendmail_path, asi:
sendmail_path = /usr/sbin/ssmtp -t
4- Luego configuramos ssmtp:
que se encuentra en esta ruta: /etc/ssmtp/ssmtp.conf
** por ejm: para que conecte con gmail:
root=micuenta@gmail.com
mailhub=smtp.gmail.com:587
rewriteDomain=midomonio.com
hostname=FQDN.yourdomain.com
UseTLS=Yes
UseSTARTTLS=Yes
AuthUser=micuenta@gmail.com
AuthPass=micontraseña
FromLineOverride=yes

Una vez este configurado se puede enviar email usando el metodo mail()
mail(string $email_destinatario, string $asunto, string $mensaje, array $headers[]);
$headers = [
    'From' => 'curso@php.com',
    'Content-type' => 'text/plain; charset=utf-8'
];
mail('correo@falso.com', 'Día especial', 'Gracias por suscribirte', $headers);

En el header (cabecera) indicamos la dirección del emisario (nosotros por medio de From) 
y configuramos el correo para que admita acentos o carácteres especiales del español (Content-type).


* Enviar email en HTML:
No varia mucho del ejm anterior, solo se debe modificar el content-type en la cabecera
para que admita HTML y añadir MIME-Version.

Ejm: 
// Nuestro mensaje debe ser HTML
$mensaje = '
<html>
<head>
  <title>Feliz día del SPAM</title>
</head>
<body>
  <p>¿Qué tal?</p>
  <table>
    <tr>
      <th>Usuario</th>
      <th>Apellido</th>
      <th>Nacimiento</th>
    </tr>
    <tr>
        <td>Barba</td>
        <td>Negra</td>
        <td>1718</td>
    </tr>
  </table>
</body>
</html>
';

// Define que será de tipo será nuestro mensaje: HTML. Y la dirección del emisor.
$headers = [
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=utf-8',
    'From' => 'curso@php.com'
];

// Lo enviamos
mail('correo@falso.com', 'Día especial', $mensaje, $headers);

* Si necesitamos realizar acciones avanzadas como indicar la configuracion
del servidor SMTP o enviar archivos adjuntos podemos hacer uso de PHPMailer.
1- Se debe instalar en el proyecto con composer
composer require phpmailer/phpmailer

Ejm:
// Importa
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('vendor/autoload.php');

// Crea objeto
$mail = new PHPMailer();

try {
    // Configuración servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.correo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'usuario@correo.com';
    $mail->Password   = 'contraseña';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('emisor@correo.es', 'Nombre emisor');
    // Quien lo recibe
    $mail->addAddress('receptor@correo.es', 'Nombre receptor');

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = 'HTML de mi mensaje';

    // Enviar
    $mail->send();

} catch (Exception $e) {
    // Errores
    echo $e;
}
-->
</body>

</html>