<!DOCTYPE html>
<html lang="pt-br">

<?php
// Conectar ao banco de dados
require 'config.php';

try {
    // Preparar e executar a consulta
    $sql = "SELECT * FROM profissionais";
    $stmt = $pdo->query($sql);

    // Buscar todos os resultados
    $profissionais = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profissionais.css">
    <link rel="stylesheet" href="style.global.css">
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php 
                require 'sidebar.php'
            ?>
            <!-- Conteúdo Principal -->
            <div class=" col-md-9 col-lg-10 main-content">
                <h1>Conteúdo Principal</h1>
                <div id="resultado"></div>

                <!-- Container dos cards -->
                <div class="employee-container">
                    <?php if ($profissionais): ?>
                        <?php foreach ($profissionais as $profissional): ?>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlspecialchars($profissional['nome']); ?></h2>
                                <p class="card-text"><strong>CPF:</strong> <?php echo htmlspecialchars($profissional['CPF']); ?></p>
                                <p class="card-text"><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($profissional['data_nascimento']); ?></p>
                                <p class="card-text"><strong>Sexo:</strong> <?php echo htmlspecialchars($profissional['sexo']); ?></p>
                                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($profissional['email']); ?></p>
                                <p class="card-text"><strong>Estado:</strong> <?php echo htmlspecialchars($profissional['estado']); ?></p>
                                <p class="card-text"><strong>COREN:</strong> <?php echo htmlspecialchars($profissional['coren']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum profissional encontrado.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
