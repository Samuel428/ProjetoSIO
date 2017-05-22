<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getData
 *
 * @author sige
 */
class getData {

    const primavera_web_api_Login = "http://localhost:49627/api/Cliente";
    const primavera_web_api_Artigo = "http://localhost:49627/api/Artigo";
    const primavera_web_api_Artigo31 = "http://localhost:49627/api/Artigo?idTipoArtigo=31";
    const primavera_web_api_Artigo32 = "http://localhost:49627/api/Artigo?idTipoArtigo=32";
    const primavera_web_api_artigoid = "http://localhost:49627/api/Artigo?idArtigo=";
    const primavera_web_api_Bicicleta = "http://localhost:49627/api/Artigo?tipo=Bicicleta";
    const primavera_web_api_Registar = "http://localhost:49627/api/registar";
    const primavera_web_api_Contact = "http://localhost:49627/api/ContactForm";

    public function getBikeMontanha() {
        $string = file_get_contents(self::primavera_web_api_Artigo);
        if ($string == null || $string == FALSE) {
            echo 'erro';
?>
            <?php

        } else {
            return $json_a = json_decode($string, true);
        }
    }

    public function getBikeSingleSpeed() {
        $string = file_get_contents(self::primavera_web_api_Artigo31);
        if ($string == null || $string == FALSE) {
            echo 'erro';
            ?>
            <?php

        } else {
            return $json_a = json_decode($string, true);
        }
    }

    public function getRoadBikes() {
        $string = file_get_contents(self::primavera_web_api_Artigo32);
        if ($string == null || $string == FALSE) {
            echo 'erro';
            ?>
            <?php

        } else {
            return $json_a = json_decode($string, true);
        }
    }
    
    public function getBikes() {
        $string = file_get_contents(self::primavera_web_api_Bicicleta);
        if ($string == null || $string == FALSE) {
            echo 'erro';
            ?>
            <?php

        } else {
            return $json_a = json_decode($string, true);
        }
    }
    
    public function getartigo($id) {
        $string = file_get_contents(self::primavera_web_api_artigoid.$id);
        if ($string == null || $string == FALSE) {
            echo 'erro';
            ?>
            <?php

        } else {
            return $json_a = json_decode($string, true);
        }
    }

    public function postContact($content) {
        $curl = curl_init(self::primavera_web_api_Contact);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $response = json_decode($json_response, true);
        
        if ($response === "sucesso") {
            echo "<script> alert('Registado com sucesso!!!');history.back();</script>";
            //header("location:index.php");
        } else {
            echo "<script> alert('Falha no registo!');history.back();</script>";
            //header("location:index.php");
        }
    }

}
