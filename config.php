<?php

    // CARREGA CLASSES
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };
    spl_autoload_register($autoload);

    // DEFINE FUSO HORÁRIO
    date_default_timezone_set('America/Sao_Paulo');

    // CONSTANTES BANCO DE DADOS
    define('DB_NAME','db_clinica_veterinaria');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_HOST','localhost');

    // CONSTANTES DIRETÓRIOS
    if (!defined('ABSPATH'))
        define('ABSPATH',dirname(__FILE__) . '/');
    if (!defined('BASEURL'))
        define('BASEURL','/projetos/clinica_veterinaria/');
    if (!defined('DBAPI'))
        define('DBAPI', ABSPATH . 'inc/database.php');

    // CONSTANTES INCLUDE
    define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
    define('HEADER_TEMPLATE_PAINEL', ABSPATH . 'painel/inc/header.php');
    define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
?>