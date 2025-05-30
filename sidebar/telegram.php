<?php
/* https://api.telegram.org/bot5799458682:AAFzKqQWdNWC2qGmAWgIA1VfhCuASukGTCv/getUpdates,
основной XXXXXXXXXXXXXXXXXXXXXX токен нашего бота, полученный ранее */

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$token = "8177387609:AAF8xaLJMsbosXZVDEL7AqPg4u3MKkiKbs0";
$chat_id = "6892486863";
$arr = array(
    'Имя пользователя: ' => $name,
    'Телефон: ' => $phone,
    'Email: ' => $email
);

$txt = "";
foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
    header('Location: thank-you.html');
} else {
    echo "Error";
}
?>