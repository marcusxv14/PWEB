<?php
 
$id = 2;

require 'Conexao.php';


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

excluirContato($conexao, $id);
?>