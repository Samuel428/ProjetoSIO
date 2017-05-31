<?php
session_start();
require_once './Manager/getData.php';
$m=new getData();

$CodArtigo= filter_input(INPUT_GET,'CodArtigo' ,FILTER_SANITIZE_SPECIAL_CHARS);
print_r($CodArtigo);
$quantidade= filter_input(INPUT_GET,'Quantidade' ,FILTER_SANITIZE_SPECIAL_CHARS);
$desconto= filter_input(INPUT_GET,'Desconto' ,FILTER_SANITIZE_SPECIAL_CHARS);
$ultimo= filter_input(INPUT_POST,'ultimonome' ,FILTER_SANITIZE_SPECIAL_CHARS);
$email= filter_input(INPUT_POST,'email' ,FILTER_SANITIZE_SPECIAL_CHARS);
$mensagem= filter_input(INPUT_POST,'mensagem' ,FILTER_SANITIZE_SPECIAL_CHARS);

    $link = "$_SERVER[REQUEST_URI]";
    $escaped_link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
    $resultado = explode('?', $escaped_link);
    $aaa = $resultado[1];
    $linha = substr($aaa, 0, -1);

    $Entidade = $_SESSION["userid"];
    $size = strlen($linha);

    $data = array(
        'Entidade' => $Entidade,
        'Serie' => "2017",
        'linhas' =>$linha
       // 'LinhasDoc' => $linha=array(
    
//      "CodArtigo" => $CodArtigo,
//     // "DescArtigo"=> "sample string 2",
//      //"IdCabecDoc"=> "sample string 3",
//      "Quantidade" => $quantidade,
//      "Desconto" => $desconto
//       )
            );
    $content = "";

    foreach ($data as $key => $value) {
        $content .= $key . '=' . $value . '&';
    }
print_r($content);

$enviar=$m->postDocVenda($content);
