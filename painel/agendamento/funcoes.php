<?php 
    require_once('../../config.php');
    require_once(DBAPI);

    function listarAgendamentos(){
        global $agendamentos;
        $dados = null;
        $database = conectaMysql();
        $sql = "select * from tb_agendamento where situacao < 3 order by data_hora ";
        $result = $database->query($sql);
        if($result->num_rows > 0){
            $dados = $result->fetch_all(MYSQLI_NUM);
        }
        $agendamentos = $dados;
        atualizaStatus($agendamentos);
    }

    function VizualizarAgendamentoID($idVizualiza){
        global $vizualizaAgendamento;
        $vizualizaAgendamento = buscarRegistros('tb_agendamento','id_agendamento',$idVizualiza);
    }

    function alterarSituacao(){
        if(isset($_POST['acao'])){
            if($_POST['situacao'] >= 0 && $_POST['situacao'] <= 3){
                $id = $_GET['agendamento_id'];
                $situacao = $_POST['situacao'];
                $sql = MySql::conectar()->prepare("UPDATE tb_agendamento SET situacao = ? WHERE id_agendamento = ?");
                $sql->execute(array($situacao,$id));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Situação alterada com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function atualizaStatus($agendamentos){
        if($agendamentos) :
            foreach ($agendamentos as $agendamento) :
                if($agendamento[6] < date('Y-m-d H:i')){
                    // ALTERA DE AGENDADO PARA CONSULTA PENDENTE PELA DATA
                    $sql = MySql::conectar()->prepare("UPDATE tb_agendamento SET situacao = ? WHERE id_agendamento = ? and situacao = ?;");
                    $sql->execute(array(1,$agendamento[0],0));
                }else{
                    // ALTERA DE CONSULTA PENDENTE PARA AGENDADO POR ALTERAÇÃO DE DADOS
                    $sql = MySql::conectar()->prepare("UPDATE tb_agendamento SET situacao = ? WHERE id_agendamento = ? and situacao = ?;");
                    $sql->execute(array(0,$agendamento[0],1));
                }
            endforeach;
        endif;
    }

    function pesquisaStatus($sts,$p = null){
        $arrStatus = [0 => "Agendado",
                  1 => "Consulta Pendente",
                  2 => "Pagamento Pendente",
                  3 => "Concluído"];
        if($p){
            return $arrStatus[$sts];
        }else{
            if($sts == 1){
                return '<p class="text-warning">'.$arrStatus[$sts].'</p>';
            }else if($sts == 2){
                return '<p class="text-danger">'.$arrStatus[$sts].'</p>';
            }else{
                return '<p>'.$arrStatus[$sts].'</p>';
            }
        }
    }

    function verificaSexo($sigla){
        if($sigla == 'M'){
            return 'Macho';
        }else{
            return 'Fêmea';
        }
    }

    function alterarAgendamento(){
        $id = $_GET['id'];
        if(isset($_POST['acao'])){
            $nome_cliente = $_POST['nome_cliente'];
            $telefone = $_POST['telefone'];
            $nome_animal = $_POST['nome_animal'];
            $raca = $_POST['raca_animal'];
            $sexo = $_POST['sexo_animal'];
            $data_hora = $_POST['data_hora'];
            $id_forma = $_POST['tb_forma_pagamento_id'];
            $id_servico = $_POST['tb_servico_id'];
            $id_tipo = $_POST['tb_tipo_animal_id'];
            if(!empty($nome_cliente) && !empty($telefone) && !empty($nome_animal) && !empty($raca) && !empty($sexo) && !empty($data_hora) && !empty($id_forma) && !empty($id_servico) && !empty($id_tipo)){
                $sql = MySql::conectar()->prepare("UPDATE tb_agendamento SET nome_cliente = ?, telefone = ?, nome_animal = ?, raca_animal = ?, sexo_animal = ?, data_hora = ?, tb_forma_pagamento_id = ?, tb_servico_id = ?, tb_tipo_animal_id = ? WHERE id_agendamento = ?");
                $sql->execute(array($nome_cliente,$telefone,$nome_animal,$raca,$sexo,$data_hora,$id_forma,$id_servico,$id_tipo,$id));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Dados alterados com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos vazios não são aceitos!</div>';
            }
        }
    }

    function populaSelect($tabela,$selecionado){
        if($tabela == 'situacao'){
            $arrStatus = [0 => "Agendado",
                  1 => "Consulta Pendente",
                  2 => "Pagamento Pendente",
                  3 => "Concluído"];
            foreach($arrStatus as $key => $value){
                if($selecionado != null){
                    if($selecionado == $key){
                        echo '<option value="'.$key.'" selected>'.$value.'</option>';
                    }else{
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                }else{
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
            }
        }else{
            global $registro;
            $registro = buscarRegistros($tabela);
            foreach($registro as $key => $value){
                if($selecionado != null){
                    if($selecionado == $value[0]){
                        echo '<option value="'.$value[0].'" selected>'.$value[1].'</option>';
                    }else{
                        echo '<option value="'.$value[0].'">'.$value[1].'</option>';
                    }
                }else{
                    echo '<option value="'.$value[0].'">'.$value[1].'</option>';
                }
            }
        }
    }

    function pesquisaTabelaID($tabela,$indice,$id){
        global $valores;
        $valores = buscarRegistros($tabela);
        foreach($valores as $key => $value){
            if($value[0] == $id){
                return $value[$indice];
            }
        }
    }

?>