<?php 
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <h2 class="text-center">Cadastro de Profissionais</h2>
    <hr/>
    <form action="insere.php" id="formCadastroUsuario" method="post">
        <div class="container">
            <?php
                adicionarUsuario();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputUsuario">Usuário</label>
                        <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuário">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputSenha">Senha</label>
                        <input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome Completo</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome Completo do Usuário">
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12" style="text-align:right;">
                    <a href="index.php" class="btn btn-secondary">Voltar</a>
                    <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
    <hr/>
    <br/>
<?php
    include(FOOTER_TEMPLATE);
?>