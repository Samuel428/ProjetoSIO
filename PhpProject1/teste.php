<?php

//$filePath = "http://localhost:49627/api/Artigo";
//                        $string = file_get_contents($filePath);
//                        if ($string == null || $string == FALSE) {
//                            echo '$id';
//                            ?>
                            //<?php
//                        } else {
//                            $json_a = json_decode($string, true);
//                            
//                            print_r($json_a);
//                        }
//                        
//                        
require_once './Manager/getData.php';
$manager=new getData();$s=$manager->getartigo("C01");
print_r($s=$manager->getartigo("C01"));
print_r($s['Marca']);