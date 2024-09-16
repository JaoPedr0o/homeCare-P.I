<?php
// listarFuncionarios.php
require 'config.php';


// Conectar ao banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=seubanco', 'usuario', 'senha');

// Consultar todos os funcionários
$stmt = $pdo->query("SELECT * FROM profissionais");
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Exibir os dados em uma tabela HTML
echo '<table>';
echo '<tr><th>ID</th><th>Nome</th><th>CPF</th></tr>';
foreach ($funcionarios as $funcionario) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($funcionario['id']) . '</td>';
    echo '<td>' . htmlspecialchars($funcionario['nome']) . '</td>';
    echo '<td>' . htmlspecialchars($funcionario['cpf']) . '</td>';
    echo '</tr>';
}
echo '</table>';
?>

