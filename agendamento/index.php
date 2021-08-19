<?php 
    require_once('funcoes.php');
    listarServicos();
    include(HEADER_TEMPLATE);
?>
    <br/>
    <hr/>
    <header>
        <div class="row">
            <div class="col-sm-12">
                <h3>Faça já o seu Agendamento!</h3>
                <h3>Nossos Serviços:</h3>
            </div>
        </div> 
    </header>
    <hr/>
    <?php if ($servicos) : ?>
        <?php foreach ($servicos as $servico) : 
            $formatado_virgula = number_format($servico[3], 2, ',', ' '); ?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $servico[1]; ?></h3>
                    <p class="card-text"><?php echo $servico[2]; ?></p>
                    <h5 class="card-text"><?php echo 'Profissional: '.pesquisaProfissional($servico[4]); ?></h5>
                    <h5 class="card-text"><?php echo 'Valor: R$ '.$formatado_virgula; ?></h5>
                    <div style="height: 10px"></div>
                    <a href="insere.php?id=<?php echo $servico[0]; ?>" class="btn btn-primary">Agendar <?php echo $servico[1]; ?></a>
                </div>
            </div>
            <div style="height: 20px"></div>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="12">Nenhum registro encontrado!</td>
        </tr>
    <?php endif; ?>
    <div style="height: 20px"></div>
    <hr/>

    <?php include(FOOTER_TEMPLATE); ?>