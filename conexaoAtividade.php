<?php
session_start();
include('conexao.php');
include('sessao.php');

// Verifica se o formulário foi submetido via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeAtividade = mysqli_real_escape_string($conexao, trim($_POST['nomeAtividade']));

    // Verifica se a atividade com o mesmo nome já existe
    $sql = "SELECT COUNT(*) as total FROM atividades WHERE nome_atividade = '$nomeAtividade'";
    $result = mysqli_query($conexao, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == 1) {
        $_SESSION['atividade_existe'] = true;
        header('Location: cadastroAtividade.php');
        exit;
    }

    // Insere a nova atividade
    $stmt = $conexao->prepare("INSERT INTO atividades (nome_atividade) VALUES (?)");
    $stmt->bind_param("s", $nomeAtividade);

    if ($stmt->execute() === TRUE) {
        $_SESSION['status_cadastro'] = true;
        $stmt->close();
        header('Location: turma.php');
        exit;
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }
} else {
    // Se não foi enviado via POST, redirecione para a página adequada
    header('Location: cadastroAtividade.php');
    exit;
}
?>