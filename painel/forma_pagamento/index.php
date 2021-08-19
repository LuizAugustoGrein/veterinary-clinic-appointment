<?php 
    require_once('funcoes.php');
    listarFormas();
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Formas de Pagamento</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="insere.php"><i class="fa fa-plus"></i>Nova Forma de Pagamento</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div> 
    </header>
    <hr/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Forma de Pagamento</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($formas) : ?>
                <?php foreach ($formas as $forma) : ?>
                    <tr>
                        <td><?php echo $forma[0] ?></td>
                        <td><?php echo $forma[1] ?></td>
                        <td class="actions">
                            <a href="altera.php?id=<?php echo $forma[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="exclui.php?id=<?php echo $forma[0]; ?>" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Nenhum registro encontrado!</td>
                </tr>
            <?php endif; ?>           
        </tbody>    
    </table>
    <div style="height: 20px"></div>
    <hr/>

    <?php include(FOOTER_TEMPLATE); ?>