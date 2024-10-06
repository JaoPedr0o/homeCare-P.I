<?php
require 'config.php';

$erro = '';  // Variável para armazenar a mensagem de erro

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (empty($_POST['email'])) {
        $erro = "Preencha seu E-mail!";
    } else if (empty($_POST['senha'])) {
        $erro = "Preencha sua senha!";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT 'pacientes' AS tipo_usuario, id, nome, email, senha FROM pacientes WHERE email = :email
        UNION 
        SELECT 'profissionais' AS tipo_usuario, id, nome, email, senha FROM profissionais WHERE email = :email";
    

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verificação da senha usando password_verify
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
            header("Location: telaInicial.php");
            exit;
        } else {
            $erro = "[ERRO!] Senha ou E-mail incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Exibir a mensagem de erro no título -->
        <title><?php echo $erro ? "Erro: $erro" : "Necessário Login"; ?></title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
        <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="necessarioLogin.css">
    </head>
    <body>
        <!-- Mensagem de aviso -->
        <h2 class="aviso">
            Você não pode acessar essa página, 
            <?php 
            if ($erro) {
                echo "<br>pois: $erro";
            } else {
                echo "<br>pois não está logado.";
            }
            ?>
        </h2>

        <a href="login.php">
            <button id="entrar" class="btn btn-second">ENTRAR</button>
        </a>
    </body>
</html>
