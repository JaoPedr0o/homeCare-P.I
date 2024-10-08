<?php
require 'config.php';

function getProfileImage() {
    global $pdo;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['id']) || !isset($_SESSION['tipo_usuario'])) {
        return null; // Retornar null se não estiver autenticado
    }

    $userId = $_SESSION['id'];
    $userType = $_SESSION['tipo_usuario'];

    // Consulta para obter a imagem de perfil
    $sql = ($userType == 'pacientes') 
        ? "SELECT profile_image FROM pacientes WHERE id = :id"
        : "SELECT profile_image FROM profissionais WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se a imagem existe e retorna o Base64 formatado para HTML
    if ($user && $user['profile_image']) {
        // Retorna a imagem no formato Base64 diretamente para ser usada no HTML
        return 'data:image/jpeg;base64,' . $user['profile_image'];
    }

    return null;
}
?>
