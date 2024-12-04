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
        <div class="popup-overlay active"></div>
        <div class="popup active">
            <p><?= htmlspecialchars($_GET['mensagem']) ?></p>
            <form method="get" action="index.php">
                <button type="submit">Fechar</button>
            </form>
        </div>
    <?php endif; ?>
    
    <?php
    $exibirFormulario = isset($_GET['novo_usuario']);
    if ($exibirFormulario):
    ?>

    <form method="post" action="Inserir.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required> 

        <label for="logradouro">Logradouro</label>
        <input type="text" name="logradouro" id="logradouro" required> 

        <label for="numero">Numero</label>
        <input type="number" nome="numero" id="numero" required>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" required>

        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" required>

        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" required>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" required>
        <button type="submit">Inserir</button>
    </form>
    <?php else: ?>
    
        <form method="get" action="index.php">
            <div class="butao_novo">     
              <button type="submit" name="novo_usuario" value="1">Novo Contato</button>
            </div>
        </form>
    <?php endif; ?>

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
                       <div class="botao_excluir">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
                       </div> 
                    </form>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>
</html>