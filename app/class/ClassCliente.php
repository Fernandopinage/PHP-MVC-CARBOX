<?php 

Class ClassCliente{

    private $id;
    private $CNPJ;
    private $razao;
    private $email;
    private $sap;

    public function getID(){

        return $this->id;
    }
    
    public function setID($id){

        $this->id =$id;
        
    }

    public function getCnpj(){

        return $this->CNPJ;
    }
    
    public function setCnpj($CNPJ){

        $this->CNPJ =$CNPJ;
        
    }
    
    public function getRazao(){

        return $this->razao;
    }
    
    public function setRazao($razao){

        $this->razao =$razao;
        
    }

    public function getEmail(){

        return $this->email;
    }
    
    public function setEmail($email){

        $this->email =$email;
        
    }
    
    public function getSap(){

        return $this->sap;
    }
    
    public function setSap($sap){

        $this->sap =$sap;
        
    }
}
