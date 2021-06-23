<?php 

Class ClassProduo{

    private $id;
    private $cod;
    private $desc;
    private $unidade;


    public function getID(){

        return $this->id;
    }
    
    public function setID($id){

        $this->id =$id;
        
    }
    public function getCod(){

        return $this->cod;
    }
    
    public function setCod($cod){

        $this->cod =$cod;
        
    }
    public function getDesc(){

        return $this->desc;
    }
    
    public function setDesc($desc){

        $this->desc =$desc;
        
    }

    public function getUnidade(){

        return $this->unidade;
    }
    
    public function setUnidade($unidade){

        $this->unidade =$unidade;
        
    }
}

?>