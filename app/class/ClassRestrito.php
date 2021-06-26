<?php 

class ClassRestrito{

    private $id;
    private $nome;
    private $email;
    private $senha;

    public function getID(){

        return $this->id;
    }
    
    public function setID($id){

        $this->id =$id;
        
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
}

?>