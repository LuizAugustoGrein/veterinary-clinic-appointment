<?php 
    require_once('../../config.php');
    require_once(DBAPI);

    function listarUsuarios(){
        global $usuarios;
        $usuarios = buscarRegistros('tb_usuario');
    }

    function adicionarUsuario(){
        if(isset($_POST['acao'])){
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            if(!empty($usuario) && !empty($senha) && !empty($nome)){
                $sql = MySql::conectar()->prepare("INSERT INTO tb_usuario VALUES (NULL,?,?,?,0)");
                $sql->execute(array($usuario,$senha,$nome));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Cadastro realizado com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function alterarUsuario(){
        $id = $_GET['id'];
        if(isset($_POST['acao'])){
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            if(!empty($usuario) && !empty($senha) && !empty($nome)){
                $sql = MySql::conectar()->prepare("UPDATE tb_usuario SET usuario = ?, senha = ?, nome = ? WHERE id_usuario = ?");
                $sql->execute(array($usuario,$senha,$nome,$id));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Dados alterados com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function excluirUsuario() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            deletar('tb_usuario', 'id_usuario', $id);
            header('location: index.php');
        }else{
            header('location: index.php');
        }
    }

?>