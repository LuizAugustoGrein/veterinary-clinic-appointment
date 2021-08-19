<?php

    class MySql{

        private static $pdo;

        public static function conectar(){
            if(self::$pdo == null){
                try{
                    self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }catch(Exception $e){
                    echo '<h2><b>Erro ao conectar ao Banco de Dados!</b><h2>';
                }
            }
            return self::$pdo;
        }

    }

?>