   <?php
// inserir.php

// Inclui o arquivo de conexão
require 'Conexao.php';

// Dados a serem inseridos
$nome = "Alexandre";
$logradouro = "Rua Um";
$numero = 2;
$bairro = "Tres";
$cidade = "Quatro";
$estado = "Cinco";
$email = "alexandre@exemplo.com.br";
$celular = "(99) 99999-9999";
$status = 1; // 1 para ativo, 0 para inativo

// Função para inserir dados
function inserirContato($conexao, $nome, $logradouro, $numero, $bairro, $cidade, $estado, $email, $celular, $status) {
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
    echo "Dados inseridos com sucesso!";
}

// Chama a função para inserir os dados
inserirContato($conexao, $nome, $logradouro, $numero, $bairro, $cidade, $estado, $email, $celular, $status);
?>