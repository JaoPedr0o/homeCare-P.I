<?php
// config.php
$host = 'localhost'; // ou o endereço do seu servidor MySQL
$db   = 'meubanco';  // nome do seu banco de dados
$user = 'root';      // usuário do MySQL
$pass = '';          // senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
}
?>
