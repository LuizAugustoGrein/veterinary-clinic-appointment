<?php 

    require_once('../config.php');
    require_once(DBAPI);

    function listarServicos(){
        global $servicos;
        $servicos = buscarRegistros('tb_servico');
    }

    function adicionarAgendamento(){
        if(isset($_POST['acao'])){
            $nome_cliente = $_POST['nome_cliente'];
            $telefone = $_POST['telefone'];
            $nome_animal = $_POST['nome_animal'];
            $raca = $_POST['raca_animal'];
            $sexo = $_POST['sexo_animal'];
            $data_hora = $_POST['data_hora'];
            $id_forma = $_POST['tb_forma_pagamento_id'];
            $id_servico = $_POST['tb_servico_id'];
            $valor_servico = valorServico($id_servico);
            $id_tipo = $_POST['tb_tipo_animal_id'];
            if(!empty($nome_cliente) && !empty($telefone) && !empty($nome_animal) && !empty($raca) && !empty($sexo) && !empty($data_hora) && !empty($id_forma) && !empty($id_servico) && !empty($id_tipo)){
                $sql = MySql::conectar()->prepare("INSERT INTO tb_agendamento VALUES (NULL,?,?,?,?,?,?,?,0,?,?,?)");
                $sql->execute(array($nome_cliente,$telefone,$nome_animal,$raca,$sexo,$data_hora,$valor_servico,$id_forma,$id_servico,$id_tipo));
                header('location: index.php');
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function valorServico($id_serv){
        $servs = buscarRegistros('tb_servico');
        $valor = 0;
        foreach($servs as $serv) : 
            if($serv[0] == $id_serv){
                $valor = $serv[3];
            }
        endforeach;
        return $valor;
    }

    function populaSelect($tabela,$selecionado){
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

    function pesquisaProfissional($id){
        global $prof;
        $prof = buscarRegistros('tb_usuario');
        foreach($prof as $key => $value){
            if($value[0] == $id){
                return $value[3];
            }
        }
    }

    function alterarServicoPreco(){
        if(isset($_POST['acao'])){
            $nome_cliente = $_POST['nome_cliente'];
            $telefone = $_POST['telefone'];
            $nome_animal = $_POST['nome_animal'];
            $raca = $_POST['raca_animal'];
            $sexo = $_POST['sexo_animal'];
            $data_hora = $_POST['data_hora'];
            $id_forma = $_POST['tb_forma_pagamento_id'];
            $id_servico = $_POST['tb_servico_id'];
            $valor_servico = valorServico($id_servico);
            $id_tipo = $_POST['tb_tipo_animal_id'];
            if(!empty($nome_cliente) && !empty($telefone) && !empty($nome_animal) && !empty($raca) && !empty($sexo) && !empty($data_hora) && !empty($id_forma) && !empty($id_servico) && !empty($id_tipo)){
                $sql = MySql::conectar()->prepare("INSERT INTO tb_agendamento VALUES (NULL,?,?,?,?,?,?,?,0,?,?,?)");
                $sql->execute(array($nome_cliente,$telefone,$nome_animal,$raca,$sexo,$data_hora,$valor_servico,$id_forma,$id_servico,$id_tipo));
                header('location: index.php');
            }else{
                echo '<div class="alert alert-danger" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }



?>