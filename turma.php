<?php
session_start();
include('conexao.php');
include('sessao.php');
include('bancoAtividade.php');
$codigo = $_GET['codigo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ECF0F1;
        }

        header {
            background-color: #3498DB;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
            color: white;
        }

        main {
            display: block;
            width: auto;
        }

        table {
            margin: auto;
            border: 2px solid #0056b3;
            width: 90%;
            border-radius: 0.8rem; 
            overflow-x: auto;
        }


        p{
            display: flex;
            justify-content: center;
            align-items: center;
            color: #0056b3;
            margin: auto;
            margin-bottom: 1rem;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            position: relative;
            color: #0056b3;
            font-weight: bold;
            margin: 100%;
            justify-content: center;  
            align-items: center;      
        }

        tr:hover {
            background-color: #ADD8E6;
            width: 100%;
        }

        .editar .excluir {
            background-color: #27AE60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .editar .excluir :hover {
            background-color: #2980B9;
            color: white;
        }

        button,
        a {
            display: flex;
            justify-content: center;
            max-width: 50%;
            padding: 1rem;
            background-color: #fff;
            color: #007bff;
            border: 2px #0056b3 solid;
            text-decoration: none;
            border-radius: 0.8rem;
            cursor: pointer;
        }

        button,
        a:hover {
            background-color: #0056b3;
            color: #fff;
        }

        #cadastrar,
        #sair {
            display: flex;
            margin: auto;
            max-width: 40%;
        }

        .botoes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: center;
            align-items: center;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <header>
            <tr>Professor: <?php echo $_SESSION['nome']; ?></tr>
    </header>
    <br>
<p>Turma: <?php echo $codigo; ?><p>
    <main>
        <table id="tabelaTurmas">
            <thead>
                <th>Número</th>
                <th>Nome</th>
            </thead>
            <tbody>
                <?php

                if ($usuariosResult->num_rows > 0) {
                    while ($row = $usuariosResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_atividade"] . "</td>";
                        echo "<td>" . $row["nome_atividade"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nenhuma atividade encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <div class="botoes">
        <a href="cadastroAtividade.php?codigo='.$codigo">Cadastrar nova atividade</a>
        <a href="index.php" sair" id="sair">Voltar</a>
    </div>
</body>

</html>