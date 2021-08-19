<?php
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
    global $forma;
    $forma = buscarRegistros('tb_forma_pagamento', 'id_forma', $_GET['id']);
?>
    <br/>
    <hr/>
    <h2 class="text-center">Alterar Forma de Pagamento</h2>
    <hr/>
    <form action="altera.php?id=<?php echo $forma[0];?>" id="formAlteraForma" method="post">
        <div class="container">
            <?php
                alterarForma();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-8">
                        <label for="inputForma">Forma de Pagamento</label>
                        <input type="text" class="form-control" id="inputForma" name="forma" value="<?php echo $forma[1]; ?>">
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