<?php
    require_once('funcoes.php');
    include(HEADER_TEMPLATE_PAINEL);
    global $agendamento;
    $agendamento = buscarRegistros('tb_agendamento','id_agendamento',$_GET['id']);
    $data_formatada = date('d/m/Y H:i',strtotime($agendamento[6]));
?>
    <br/>
    <hr/>
    <h2 class="text-center">Alterar Agendamento de <?php echo $agendamento[1]; ?></h2>
    <hr/>
    <form action="altera.php?id=<?php echo $agendamento[0];?>" id="formAlteraServico" method="post">
        <div class="container">
            <?php 
                alterarAgendamento(); 
            ?>
            <h6>Informações do Cliente</h6>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputNomeCliente">Nome Completo</label>
                        <input type="text" class="form-control" id="inputNomeCliente" name="nome_cliente" value="<?php echo $agendamento[1]; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputTelefone">Telefone</label>
                        <input type="text" class="form-control" id="inputTelefone" name="telefone" value="<?php echo $agendamento[2]; ?>">
                    </div>
                </div>
            </div>
            <hr/>
            <h6>Informações do Animal</h6>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputForma">Nome do Animal</label>
                        <input type="text" class="form-control" id="inputForma" name="nome_animal" value="<?php echo $agendamento[3]; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="selectTipo">Tipo de Animal</label>
                        <select class="form-control" id="selectTipo" name="tb_tipo_animal_id">
                            <?php populaSelect('tb_tipo_animal',$agendamento[11]); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputRaca">Raça</label>
                        <input type="text" class="form-control" id="inputRaca" name="raca_animal" value="<?php echo $agendamento[4]; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="selectSexo">Sexo</label>
                        <select class="form-control" id="selectSexo" name="sexo_animal">
                            <?php if($agendamento[5] == "M"){ ?>
                                <option value="M" selected>Macho</option>
                                <option value="F">Fêmea</option>
                            <?php }else{ ?>
                                <option value="M">Macho</option>
                                <option value="F" selected>Fêmea</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <h6>Informações do Agendamento</h6>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputMomento">Momento da Consulta</label>
                        <?php 
                            $data = new DateTime($agendamento[6]);
                            $data_form = $data->format('Y').'-'.$data->format('m').'-'.$data->format('d').'T'.$data->format('H').':'.$data->format('i');
                        ?>
                        <input type="datetime-local" class="form-control" id="inputMomento" name="data_hora" value="<?php echo $data_form ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="selectForma">Forma de Pagamento</label>
                        <select class="form-control" id="selectForma" name="tb_forma_pagamento_id">
                            <?php populaSelect('tb_forma_pagamento',$agendamento[9]); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="selectServico">Serviço Desejado</label>
                        <select class="form-control" id="selectServico" name="tb_servico_id">
                            <?php populaSelect('tb_servico',$agendamento[10]); ?>
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