<?php 
    require_once('../../config.php');
    require_once(DBAPI);

    function listarFormas(){
        global $formas;
        $formas = buscarRegistros('tb_forma_pagamento');
    }

    function adicionarForma(){
        if(isset($_POST['acao'])){
            $forma = $_POST['forma'];
            if(!empty($forma)){
                $sql = MySql::conectar()->prepare("INSERT INTO tb_forma_pagamento VALUES (NULL,?)");
                $sql->execute(array($forma));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Cadastro realizado com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function alterarForma(){
        $id = $_GET['id'];
        if(isset($_POST['acao'])){
            $forma = $_POST['forma'];
            if(!empty($forma)){
                $sql = MySql::conectar()->prepare("UPDATE tb_forma_pagamento SET forma = ? WHERE id_forma = ?");
                $sql->execute(array($forma,$id));
                echo '<div class="alert alert-success" style="width: 400px; text-align: center; display:inline-block;" role="alert">Dados alterados com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" style="width: 400px; text-align: center; display:inline-block;" role="alert">Campos Vazios não são aceitos!</div>';
            }
        }
    }

    function excluirForma() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            deletar('tb_forma_pagamento', 'id_forma', $id);
            header('location: index.php');
        }else{
            header('location: index.php');
        }
    }

?>