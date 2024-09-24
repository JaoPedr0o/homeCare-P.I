<?php
require 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("Usuário não autenticado.");
}

$userId = $_SESSION['id'];
$userType = $_SESSION['tipo_usuario'];

if (!in_array($userType, ['pacientes', 'profissionais'])) {
    die("Tipo de usuário inválido: $userType");
}

if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);

    if (getimagesize($_FILES["profileImage"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
            $sql = ($userType == 'pacientes') 
                ? "UPDATE pacientes SET profile_image = :profile_image WHERE id = :id"
                : "UPDATE profissionais SET profile_image = :profile_image WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':profile_image', $targetFile);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Redireciona para a página de confirmação
                header("Location: confirmation.php?status=success");
                exit();
            } else {
                // Em caso de erro, redireciona para a página de confirmação com uma mensagem de erro
                header("Location: confirmation.php?status=error&message=" . urlencode(implode(", ", $stmt->errorInfo())));
                exit();
            }
        } else {
            // Redireciona para a página de confirmação em caso de erro ao mover o arquivo
            header("Location: confirmation.php?status=error&message=" . urlencode("Erro ao enviar o arquivo."));
            exit();
        }
    } else {
        // Redireciona para a página de confirmação em caso de arquivo inválido
        header("Location: confirmation.php?status=error&message=" . urlencode("O arquivo enviado não é uma imagem válida."));
        exit();
    }
}
?>
