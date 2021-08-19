<?php 
    require_once('funcoes.php');
    listarAgendamentos();
    include(HEADER_TEMPLATE_PAINEL);
?>
    <br/>
    <hr/>
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Controle de Agendamentos</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-info" href="../../agendamento"><i class="fa fa-plus"></i>Novo Agendamento</a>
                <a class="btn btn-secondary" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
            </div>
        </div> 
    </header>
    <hr/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data e Hora</th>
                <th>Serviço</th>
                <th>Nome do Cliente</th>
                <th>Animal</th>
                <th>Valor</th>
                <th>Situação</th>
                <th style="text-align:center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($agendamentos) :
                $modal = false;
                foreach ($agendamentos as $agendamento) : 
                    $formatado_virgula = number_format($agendamento[7], 2, ',', ' ');
                    $data_formatada = date('d/m/Y H:i',strtotime($agendamento[6]));
                    ?>
                    <tr>
                        <td><?php echo $agendamento[0]; ?></td>
                        <td><?php echo $data_formatada; ?></td>
                        <td><?php echo pesquisaTabelaID('tb_servico',1,$agendamento[10]); ?></td>
                        <td><?php echo $agendamento[1]; ?></td>
                        <td><?php echo pesquisaTabelaID('tb_tipo_animal',1,$agendamento[11]); ?></td>
                        <td><?php echo 'R$ '.$formatado_virgula; ?></td>
                        <td><?php echo pesquisaStatus($agendamento[8]); ?></td>
                        <td class="actions">
                            <a href="index.php?visualiza_id=<?php echo $agendamento[0]; ?>" class="btn btn-sm btn-success">Visualizar</a>
                                <?php 
                                    if(isset($_GET['visualiza_id']) && $modal == false){
                                        $modal = true;
                                        VizualizarAgendamentoID($_GET['visualiza_id']);
                                        $formatado_virgula_agendamento = number_format($vizualizaAgendamento[7], 2, ',', ' ');
                                        $data_formatada_agendamento = date('d/m/Y H:i',strtotime($vizualizaAgendamento[6]));
                                ?>
                                    <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block; background-color: rgba(1,1,1,0.5); overflow: auto;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Informações de Agendamento</h5>
                                                    <a href="index.php" aria-hidden="true" style="color: black; text-decoration: none;">
                                                        <button type="button" class="close" aria-label="Close">&times;</button>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 text-left">
                                                        <h6 class="text-center">Sobre o Agendamento</h6>
                                                        <p><b>ID: </b><?php echo $vizualizaAgendamento[0]; ?></p>
                                                        <p><b>Data e Hora: </b><?php echo $data_formatada_agendamento; ?></p>
                                                        <p><b>Serviço: </b><?php echo pesquisaTabelaID('tb_servico',1,$vizualizaAgendamento[10]); ?></p>
                                                        <p><b>Valor: </b><?php echo 'R$ '.$formatado_virgula_agendamento; ?></p>
                                                        <p><b>Situação: </b><?php echo pesquisaStatus($vizualizaAgendamento[8],true); ?></p>
                                                        <hr>
                                                        <h6 class="text-center">Sobre o Cliente</h6>
                                                        <p><b>Nome: </b><?php echo $vizualizaAgendamento[1]; ?></p>
                                                        <p><b>Telefone: </b><?php echo $vizualizaAgendamento[2]; ?></p>
                                                        <hr>
                                                        <h6 class="text-center">Sobre o Animal</h6>
                                                        <p><b>Tipo: </b><?php echo pesquisaTabelaID('tb_tipo_animal',1,$vizualizaAgendamento[11]); ?></p>
                                                        <p><b>Raça: </b><?php echo $vizualizaAgendamento[4]; ?></p>
                                                        <p><b>Sexo: </b><?php echo verificaSexo($vizualizaAgendamento[5]); ?></p>
                                                        <p><b>Nome do Animal: </b><?php echo $vizualizaAgendamento[3]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="index.php" style="color: white; text-decoration: none;"><button type="button" class="btn btn-primary">Voltar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <a href="index.php?agendamento_id=<?php echo $agendamento[0]; ?>" class="btn btn-sm btn-info">Alterar Situação</a>
                                <?php 
                                    if(isset($_GET['agendamento_id']) && $modal == false){
                                        $modal = true;
                                        VizualizarAgendamentoID($_GET['agendamento_id']);
                                ?>
                                    <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block; background-color: rgba(1,1,1,0.5); overflow: auto;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Alterar Situação</h5>
                                                    <a href="index.php" aria-hidden="true" style="color: black; text-decoration: none;">
                                                        <button type="button" class="close" aria-label="Close">&times;</button>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 text-left">
                                                        <h6 class="text-center"><b>Cliente <?php echo $vizualizaAgendamento[1]; ?> - Agendamento de ID <?php echo $vizualizaAgendamento[0]; ?></b></h6>
                                                        <br>
                                                        <?php
                                                            alterarSituacao()
                                                        ?>
                                                        <form method="post">
                                                            <p class="text-center">Alterar Situação para: </p>
                                                            <select class="form-control" name="situacao">
                                                                <?php populaSelect('situacao',$vizualizaAgendamento[8]); ?>
                                                            </select>
                                                            <div class="text-center" style="padding: 20px 0;">
                                                                <button type="submit" name="acao" class="btn btn-primary">Salvar Situação</button>
                                                                <a href="index.php" class="btn btn-secondary">Voltar</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <a href="altera.php?id=<?php echo $agendamento[0]; ?>" class="btn btn-sm btn-warning">Editar</a>
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