<?php
session_start();
$Username = $_POST['userid'];
$password = $_POST['passwordinput'];

$content = "";
$url = "http://localhost:49627/api/Login";

$data = array(
    'UserName' => $Username,
    'Password' => $password,
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
if ($response === "true") {
    $_SESSION["userid"] = $Username;
    $_SESSION["passwordinput"] = $Username;
    $_SESSION["carrinho"] = array();
    ?><script>alert("Autenticado com Sucesso");</script><?php
    header("location:indexRegistado.php?$Username");
} else if ($response === "false") {
    header("location:Error.php?descricaoErro=Login%20failed");
} else {
    ?><script>alert("Erro")</script><?php
}
?>

