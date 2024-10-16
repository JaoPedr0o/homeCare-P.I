<!DOCTYPE html>
<html lang="pt-br">

<?php
// Conectar ao banco de dados
require 'config.php';
require 'protect.php';
require 'getProfileImage.php';
$profileImage = getProfileImage();

try {
    // Preparar e executar a consulta
    $sql = "SELECT * FROM pacientes";
    $stmt = $pdo->query($sql);

    // Buscar todos os resultados
    $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital+ | Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="profissionais.css">
    <link rel="stylesheet" href="style.global.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php require 'sidebar.php'; ?>
            
            <!-- Conteúdo Principal -->
            <div class="col-md-9 col-lg-10 main-content">

                <div class="header-container">
                    <h2 class="header-title"><i class="fa-solid fa-magnifying-glass"></i></i>Buscar Pacientes</h2>
                    <div class="search-container">
                        <select id="searchFilter">
                            <option value="nome">Nome</option>
                            <option value="estado">Estado</option>
                            <option value="sexo">Sexo</option>
                        </select>
                        <input type="text" id="searchInput" placeholder="Pesquisar pacientes..." onkeyup="filterProfessionals()">
                    </div>
                </div>

                <!-- Container dos cards -->
                <div class="employee-container">
                    <?php if ($pacientes): ?>
                        <?php foreach ($pacientes as $paciente): ?>
                            <a href="#.php?id=<?php echo htmlspecialchars($paciente['id']); ?>" class="card" onclick="openModal(<?php echo htmlspecialchars(json_encode($paciente)); ?>)">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <?php if (!empty($paciente['profile_image'])): ?>
                                        <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($paciente['profile_image']); ?>" alt="Foto de Perfil" class="profile-img">
                                    <?php else: ?>
                                        <img src="assets/defaultAvatar.png" alt="Sem imagem de perfil" class="profile-img2">
                                    <?php endif; ?>
                                    <div class="card-text-container">
                                        <h2 class="card-title"><?php echo htmlspecialchars($paciente['nome']); ?></h2>
                                        <p class="card-text"><strong>CPF:</strong> <?php echo htmlspecialchars($paciente['cpf']); ?></p>
                                        <p class="card-text"><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($paciente['data_nascimento']); ?></p>
                                        <p class="card-text sexo"><strong>Sexo:</strong> <?php echo htmlspecialchars($paciente['sexo']); ?></p>
                                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($paciente['email']); ?></p>
                                        <p class="card-text estado"><strong>Estado:</strong> <?php echo htmlspecialchars($paciente['estado']); ?></p>
                                        <p class="card-text"><strong>ID:</strong> <?php echo htmlspecialchars($paciente['id']); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum paciente encontrado.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="profissionais.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
