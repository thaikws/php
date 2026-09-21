<?php

// exige a tipificação dos atributos e métodos
declare(strict_types=1);

require_once "../model/Fornecedor.php";
require_once "../dao/FornecedorDAO.php";

class FornecedorController
{
    private Fornecedor $fornecedor;
    private FornecedorDAO $dao;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
        $this->dao = new FornecedorDAO();
    }

    public function listar(): array
    {
        return $this->dao->listar();
    }

    public function salvar(): bool
    {
        $this->fornecedor->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->fornecedor->setEmpresa(
            filter_input(INPUT_POST, "txtempresa")
        );

        $this->fornecedor->setFuncao(
            filter_input(INPUT_POST, "txtfuncao")
        );

        return $this->dao->salvar($this->fornecedor);
    }

    public function alterar(): bool
    {
        $this->fornecedor->setId(
            (int) filter_input(INPUT_POST, "txtid")
        );

        $this->fornecedor->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->fornecedor->setEmpresa(
            filter_input(INPUT_POST, "txtempresa")
        );

        $this->fornecedor->setFuncao(
            filter_input(INPUT_POST, "txtfuncao")
        );

        return $this->dao->salvar($this->fornecedor);
    }

    public function excluir(int $id): bool
    {
        return $this->dao->excluir($id);
    }

    public function buscarPorId(int $id): ?Fornecedor
    {
        return $this->dao->consultarPorID($id);
    }
}
