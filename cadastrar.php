<?php
// cadastrar.php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo']; // O sexo é obtido a partir dos inputs do tipo rádio
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografia da senha
    $estado = $_POST['estado'];

    if ($tipo == '1') {
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
    } elseif ($tipo == '2') {
        // Inserir na tabela 'profissionais'
        $coren = $_POST['coren'];
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
        echo "Tipo de cadastro inválido.";
        exit;
    }

    echo "Cadastro realizado com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>
