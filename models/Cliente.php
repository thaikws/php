<?php

use Dba\Connection;

include_once 'Conn.php';

//Extensão PHP Getters & Setters

class Cliente{
    private $id;
    private $nome;
    private $email;
    private $conn;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
        public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    
    public function salvar(){
        try{
            $this->conn = new Conn();
            $sql = "CALL salvar_cliente(?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->email));
            return $executar->execute() == 1 ? true : false;

        }catch(PDOException $erro){
            echo $erro->getMessage();
        }
    }
}