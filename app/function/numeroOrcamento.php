<?php 

class GerarNumero{

    
    public function num(){
        
        $id = random_int(1000, 9999);

        $today = date('d');

        if($today <= 9){
            $num = $id."0".$today;
        }else{

            $num = $id."".$today;
        }

        return $num;
    }
}



?>