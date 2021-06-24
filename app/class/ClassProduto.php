<?php


class ClassProduto{

    private $id;
    private $produto;
    private $unidade;
    private $quantidade;
    private $img;
    
    
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

    public function getImg(){

        return $this->img;
    }
    
    public function setImg($img){

        $this->img =$img;
        
    }
    



}


?>