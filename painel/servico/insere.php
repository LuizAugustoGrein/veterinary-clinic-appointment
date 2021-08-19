<?php 
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <h2 class="text-center">Cadastro de Serviços</h2>
    <hr/>
    <form action="insere.php" id="formCadastroServico" method="post">
        <div class="container">
            <?php
                adicionarServico();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-8">
                        <label for="inputNome">Nome do Serviço</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome do Serviço">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-8">
                        <label for="inputDesc">Descrição</label>
                        <textarea class="form-control" id="inputDesc" name="descricao" style="min-height: 100px; height: 150px;" placeholder="Descrição do Serviço"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-4">
                        <label for="inputValor">Valor</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">R$</div>
                            <input type="text" class="form-control" id="inputValor" name="valor" placeholder="0,00">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="selectProf">Profissional</label>
                        <select class="form-control" id="selectProf" name="tb_usuario_id">
                            <?php populaProfissionais(null); ?>
                        </select>
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