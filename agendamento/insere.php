<?php 
    @$id = $_GET['id'];
    require_once('funcoes.php');
    include(HEADER_TEMPLATE);
?>
    <br/>
    <hr/>
    <h2 class="text-center">Agendamento de Serviço</h2>
    <hr/>
    <form action="insere.php" id="formCadastroAgendamento" method="post">
        <div class="container">
            <?php
                adicionarAgendamento();
            ?>
            <h6>Informações do Cliente</h6>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputNomeCliente">Nome Completo</label>
                        <input type="text" class="form-control" id="inputNomeCliente" name="nome_cliente" placeholder="Nome Completo do Cliente">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputTelefone">Telefone</label>
                        <input type="text" class="form-control" id="inputTelefone" name="telefone" placeholder="Telefone Fixo ou Móvel">
                    </div>
                </div>
            </div>
            <hr/>
            <h6>Informações do Animal</h6>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputForma">Nome do Animal</label>
                        <input type="text" class="form-control" id="inputForma" name="nome_animal" placeholder="Nome do animal">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="selectTipo">Tipo de Animal</label>
                        <select class="form-control" id="selectTipo" name="tb_tipo_animal_id">
                            <?php populaSelect('tb_tipo_animal',null); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-5">
                        <label for="inputRaca">Raça</label>
                        <input type="text" class="form-control" id="inputRaca" name="raca_animal" placeholder="Raça do animal">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="selectSexo">Sexo</label>
                        <select class="form-control" id="selectSexo" name="sexo_animal">
                            <option value="M">Macho</option>
                            <option value="F">Fêmea</option>
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
                            $datah = new DateTime(); 
                            $datah_form = $datah->format('Y').'-'.$datah->format('m').'-'.$datah->format('d').'T'.$datah->format('H').':'.$datah->format('i');
                        ?>
                        <input type="datetime-local" class="form-control" id="inputMomento" name="data_hora" min="<?php echo $datah_form ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="selectForma">Forma de Pagamento</label>
                        <select class="form-control" id="selectForma" name="tb_forma_pagamento_id">
                            <?php populaSelect('tb_forma_pagamento',null); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-row justify-content-center align-items-center">
                    <div class="form-group col-md-6">
                        <label for="selectServico">Serviço Desejado</label>
                        <select class="form-control" id="selectServico" name="tb_servico_id">
                            <?php populaSelect('tb_servico',$id); ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12" style="text-align:right;">
                    <a href="index.php" class="btn btn-secondary">Voltar</a>
                    <button type="submit" name="acao" class="btn btn-primary">Agendar</button>
                </div>
            </div>
        </div>
    </form>
    <hr/>
    <br/>
<?php
    include(FOOTER_TEMPLATE);
?>