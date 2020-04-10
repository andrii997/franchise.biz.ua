<?php
function mail_utf8($to, $from, $subject, $message)
{
    $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
 
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "From: $from\r\n";
 
    return mail($to, $subject, $message, $headers);
}
$response = 0;
$name = $email = $phone = $text = '';
if(isset($_GET['action'])){
if($_GET['action'] == 'send'){
$name = $_POST['recipientname'];
$email = $_POST['recipientemail'];
$phone = $_POST['recipienttel'];
if($name && $email && $phone){
$text = <<<HTML
Name: {$name}
Email: {$email}
Phone: {$phone}
HTML;
$response = 1;
}
} else if($_GET['action'] == 'send1'){
$name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$text = $_POST['text'];
if($name && $email && $phone && $text){
$text = <<<HTML
Name: {$name}
Email: {$email}
Phone: {$phone}
Text: {$text}
HTML;
$response = 1;
}
}
if($response == 1) mail_utf8('m.demkiv@urbangroup.pl', 'm.demkiv@urbangroup.pl', 'Message title', $text);
}
header('Location: /');
?>