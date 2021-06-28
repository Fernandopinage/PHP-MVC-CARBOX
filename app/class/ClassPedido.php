<?php 

Class ClassPedido{

    private $id;
    private $produto;
    private $desc;
    private $unidade;
    private $quantidade;
    private $razao;
    private $data;
    private $sap;
    private $num;


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
    public function getRazao(){

        return $this->razao;
    }
    
    public function setRazao($razao){

        $this->razao =$razao;
        
    }
    public function getData(){

        return $this->data;
    }
    
    public function setData($data){

        $this->data =$data;
        
    }
    public function getSap(){

        return $this->sap;
    }
    
    public function setSap($sap){

        $this->sap =$sap;
        
    }
    public function getNum(){

        return $this->num;
    }
    
    public function setNum($num){

        $this->num =$num;
        
    }
}

?>