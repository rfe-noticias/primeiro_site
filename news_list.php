<?php
include 'db.php';

// Consulta para buscar todas as notícias
$sql = "SELECT * FROM news ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Notícias</title>
</head>
<body>
    <h1>Últimas Notícias</h1>

    <?php if (count($news) > 0): ?>
        <?php foreach ($news as $item): ?>
            <article>
                <h2><?php echo htmlspecialchars($item['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($item['content'])); ?></p>
                <small>Publicado em: <?php echo $item['created_at']; ?></small>
                <hr>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma notícia encontrada.</p>
    <?php endif; ?>
    
    <a href="add_news.php">Adicionar Nova Notícia</a>
</body>
</html>
