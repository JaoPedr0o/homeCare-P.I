<?php
// cadastrar.php
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

    // Verifica se o CORÉN tem 7 ou 8 dígitos e um estado (UF) de 2 letras
    if (strlen($coren) != 6) {
        return false;
    }

    // Validação adicional pode ser implementada dependendo do padrão regional
    return true; // Implementar lógica específica se necessário
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo']; // O sexo é obtido a partir dos inputs do tipo rádio
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografia da senha
    $estado = $_POST['estado'];

    if (!validarCpf($cpf)) {
        echo "CPF inválido.";
        exit;
    }

    if ($tipo == '2') {
        $coren = $_POST['coren'];
        if (!validarCoren($coren)) {
            echo "CORÉN inválido.";
            exit;
        }

        // Inserir na tabela 'profissionais'
        $sql = "INSERT INTO profissionais (nome, cpf, data_nascimento, sexo, email, senha, estado, coren) 
                VALUES (:nome, :cpf, :data_nascimento, :sexo, :email, :senha, :estado, :coren)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':data_nascimento' => $data_nascimento,
            ':sexo' => $sexo,
            ':email' => $email,
            ':senha' => $senha,
            ':estado' => $estado,
            ':coren' => $coren
        ]);
    } else {
        // Inserir na tabela 'pacientes'
        $sql = "INSERT INTO pacientes (nome, cpf, data_nascimento, sexo, email, senha, estado) 
                VALUES (:nome, :cpf, :data_nascimento, :sexo, :email, :senha, :estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':data_nascimento' => $data_nascimento,
            ':sexo' => $sexo,
            ':email' => $email,
            ':senha' => $senha,
            ':estado' => $estado
        ]);
    }

    echo "Cadastro realizado com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>
