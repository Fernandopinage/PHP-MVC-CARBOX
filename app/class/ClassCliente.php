<?php 

Class ClassCliente{

    private $id;
    private $CPF;
    private $razao;
    private $nome;
    private $email;
    private $senha;
    private $sap;

    public function getID(){

        return $this->id;
    }
    
    public function setID($id){

        $this->id =$id;
        
    }

    public function getCPF(){

        return $this->CPF;
    }
    
    public function setCPF($CPF){

        $this->CPF =$CPF;
        
    }
    
    public function getRazao(){

        return $this->razao;
    }
    
    public function setRazao($razao){

        $this->razao =$razao;
        
    }

    public function getNome(){

        return $this->nome;
    }
    
    public function setNome($nome){

        $this->nome =$nome;
        
    }

    public function getEmail(){

        return $this->email;
    }
    
    public function setEmail($email){

        $this->email =$email;
        
    }

    public function getSenha(){

        return $this->senha;
    }
    
    public function setSenha($senha){

        $this->senha =$senha;
        
    }
    
    public function getSap(){

        return $this->sap;
    }
    
    public function setSap($sap){

        $this->sap =$sap;
        
    }
}
