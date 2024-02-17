<?php
include('conexao.php');

if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
} 

if(isset($_POST['userEmail']) || isset($_POST['passwords'])) {

    if(strlen($_POST['userEmail']) == 0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['passwords']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conexao->real_escape_string($_POST['userEmail']);
        $senha = $conexao->real_escape_string($_POST['passwords']);
        
        $sql_code = "SELECT * FROM professor WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $professor = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_prof'] = $professor['id_prof'];
            $_SESSION['nome'] = $professor['nome'];
     

            header("Location: index.php");

        } else {
            echo "Falha ao logar! EMAIL ou SENHA incorretos";
        }
    }
}