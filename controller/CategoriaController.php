<?php

//exige a tipificação dos atributos e métodos
declare(strict_types=1);

require_once "../model/Categoria.php";
require_once "../dao/CategoriaDAO.php";

class CategoriaController{
    private Categoria $categoria;
    private CategoriaDAO $dao;

    public function __construct(){
        $this->categoria = new Categoria();
        $this->dao = new CategoriaDAO();
    }

    public function listar(): array{
        return $this->dao->listar();
    }
}