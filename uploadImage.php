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

// Verifica se o tipo de usuário é válido
if (!in_array($userType, ['pacientes', 'profissionais'])) {
    die("Tipo de usuário inválido: $userType");
}

if (isset($_POST['submit'])) {
    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES["profileImage"]) && getimagesize($_FILES["profileImage"]["tmp_name"])) {
        // Lê o conteúdo do arquivo de imagem
        $imageData = file_get_contents($_FILES["profileImage"]["tmp_name"]);

        // Converte a imagem para Base64
        $base64Image = base64_encode($imageData);

        // Definir o SQL com base no tipo de usuário (pacientes ou profissionais)
        $sql = ($userType == 'pacientes') 
            ? "UPDATE pacientes SET profile_image = :profile_image WHERE id = :id"
            : "UPDATE profissionais SET profile_image = :profile_image WHERE id = :id";

        // Prepara a consulta
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':profile_image', $base64Image);  // Insere a imagem em Base64
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        // Executa a consulta e verifica se foi bem-sucedida
        if ($stmt->execute()) {
            // Redireciona para uma página de confirmação com status de sucesso
            header("Location: confirmation.php?status=success");
            exit();
        } else {
            // Em caso de erro, redireciona com uma mensagem de erro
            header("Location: confirmation.php?status=error&message=" . urlencode(implode(", ", $stmt->errorInfo())));
            exit();
        }
    } else {
        // Redireciona para a página de confirmação em caso de arquivo inválido
        header("Location: confirmation.php?status=error&message=" . urlencode("O arquivo enviado não é uma imagem válida."));
        exit();
    }
}
?>
