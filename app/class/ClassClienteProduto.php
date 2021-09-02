<?php 


class ClassClienteProduto{


    private $id;
    private $sap;
    private $CNPJ;
    private $produto;


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
    public function getSap(){

        return $this->sap;
    }
    
    public function setSap($sap){

        $this->sap =$sap;
        
    }
    public function getCnpj(){

        return $this->CNPJ;
    }
    
    public function setCnpj($CNPJ){

        $this->CNPJ =$CNPJ;
        
    }

}



?>