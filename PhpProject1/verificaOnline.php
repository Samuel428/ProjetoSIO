<?php

$url= "http://localhost:49627/api/Cliente";
if(!filter_var($url,FILTER_VALIDATE_URL)){
    echo 'URL provided wasnt valid';
}
$cl= curl_init($url);
curl_setopt($cl, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($cl, CURLOPT_HEADER, true);
curl_setopt($cl, CURLOPT_NOBODY, true);
curl_setopt($cl, CURLOPT_RETURNTRANSFER, true);
$response= curl_exec($cl);

curl_close($cl);

if(!$response){
    $_SESSION=array();
if(ini_get("session.use_cookies")){
    $params= session_get_cookie_params();
    setcookie(session_name(),'', time()-42000,$params["path"],$params["domain"],
            $params["secure"],$params["httponly"]);
}

session_destroy();
header('Location: 404.html');
die();
}
