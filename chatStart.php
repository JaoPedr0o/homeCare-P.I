<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $professional_id = $_POST['professional_id'];
    $user1_id = $_SESSION['id'];
    $user1_type = $_SESSION['tipo_usuario'];
    $user2_id = $professional_id;
    $user2_type = ($user1_type === 'profissionais') ? 'pacientes' : 'profissionais';

    // Verifica se já existe um chat
    $query = "SELECT * FROM chats WHERE (user1_id = ? AND user2_id = ?) OR (user1_id = ? AND user2_id = ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user1_id, $user2_id, $user2_id, $user1_id]);
    $chat = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$chat) {
        // Inicia um novo chat
        $insertQuery = "INSERT INTO chats (user1_id, user2_id, user1_type, user2_type, created_at) VALUES (?, ?, ?, ?, NOW())";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->execute([$user1_id, $user2_id, $user1_type, $user2_type]);
        $chat_id = $pdo->lastInsertId();
    } else {
        // Usa o chat existente
        $chat_id = $chat['id'];
    }

    // Redireciona para a página de mensagens
    header("Location: chat.php?chat_id=$chat_id");
    exit();
}
?>
