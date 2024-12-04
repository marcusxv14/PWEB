<?php
require 'Conexao.php';

function buscarContatos($conexao) {
    $sql = "SELECT * FROM contatos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$contatos = buscarContatos($conexao);
?>