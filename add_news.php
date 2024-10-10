<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insere a notícia no banco de dados
    $sql = "INSERT INTO news (title, content) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$title, $content])) {
        echo "Notícia adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar notícia.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Notícia</title>
</head>
<body>
    <h1>Adicionar Nova Notícia</h1>
    <form method="POST" action="">
        <label for="title">Título:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="content">Conteúdo:</label><br>
        <textarea name="content" id="content" required></textarea><br><br>

        <button type="submit">Adicionar Notícia</button>
    </form>
    <a href="news_list.php">Ver todas as notícias</a>
</body>
</html>
