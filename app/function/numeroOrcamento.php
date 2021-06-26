<?php 

class GerarNumero{

    
    public function idONum(){
        
        $id = random_int(111, 999);

        $today = date('d');

        $num = $id."".$today;

        return $num;
    }
}



?>