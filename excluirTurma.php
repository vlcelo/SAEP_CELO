<?php
include('sessao.php');
include('bancoTurmas.php');

if (isset($_GET['edit']) && isset($_GET['action']) && $_GET['action'] === 'excluir') {
    $editTurmaId = $_GET['edit'];

    // Exclui o usuário com base no ID fornecido
    $excluirQuery = "DELETE FROM turmas WHERE id_turma = $editTurmaId";

    if ($conexao->query($excluirQuery) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao excluir o usuário: " . $conexao->error;
    }
}
?>