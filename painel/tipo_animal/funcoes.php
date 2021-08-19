<?php 
    require_once('../../config.php');
    require_once(DBAPI);

    function listarTipos(){
        global $tipos;
        $tipos = buscarRegistros('tb_tipo_animal');
    }

    function adicionarTipo(){
        if(isset($_POST['acao'])){
            $tipo = $_POST['tipo'];
            if(!empty($tipo)){
                $sql = MySql::conectar()->prepare("INSERT INTO tb_tipo_animal VALUES (NULL,?)");
                $sql->execute(array($tipo));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Cadastro realizado com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function alterarTipo(){
        $id = $_GET['id'];
        if(isset($_POST['acao'])){
            $tipo = $_POST['tipo'];
            if(!empty($tipo)){
                $sql = MySql::conectar()->prepare("UPDATE tb_tipo_animal SET tipo = ? WHERE id_tipo = ?");
                $sql->execute(array($tipo,$id));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Dados alterados com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function excluirTipo() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            deletar('tb_tipo_animal', 'id_tipo', $id);
            header('location: index.php');
        }else{
            header('location: index.php');
        }
    }

?>