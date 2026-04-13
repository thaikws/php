<?php

use Dba\Connection;

include_once 'Conn.php';

//Extensão PHP Getters & Setters

class Categoria{
    private $id;
    private $nome;
    private $empresa;
    private $funcao;
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
    public function getEmpresa(){
        return $this->empresa;
    }

    public function setEmpresa($empresa){
        $this->empresa = $empresa;
        return $this;
    }
    
    public function getFuncao(){
        return $this->funcao;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
        return $this;
    }

    public function salvar(){
        try{
            $this->conn = new Conn();
            $sql = "CALL salvar_categoria(?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->empresa));
            $executar->bindValue(3, mb_strtoupper(string: $this->funcao));
            return $executar->execute() == 1 ? true : false;

        }catch(PDOException $erro){
            echo $erro->getMessage();
        }
    }
}