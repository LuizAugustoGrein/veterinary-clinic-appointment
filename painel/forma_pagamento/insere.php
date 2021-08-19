<?php 
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <h2 class="text-center">Cadastro de Formas de Pagamento</h2>
    <hr/>
    <form action="insere.php" id="formCadastroForma" method="post">
        <div class="container">
            <?php
                adicionarForma();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-8">
                        <label for="inputForma">Forma de Pagamento</label>
                        <input type="text" class="form-control" id="inputForma" name="forma" placeholder="Ex: Dinheiro, Cartão de Crédito...">
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