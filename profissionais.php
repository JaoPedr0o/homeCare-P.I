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
    <link rel="stylesheet" href="login2.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="sidebar-content">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="telaInicial.php">
                                <i class="fa-solid fa-house"></i>
                                <span class="sidebar-text">Início</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">
                                <i class="fa-solid fa-user"></i>
                                <span class="sidebar-text">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profissionais.php">
                                <i class="fa-solid fa-notes-medical"></i>
                                <span class="sidebar-text">Profissionais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="materiais.php">
                                <i class="fa-solid fa-shop"></i>
                                <span class="sidebar-text">Materiais</span>
                            </a>
                        </li>
                        <li class="nav-item" style="position: fixed; bottom: 0; ">
                            <a class="nav-link" href="login.php">
                                <i class="fa-solid fa-door-closed"></i>
                                <span class="sidebar-text">Sair</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

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
                                <p class="card-text"><strong>CPF:</strong> <?php echo htmlspecialchars($profissional['cpf']); ?></p>
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
