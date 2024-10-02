<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="css/mine.css">
</head>
<body>
    <h2>Cadastro de Alunos</h2>

    <!-- Formulário de Cadastro -->
    <form action="cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br>

        <button type="submit">Cadastrar</button>
    </form>

    <!-- Formulário de Busca -->
    <form method="GET" action="cadastro.php">
        <input type="text" name="pesquisa" placeholder="Buscar por nome ou curso">
        <button type="submit">Buscar</button>
    </form>

    <!-- Listagem de Alunos -->
    <?php
    include('db.php');

    // Verifica se há uma pesquisa realizada pelo usuário
    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

    // Consulta SQL para buscar alunos filtrando por nome ou curso
    $sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' OR curso LIKE '%$pesquisa%'";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<h3>Lista de Alunos</h3>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["idade"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["curso"] . "</td>
                    <td><a href='deletar.php?id=" . $row["id"] . "'>Excluir</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum aluno encontrado.";
    }
    ?>

</body>
</html>
