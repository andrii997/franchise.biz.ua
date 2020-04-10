<?php
function mail_utf8($to, $from, $subject, $message)
{
    $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
 
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "From: $from\r\n";
 
    return mail($to, $subject, $message, $headers);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['Phone'];
if($name && $email && $phone){
$text = <<<HTML
Name: {$name}
Email: {$email}
Phone: {$phone}
HTML;
mail_utf8('v.shokal@gmail.com', 'v.shokal@gmail.com', 'Request', $text);
echo json_encode(["results"=>['Отправлено']]);
} else echo json_encode(["error"=>"Отправка данных невозможна."]);

?>