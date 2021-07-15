<?php 

class GerarSenha{


    public function senha($size = 7){

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
        $randomString = '';
        for($i = 0; $i < $size; $i = $i+1){
           $randomString .= $chars[mt_rand(0,60)];
        }
        return $randomString;
    }

}



?>