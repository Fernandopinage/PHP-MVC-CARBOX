<?php

    class ClassComprador {

        private $id;
        private $cnpj;
        private $nome;
        private $email;
        private $senha;
        private $status;

        public function getID(){

            return $this->id;
        }
        
        public function setID($id){
    
            $this->id =$id;
            
        }
        public function getCnpj(){

            return $this->cnpj;
        }
        
        public function setCnpj($cnpj){
    
            $this->cnpj =$cnpj;
            
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

        public function getStatus(){

            return $this->status;
        }
        
        public function setStatus($status){
    
            $this->status =$status;
            
        }

    }




?>