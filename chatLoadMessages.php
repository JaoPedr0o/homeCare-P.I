<?php
session_start();
require 'config.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit;
}

// Verifica se o chat_id foi passado
if (isset($_GET['chat_id'])) {
    $chat_id = $_GET['chat_id'];

    // Busca mensagens do chat
    $query = "SELECT m.*, 
                     CASE 
                         WHEN m.sender_type = 'profissionais' THEN p.nome 
                         ELSE pa.nome 
                     END AS sender_name 
              FROM messages m
              LEFT JOIN profissionais p ON m.sender_id = p.id AND m.sender_type = 'profissionais'
              LEFT JOIN pacientes pa ON m.sender_id = pa.id AND m.sender_type = 'pacientes'
              WHERE m.chat_id = ? 
              ORDER BY m.sent_at ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$chat_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Gera a resposta em HTML
    foreach ($messages as $message) {
        $message_class = $message['sender_type'] === 'profissionais' ? 'message-profissional' : 'message-paciente';
        echo "<div class='{$message_class}'>";
        echo "<p>" . htmlspecialchars($message['message']) . "</p>";

        // Usando DateTime para formatar a hora
        $dateTime = new DateTime($message['sent_at']);
        $sent_at_time = $dateTime->format('H:i');

        echo "<span class='message-info'><div>" . htmlspecialchars($message['sender_name']) . "</div> <div>" . $sent_at_time . "</div></span>";
        echo "</div>";
    }
} else {
    echo "Chat não encontrado.";
    exit;
}
?>
