<?php 
    require_once('funcoes.php');
    listarTipos();
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Tipos de Animal</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="insere.php"><i class="fa fa-plus"></i>Novo Tipo de Animal</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div> 
    </header>
    <hr/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Animal</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($tipos) : ?>
                <?php foreach ($tipos as $tipo) : ?>
                    <tr>
                        <td><?php echo $tipo[0] ?></td>
                        <td><?php echo $tipo[1] ?></td>
                        <td class="actions">
                            <a href="altera.php?id=<?php echo $tipo[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="exclui.php?id=<?php echo $tipo[0]; ?>" class="btn btn-sm btn-danger">Excluir</a>
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