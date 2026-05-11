<h3 class="mt-3 text-primary">
    Fornecedores
</h3>

<div class="card shadow mt-3"><!-- acrescentei um card com sombra aqui tbm -->
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Nome
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Nome"
                    value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Empresa
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtempresa" name="txtempresa" placeholder="Empresa"
                    value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Função
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtfuncao" name="txtfuncao" placeholder="Função"
                    value="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit"
                    class="btn btn-primary"
                    name="btnsalvar"
                    value="Cadastrar">
            </div>
            <!-- faltou um link aqui-->
            <a href="?p=fornecedores" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<?php
     //verificar se o botão btnsalvar foi acionado
     if(filter_input(INPUT_POST, 'btnsalvar')){
        $nome = filter_input(INPUT_POST, 'txtnome');
        $empresa = filter_input(INPUT_POST, 'txtempresa');
        $funcao = filter_input(INPUT_POST, 'txtfuncao');

        //acesso a classe (em models)   
        include_once __DIR__ . '/../../models/Fornecedor.php';
        $fornecedor = new Fornecedor();
        $fornecedor->setId(null);
        $fornecedor->setNome($nome);
        $fornecedor->setEmpresa($empresa);
        $fornecedor->setFuncao($funcao);

     //efetivar o insert into
     if($fornecedor->salvar()){
?>
        <div class="alert alert-primary mt-3" role="alert">
            Fornecedor cadastrado com sucesso!
        </div>
        <meta hidden http-equiv="refresh" content="0.2;URL=?p=fornecedores">
<?php
     }
     else{
?>
        <div class="alert alert-danger mt-3" role="alert">
            Erro ao cadastrar fornecedor!
        </div>
        <meta hidden http-equiv="refresh" content="0.2;URL=?p=fornecedores">
<?php
     }
}