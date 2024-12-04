<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Agenda de contatos</title>
</head>
<body>
    <h1>Agenda de contatos</h1>
    <hr>
    
    <?php if (isset($_GET['mensagem'])): ?>
        <p><?= htmlspecialchars($_GET['mensagem']) ?></p>
    <?php endif; ?>
    
    <form method="post" action="Inserir.php" style="display:inline;">
    </form>
    <hr>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Opções</th>
        </tr>

        <?php
        require 'buscarContatos.php';
        foreach ($contatos as $contato):
        ?>
            <tr id="contato-<?= htmlspecialchars($contato['id']) ?>">
                <td><?= htmlspecialchars($contato['id']) ?></td>
                <td><?= htmlspecialchars($contato['nome']) ?></td>
                <td><?= htmlspecialchars($contato['celular']) ?></td>
                <td><?= htmlspecialchars($contato['email']) ?></td>
                <td>
                    <form method="post" action="Excluir.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($contato['id']) ?>">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>
</html>