<?php
                       
require_once './Manager/getData.php';
$manager=new getData();
//$s=$manager->getartigo("C01");
//print_r($s=$manager->getartigo("C01"));
//print_r($s['Marca']);
$aa=$manager->getfaturas("Admin");
print_r($aa[0]['id']);
$z=$aa[0]['id'];
$as=str_replace(array( '{', '}' ), '', $z);
print_r($as);
$aaa=$manager->getlinha($as);
print_r($aaa);