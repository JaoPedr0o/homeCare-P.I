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

    $sql = ($userType == 'pacientes') 
        ? "SELECT profile_image FROM pacientes WHERE id = :id"
        : "SELECT profile_image FROM profissionais WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ? $user['profile_image'] : null;
}
?>
