<?php
// Caminho para o arquivo do banco de dados SQLite
$db_file = 'news.db';

try {
    // Conectar ao SQLite
    $pdo = new PDO("sqlite:" . $db_file);
    // Configurar para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar a tabela de notícias se não existir
    $sql = "CREATE TABLE IF NOT EXISTS news (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                content TEXT NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )";
    $pdo->exec($sql);

} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
