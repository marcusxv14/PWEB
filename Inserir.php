<?php
require 'Conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $status = $_POST['status'];


    $sql = "INSERT INTO contatos (nome, logradouro, numero, bairro, cidade, estado, email, celular, status) 
            VALUES (:nome, :logradouro, :numero, :bairro, :cidade, :estado, :email, :celular, :status)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
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

    $mensagem = "Contato inserido com sucesso!";
    header("Location: index.php?mensagem=" . urlencode($mensagem));
    exit();
}
?>