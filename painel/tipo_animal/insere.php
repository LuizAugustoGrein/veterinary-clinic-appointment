<?php 
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <h2 class="text-center">Cadastro de Tipos de Animal</h2>
    <hr/>
    <form action="insere.php" id="formCadastroTipo" method="post">
        <div class="container">
            <?php
                adicionarTipo();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-8">
                        <label for="inputTipo">Tipo de Animal</label>
                        <input type="text" class="form-control" id="inputTipo" name="tipo" placeholder="Ex: Cachorro, Gato...">
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