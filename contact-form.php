<?php
function sendMail($name, $email, $message)
{
    // Whitespace pattern, icluding different masking methods
    $whitespace = '~(<CR>|<LF>|0x0A|%0A|0x0D|%0D|\\n|\\r|\s)+~i';

    $name = trim(preg_replace($whitespace, '', $name));
    if (empty($name)) {
        return 'name';
    }

    $email = trim(preg_replace($whitespace, ' ', $email));
    if (empty($email)) {
        return 'mail';
    }

    $mail_to = 'm.villanove@laposte.net';
    $subject = 'Contact portfolio de ' . $name;

    $body =  "From: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Message: $message";

    $headers =  "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($mail_to, $subject, $body, $headers)){
        return 'ok';
    }else {
        return 'ko';
    }
}


$name    = isset($_POST['name']) ? $_POST['name'] : '';
$email   = isset($_POST['email']) ? $_POST['email'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$enterprise = isset($_POST['enterprise']) ? $_POST['enterprise'] : '';

$mail_status = sendMail($name, $email, $message . '|' . $phone . '|' . $enterprise);
header('location:' . $_SERVER['HTTP_REFERER'] . '?return='.$mail_status.'&name='.$_POST["name"].'&email='.$_POST["email"].'&phone='.$_POST["phone"].'&enterprise='.$_POST["enterprise"].'#contact');
