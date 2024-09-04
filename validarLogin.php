<?php
require 'config.php';

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (empty($_POST['email'])) {
        echo "Preencha seu E-mail!";
    } else if (empty($_POST['senha'])) {
        echo "Preencha sua senha!";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consultando o banco de dados apenas pelo email
        $sql = "
            SELECT 'pacientes' AS tipo_usuario, nome, email, senha FROM pacientes WHERE email = :email
            UNION 
            SELECT 'profissionais' AS tipo_usuario, nome, email, senha FROM profissionais WHERE email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($usuario);
        var_dump($usuario['senha']);
        // Verificação da senha usando password_verify
        if ($usuario &&  password_verify($senha, $usuario['senha'])) {
            // Senha verificada com sucesso
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
            header("Location: telainicial.php");
            exit;
        } else {
            echo "[ERRO!] Senha ou E-mail incorretos!";
        }
    }
}
?>
