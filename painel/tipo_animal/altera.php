<?php
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
    global $tipo;
    $tipo = buscarRegistros('tb_tipo_animal', 'id_tipo', $_GET['id']);
?>
    <br/>
    <hr/>
    <h1 class="text-center">Alterar Tipo de Animal</h1>
    <hr/>
    <form action="altera.php?id=<?php echo $tipo[0];?>" id="formAlteraTipo" method="post">
        <div class="container">
            <?php
                alterarTipo();
            ?>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-8">
                        <label for="inputTipo">Tipo de Animal</label>
                        <input type="text" class="form-control" id="inputTipo" name="tipo" value="<?php echo $tipo[1]; ?>">
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