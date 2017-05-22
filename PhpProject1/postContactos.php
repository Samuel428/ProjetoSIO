<?php

require_once './Manager/getData.php';
$m=new getData();

$primeiro= filter_input(INPUT_POST,'primeironome' ,FILTER_SANITIZE_SPECIAL_CHARS);
$ultimo= filter_input(INPUT_POST,'ultimonome' ,FILTER_SANITIZE_SPECIAL_CHARS);
$email= filter_input(INPUT_POST,'email' ,FILTER_SANITIZE_SPECIAL_CHARS);
$mensagem= filter_input(INPUT_POST,'mensagem' ,FILTER_SANITIZE_SPECIAL_CHARS);


$content = "";
$data = array(
    'id'=> 1,
    'primeironome' => $primeiro,
    'ultimonome' => $ultimo,
    'email' => $email,
    'mensagem' => $mensagem,
);

foreach ($data as $key => $value) {
    $content .= $key . '=' . $value . '&';
}
print_r($content);

$enviar=$m->postContact($content);
