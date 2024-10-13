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
    <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="profissionais2.css">
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
                    <h2 class="header-title"><i class="fa-solid fa-notes-medical"></i>Buscar Profissionais</h2>
                    <div class="search-container">
                        <select id="searchFilter">
                            <option value="nome">Nome</option>
                            <option value="estado">Estado</option>
                            <option value="sexo">Sexo</option>
                        </select>
                        <input type="text" id="searchInput" placeholder="Pesquisar profissionais..." onkeyup="filterProfessionals()">
                    </div>
                </div>

                <!-- Container dos cards -->
                <div class="employee-container">
                    <?php if ($profissionais): ?>
                        <?php foreach ($profissionais as $profissional): ?>
                            <div class="card" onclick="openModal(<?php echo htmlspecialchars(json_encode($profissional)); ?>)">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <?php if (!empty($profissional['profile_image'])): ?>
                                        <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($profissional['profile_image']); ?>" alt="Foto de Perfil" class="profile-img">
                                    <?php else: ?>
                                        <img src="assets/defaultAvatar.png" alt="Sem imagem de perfil" class="profile-img2">
                                    <?php endif; ?>
                                    <div class="card-text-container">
                                        <h2 class="card-title"><?php echo htmlspecialchars($profissional['nome']); ?></h2>
                                        <p class="card-text"><strong>CPF:</strong> <?php echo htmlspecialchars($profissional['cpf']); ?></p>
                                        <p class="card-text"><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($profissional['data_nascimento']); ?></p>
                                        <p class="card-text sexo"><strong>Sexo:</strong> <?php echo htmlspecialchars($profissional['sexo']); ?></p>
                                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($profissional['email']); ?></p>
                                        <p class="card-text estado"><strong>Estado:</strong> <?php echo htmlspecialchars($profissional['estado']); ?></p>
                                        <p class="card-text"><strong>COREN:</strong> <?php echo htmlspecialchars($profissional['coren']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum profissional encontrado.</p>
                    <?php endif; ?>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileModalLabel">Detalhes do Profissional</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 id="modalNome"></h2>
                                <p><strong>CPF:</strong> <span id="modalCPF"></span></p>
                                <p><strong>Data de Nascimento:</strong> <span id="modalDataNascimento"></span></p>
                                <p><strong>Sexo:</strong> <span id="modalSexo"></span></p>
                                <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                                <p><strong>Estado:</strong> <span id="modalEstado"></span></p>
                                <p><strong>COREN:</strong> <span id="modalCoren"></span></p>
                                <p><strong>Resumo:</strong> <span id="modalResumo"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="btnFecharModal" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function openModal(profissional) {
            // Preencher a modal com os dados do profissional
            document.getElementById('modalNome').textContent = profissional.nome;
            document.getElementById('modalCPF').textContent = profissional.cpf;
            document.getElementById('modalDataNascimento').textContent = profissional.data_nascimento;
            document.getElementById('modalSexo').textContent = profissional.sexo;
            document.getElementById('modalEmail').textContent = profissional.email;
            document.getElementById('modalEstado').textContent = profissional.estado;
            document.getElementById('modalCoren').textContent = profissional.coren;
            document.getElementById('modalResumo').textContent = profissional.resumo_profissional;

            // Abrir a modal
            var profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
            profileModal.show();
        }
    </script>

    <script src="profissionais.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
