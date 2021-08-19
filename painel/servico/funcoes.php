<?php 
    require_once('../../config.php');
    require_once(DBAPI);

    function listarServicos(){
        global $servicos;
        $servicos = buscarRegistros('tb_servico');
    }

    function VizualizarServicoID($idVizualiza){
        global $vizualizaServico;
        $vizualizaServico = buscarRegistros('tb_servico','id_servico',$idVizualiza);
    }

    function adicionarServico(){
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $formatado_ponto = str_replace(",",".",$valor);
            $usuario = intval($_POST['tb_usuario_id']);
            if(!empty($nome) && !empty($descricao) && !empty($valor) && !empty($usuario)){
                $sql = MySql::conectar()->prepare("INSERT INTO tb_servico VALUES (NULL,?,?,?,?)");
                $sql->execute(array($nome,$descricao,$formatado_ponto,$usuario));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Cadastro realizado com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function alterarServico(){
        $id = $_GET['id'];
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $formatado_ponto = str_replace(",",".",$valor);
            $usuario_id = intval($_POST['tb_usuario_id']);
            if(!empty($nome) && !empty($descricao) && !empty($valor) && !empty($usuario_id)){
                $sql = MySql::conectar()->prepare("UPDATE tb_servico SET nome = ?, descricao = ?, valor = ?, tb_usuario_id = ? WHERE id_servico = ?");
                $sql->execute(array($nome,$descricao,$formatado_ponto,$usuario_id,$id));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Dados alterados com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function excluirServico() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            deletar('tb_servico', 'id_servico', $id);
        }
        header('location: index.php');
    }

    function populaProfissionais($selecionado){
        global $prof;
        $prof = buscarRegistros('tb_usuario');
        foreach($prof as $key => $value){
            if($selecionado != null){
                if($selecionado == $value[0]){
                    echo '<option value="'.$value[0].'" selected>'.$value[3].'</option>';
                }else{
                    echo '<option value="'.$value[0].'">'.$value[3].'</option>';
                }
            }else{
                echo '<option value="'.$value[0].'">'.$value[3].'</option>';
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

?>