<?php
include('conexao.php');
$usuariosQuery = "SELECT id_turma, nome_turma FROM turmas";
$usuariosResult = $conexao->query($usuariosQuery);
?>