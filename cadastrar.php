<?php
require 'config.php';

function validarCpf($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (caso comum de CPF inválido)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += $cpf[$i] * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = $resto < 2 ? 0 : 11 - $resto;

    // Calcula o segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += $cpf[$i] * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = $resto < 2 ? 0 : 11 - $resto;

    // Verifica se os dígitos verificadores são válidos
    return $cpf[9] == $digito1 && $cpf[10] == $digito2;
}

function validarCoren($coren) {
    // Remove caracteres não numéricos
    $coren = preg_replace('/[^0-9]/', '', $coren);

    // Verifica se o CORÉN tem no máximo 10 dígitos
    return strlen($coren) <= 10;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];  
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografia da senha

    if (!validarCpf($cpf)) {
        echo "CPF inválido.";
        exit;
    }

    try {
        if ($tipo == '2') {
            $coren = $_POST['coren'];
            if (!validarCoren($coren)) {
                echo "CORÉN inválido.";
                exit;
            }

            // Inserir na tabela 'profissionais'
            $sql = "INSERT INTO profissionais (nome, cpf, data_nascimento, sexo, email, senha, coren) 
                    VALUES (:nome, :cpf, :data_nascimento, :sexo, :email, :senha, :coren)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $nome,
                ':cpf' => $cpf,
                ':data_nascimento' => $data_nascimento,
                ':sexo' => $sexo,
                ':email' => $email,
                ':senha' => $senha,
                ':coren' => $coren
            ]);

            // Iniciar a sessão se ainda não estiver iniciada
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['id'] = $pdo->lastInsertId();

        } else {
            // Inserir na tabela 'pacientes'
            $sql = "INSERT INTO pacientes (nome, cpf, data_nascimento, sexo, email, senha) 
                    VALUES (:nome, :cpf, :data_nascimento, :sexo, :email, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $nome,
                ':cpf' => $cpf,
                ':data_nascimento' => $data_nascimento,
                ':sexo' => $sexo,
                ':email' => $email,
                ':senha' => $senha
            ]);
        }

        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao realizar o cadastro: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
