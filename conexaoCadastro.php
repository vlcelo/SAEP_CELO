<?php
session_start();
include('conexao.php');
include('sessao.php');

$nomeTurma = mysqli_real_escape_string($conexao, trim($_POST['nomeTurma']));
$id_prof = mysqli_real_escape_string($conexao, trim($_SESSION['id_prof']));


$sql = "SELECT COUNT(*) as total FROM turmas WHERE nome_turma = '$nomeTurma'";
$result = mysqli_query($conexao, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    $_SESSION['turma_existe'] = true;
    header('Location: cadastroTurma.php');
    exit;
}

$sql = "INSERT INTO turmas (nome_turma, professor) VALUES ('$nomeTurma', '$id_prof')";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    $conexao->close();
    header('Location: index.php');
    exit;

    $_SESSION['id_turma'] = $nomeTurma['id_turma'];
    $_SESSION['nome_turma'] = $nomeTurma['nome_turma'];


} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}
?>