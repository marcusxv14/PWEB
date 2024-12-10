<?php
require 'Conexao.php';

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $sql = "SELECT * FROM contatos WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $contato = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Editar Contato</title>
</head>
<body>
    <div class="titulo">
        <h1>Editar Contato</h1>
    </div>
    <hr>
    <div class="Novo_cadastro">
        <form method="post" action="Atualizar.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($contato['id']) ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($contato['nome']) ?>" required><br>

            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro" value="<?= htmlspecialchars($contato['logradouro']) ?>" required><br>

            <label for="numero">Número:</label>
            <input type="number" name="numero" id="numero" value="<?= htmlspecialchars($contato['numero']) ?>" required><br>

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro" value="<?= htmlspecialchars($contato['bairro']) ?>" required><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" value="<?= htmlspecialchars($contato['cidade']) ?>" required><br>

            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" value="<?= htmlspecialchars($contato['estado']) ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($contato['email']) ?>" required><br>

            <label for="celular">Celular:</label>
            <input type="text" name="celular" id="celular" value="<?= htmlspecialchars($contato['celular']) ?>" required><br>

            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="<?= htmlspecialchars($contato['status']) ?>" required><br>

            <button type="submit">Atualizar</button>
            <button type="button" onclick="window.location.href='index.php'">Cancelar</button>
        </form>
    </div>
</body>
</html>