<?php
session_start();
include('conexao.php');
include('sessao.php');
include('bancoTurmas.php');

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
        <div>Professor: <?php echo $_SESSION['nome']; ?></div>
    </header>
    <br>
    <main>
        <table id="tabelaTurmas">
            <thead>
                <th>Número</th>
                <th>Nome</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php

                if ($usuariosResult->num_rows > 0) {
                    while ($row = $usuariosResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_turma"] . "</td>";
                        echo "<td>" . $row["nome_turma"] . "</td>";
                        echo '<td><a href="turma.php?codigo=' . $row["nome_turma"] . '" class="editar">Visualizar</a></td>';
                        echo '<td><a href="#" onclick="confirmarExclusao (' . $row["id_turma"] .  ')" class="excluir">Excluir</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma turma encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

        <br>

        <div class="botoes">
            <a href="cadastroTurma.php" id="cadastrar">Cadastrar nova turma</a>
            <a href="logout.php" sair" id="sair">Sair</a>
        </div>

        <script>
  function confirmarExclusao(idTurma) {
    var confirmacao = confirm("Tem certeza que deseja excluir este usuário?");

    if (confirmacao) {
      // Se o usuário clicou em "OK" no popup, redirecione para a página de exclusão com o ID do usuário
      window.location.href = 'excluirTurma.php?edit=' + idTurma + '&action=excluir';
    } else {
      // Se o usuário clicou em "Cancelar", nada acontecerá
    }
  }
</script>
</body>
</html>