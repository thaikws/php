<?php

include_once 'Conn.php';

class Categoria{
    private $id;
    private $nome;
    private $informacoes;
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
    public function getInformacoes(){
        return $this->informacoes;
    }

    public function setInformacoes($info){
        $this->informacoes = $info;
        return $this;
    }
}