<?php 
    require_once('funcoes.php');
    listarServicos();
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Serviços</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="insere.php"><i class="fa fa-plus"></i>Novo Serviço</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div> 
    </header>
    <hr/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Serviço</th>
                <th>Valor</th>
                <th>Profissional</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($servicos) :
                $modal = false;
                foreach ($servicos as $servico) : 
                    $formatado_virgula = number_format($servico[3], 2, ',', ' '); ?>
                    <tr>
                        <td><?php echo $servico[0] ?></td>
                        <td><?php echo $servico[1] ?></td>
                        <td><?php echo 'R$ '.$formatado_virgula ?></td>
                        <td><?php echo pesquisaProfissional($servico[4]); ?></td>
                        <td class="actions">
                            <a href="index.php?id=<?php echo $servico[0]; ?>" class="btn btn-sm btn-success">Visualizar</a>
                                    <?php 
                                        if(isset($_GET['id']) && $modal == false){ 
                                            $modal = true;
                                            VizualizarServicoID($_GET['id']);
                                            $formatado_virgula_servico = number_format($vizualizaServico[3], 2, ',', ' ');
                                    ?>
                                    <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block; background-color: rgba(1,1,1,0.5); overflow: auto;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $vizualizaServico[1] ?></h5>
                                                    <a href="index.php" aria-hidden="true" style="color: black; text-decoration: none;">
                                                        <button type="button" class="close" aria-label="Close">&times;</button>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 text-left">
                                                        <p><b>ID: </b><?php echo $vizualizaServico[0]; ?></p>
                                                        <p><b>Valor: </b><?php echo 'R$ '.$formatado_virgula_servico; ?></p>
                                                        <p><b>Profissional: </b><?php echo pesquisaProfissional($vizualizaServico[4]); ?></p>
                                                        <p><b>Descrição: </b><?php echo $vizualizaServico[2]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="index.php" style="color: white; text-decoration: none;"><button type="button" class="btn btn-primary">Voltar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <a href="altera.php?id=<?php echo $servico[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="exclui.php?id=<?php echo $servico[0]; ?>" class="btn btn-sm btn-danger">Excluir</a>
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