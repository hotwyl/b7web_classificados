<?php
session_start();

try {
    $pdo = new PDO("mysql:dbname=hg3won41_classificados;host=nspro32.hostgator.com.br", "hg3won41_hotwyl", "willfrombrasil");
} catch (PDOException $e) {
    echo "Falhou: ".$e->getMessage();
}

?>