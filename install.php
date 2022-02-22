<?php

    require_once __DIR__ . "/config.php";

    #INSTALA O BANCO DE DADOS QUANDO NÃO EXISTE

    use App\Connection\Connection;

    $conn = new Connection();
    $conn = $conn->getConnection();

    #lê o arquivo .sql com os dados do banco. 
    #IMPORTANTE: o arquivo deve estar na raiz do projeto
    $sql = file_get_contents("bd_info_trampo.sql");

    $result = $conn->exec($sql);

    echo "banco instalado com sucesso";