<?php

// exige a tipificação dos atributos e métodos
declare(strict_types=1);

require_once "../model/Cliente.php";
require_once "../dao/ClienteDAO.php";

class ClienteController
{
    private Cliente $cliente;
    private ClienteDAO $dao;

    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->dao = new ClienteDAO();
    }

    public function listar(): array
    {
        return $this->dao->listar();
    }

    public function salvar(): bool
    {
        $this->cliente->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->cliente->setEmail(
            filter_input(INPUT_POST, "txtemail")
        );

        return $this->dao->salvar($this->cliente);
    }

    public function alterar(): bool
    {
        $this->cliente->setId(
            (int) filter_input(INPUT_POST, "txtid")
        );

        $this->cliente->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->cliente->setEmail(
            filter_input(INPUT_POST, "txtemail")
        );

        return $this->dao->salvar($this->cliente);
    }

    public function excluir(int $id): bool
    {
        return $this->dao->excluir($id);
    }

    public function buscarPorId(int $id): ?Cliente
    {
        return $this->dao->consultarPorID($id);
    }
}
