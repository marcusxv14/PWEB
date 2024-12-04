<?php
require 'Conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM contatos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $mensagem = "Registro excluído com sucesso!";
    } else {
        $mensagem = "Erro ao excluir registro.";
    }

    // Redireciona de volta para a página principal com uma mensagem
    header("Location: index.php?mensagem=" . urlencode($mensagem));
    exit();
}
?>