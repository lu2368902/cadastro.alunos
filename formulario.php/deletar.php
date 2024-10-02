<?php
include('db.php'); // Certifique-se de que o arquivo db.php está no mesmo diretório

if (isset($_GET['id'])) {
    // Sanitização da entrada para evitar SQL Injection
    $id = intval($_GET['id']); // Converte para inteiro

    // Preparação da instrução SQL
    $sql = "DELETE FROM alunos WHERE id = ?";

    // Usa prepared statements para evitar SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" significa que o parâmetro é um inteiro

    // Executa a instrução
    if ($stmt->execute()) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

    $stmt->close(); // Fecha a instrução
    $conn->close(); // Fecha a conexão

    // Redireciona para o formulário
    header("Location: index.php");
    exit();
} else {
    echo "ID não especificado.";
}
?>
