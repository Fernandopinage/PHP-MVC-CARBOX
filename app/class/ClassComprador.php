<?php

    class ClassComprador {

        private $id;
        private $cnpj;
        private $nome;
        private $email;
        private $senha;
        private $novasenha;
        private $status;
        private $acesso;
        private $codsap;

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

        public function getAcessp(){

            return $this->acesso;
        }
        
        public function setAcessp($acesso){
    
            $this->acesso =$acesso;
            
        }

        public function getNovasenha(){

            return $this->novasenha;
        }
        
        public function setNovasenha($novasenha){
    
            $this->novasenha =$novasenha;
            
        }

        public function getCodsap(){

            return $this->codsap;
        }
        
        public function setCodsap($codsap){
    
            $this->codsap =$codsap;
            
        }

    }




?>