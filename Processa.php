<?php
// Inclui o arquivo de conexão
require 'Conexao.php';

// Função para excluir um contato
function excluirContato($conexao, $id) {
    $sql = "DELETE FROM contatos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro.";
    }
}

// Processa a ação do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];
    if ($acao == 'excluir') {
        $id = $_POST['id'];
        excluirContato($conexao, $id);
    }
}
?>