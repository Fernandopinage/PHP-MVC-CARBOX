<?php 

class GerarNumero{

    
    public function idONum(){
        
        $id = random_int(11111, 99999);

        $today = date('d');

        $num = $id."".$today;

        return $num;
    }
}



?>