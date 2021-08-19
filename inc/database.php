<?php

    mysqli_report(MYSQLI_REPORT_STRICT);
    global $lastInsertId;

    function conectaMySQL(){
        try {
            $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            $conn->set_charset('utf8');
            return $conn;
        }catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    function desconectaMysql($conn){
        try{
            mysqli_close($conn);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function buscarRegistros($table = null, $chavePrimaria = null, $id = null){
        $database = conectaMysql();
	    $dados = null;
        try{
            if($id){
                $sql = "select * from $table where $chavePrimaria = $id";
                $result = $database->query($sql);
                if($result->num_rows > 0){
                    $dados = $result->fetch_array(MYSQLI_NUM);
                }
            }else{
                $sql = "select * from $table";
                $result = $database->query($sql);
                if($result->num_rows > 0){
                    $dados = $result->fetch_all(MYSQLI_NUM);
                }
            }
        }catch(Exception $e){
            $_SESSION['message'] = $e->getMessage();
            $_SESSION['type'] = 'danger';
        }
        return $dados;
        desconectaMysql($database);
    }

    function deletar($table = null,$chavePrimaria = null, $id = null){
        $database = conectaMysql();
        $sql = "delete from $table where $chavePrimaria = $id";
        try{
            $database->query($sql);
            $_SESSION['message'] = 'Registro apagado com sucesso!';
            $_SESSION['type'] = 'success';
            return true;
        }catch (Exception $e){
            $_SESSION['message'] = 'Não foi possível realizar a operação!';
            $_SESSION['type'] = 'danger';
            return false;
        } 
        desconectaMysql($database);
    }

?>