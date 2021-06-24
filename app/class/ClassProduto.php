<?php 

Class ClassProduo{

    private $id;
    private $produto;
    private $desc;
    private $unidade;
    private $quantidade;


    public function getID(){

        return $this->id;
    }
    
    public function setID($id){

        $this->id =$id;
        
    }

    public function getProduto(){

        return $this->produto;
    }
    
    public function setProduto($produto){

        $this->produto =$produto;
        
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

    public function getQuantidade(){

        return $this->quantidade;
    }
    
    public function setQuantidade($quantidade){

        $this->quantidade =$quantidade;
        
    }
}

?>