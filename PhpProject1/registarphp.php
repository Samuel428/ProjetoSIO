<?php
//SESSION SESSION SESSION
session_start();
$Nome = $_POST['nome'];
$Email = $_POST['email'];
$UsernameR = $_POST['nome'];
$PasswordR = $_POST['passwordsignup'];

$content = "";
$url = "http://localhost:49627/api/registar";

$data = array(
    'NomeCliente' => $Nome,
    'Email' => $Email,
    'UserName' => $UsernameR,
    'Password' => $PasswordR,
    'NumContribuinte' => 123456789,
    'Moeda' => "EUR",
);

foreach ($data as $key => $value) {
    $content .= $key . '=' . $value . '&';
}

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

$response = json_decode($json_response, true);

//SESSION SESSION SESSION

  if ($response === "true") {
 
    $_SESSION["idUser"] = $UsernameR;
    
    header("location:index.php");
    
}else if($response === "jaexiste"){
    header("location:Error.php?descricaoErro=Jรก%20Existe");
} else {
             header("location:Error.php?descricaoErro=Ocorreu%20um%20Erro");
}