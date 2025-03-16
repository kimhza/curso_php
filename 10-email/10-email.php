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
root= aqui se escriba la cuenta
mailhub= aqui se pone el servidor y el puerto
rewriteDomain= aqui va el dominio
hostname= dominio
UseTLS=Yes
UseSTARTTLS=Yes
AuthUser= mi cuenta de correo
AuthPass= la clave de mi cuenta
FromLineOverride= yes

Una vez este configurado se puede enviar email usando el metodo mail()
mail(string $email_destinatario, string $asunto, string $mensaje, array $headers[]);
$headers = [
    'From' => "escribo la cuenta de correo destinatario',
    'Content-type' => 'text/plain; charset=utf-8'
];
mail('cuenta de correo recceptor', 'Día especial', 'Gracias por suscribirte', $headers);

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
    'From' => 'cuenta destinatario'
];

// Lo enviamos
mail('cuenta receptor', 'Día especial', $mensaje, $headers);

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
    $mail->Host       = 'smtp del host';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'correo destinatario';
    $mail->Password   = 'clave';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = puerto;

    $mail->setFrom('correo destinatario', 'Nombre emisor');
    // Quien lo recibe
    $mail->addAddress('correo receptor', 'Nombre receptor');

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