<?php


class ClassProduto{

    private $id;
    private $produto;
    private $unidade;
    private $sap;
    private $img;
    private $ficha;
    
    
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
    public function getSap(){

        return $this->sap;
    }
    
    public function setSap($sap){

        $this->sap =$sap;
        
    }

    public function getImg(){

        return $this->img;
    }
    
    public function setImg($img){

        $this->img =$img;
        
    }

    public function getFicha(){

        return $this->ficha;
    }
    
    public function setFicha($ficha){

        $this->ficha =$ficha;
        
    }
    



}


?>