<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $chat_id = $_POST['chat_id'];
    $message = $_POST['message'];
    $sender_id = $_SESSION['id'];
    $sender_type = $_SESSION['tipo_usuario'];

    // Insere a mensagem no banco de dados
    $query = "INSERT INTO messages (chat_id, sender_id, sender_type, message, sent_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$chat_id, $sender_id, $sender_type, $message]);

    // Retorna a nova mensagem em HTML
    echo '<div class="' . htmlspecialchars($sender_type) . '">
            <p>' . htmlspecialchars($message) . '</p>
            <span>' . date('Y-m-d H:i:s') . '</span>
          </div>';
}
?>
