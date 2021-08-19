<?php
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
    global $usuario;
    $usuario = buscarRegistros('tb_usuario', 'id_usuario', $_GET['id']);
?>
    <br/>
    <hr/>
    <h1 class="text-center">Alterar Profissional</h1>
    <hr/>
    <form action="altera.php?id=<?php echo $usuario[0];?>" id="formAlteraTipo" method="post">
        <div class="container">
            <?php
                alterarUsuario();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputUsuario">Usuário</label>
                        <input type="text" class="form-control" id="inputUsuario" name="usuario" value="<?php echo $usuario[1]; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputSenha">Senha</label>
                        <input type="password" class="form-control" id="inputSenha" name="senha" value="<?php echo $usuario[2]; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome Completo</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $usuario[3]; ?>">
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