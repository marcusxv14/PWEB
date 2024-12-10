<?php
require 'Conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $status = $_POST['status'];

    $sql = "UPDATE contatos SET nome = :nome, logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, email = :email, celular = :celular, status = :status WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'logradouro' => $logradouro,
        'numero' => $numero,
        'bairro' => $bairro,
        'cidade' => $cidade,
        'estado' => $estado,
        'email' => $email,
        'celular' => $celular,
        'status' => $status
    ]);

    $mensagem = "Contato atualizado com sucesso!";
    header("Location: index.php?mensagem=" . urlencode($mensagem));
    exit();
}
?>