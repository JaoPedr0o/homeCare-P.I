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
    <title>Vital+ | Profissionais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="loginIMG/logo-transparente.png" type="image/x-icon">
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
                    <h2 class="header-title"><i class="fa-solid fa-magnifying-glass"></i> Buscar Profissionais</h2>
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
                            <?php 
                                // Verifica se algum campo necessário está vazio
                                $fieldsIncomplete = empty($profissional['nome']) || empty($profissional['sexo']) || empty($profissional['email']) || empty($profissional['estado']) || empty($profissional['coren']);
                            ?>
                            <a href="<?php echo 'perfilProDinamico.php?id=' . htmlspecialchars($profissional['id']); ?>" class="card" <?php echo $fieldsIncomplete ? 'data-incomplete="true"' : ''; ?>>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <?php if (!empty($profissional['profile_image'])): ?>
                                        <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($profissional['profile_image']); ?>" alt="Foto de Perfil" class="profile-img">
                                    <?php else: ?>
                                        <img src="assets/defaultAvatar.png" alt="Sem imagem de perfil" class="profile-img2">
                                    <?php endif; ?>
                                    <div class="card-text-container">
                                        <h2 class="card-title"><?php echo htmlspecialchars($profissional['nome']); ?></h2>
                                        <p class="card-text sexo"><strong>Sexo:</strong> <?php echo htmlspecialchars($profissional['sexo']); ?></p>
                                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($profissional['email']); ?></p>
                                        <p class="card-text estado"><strong>Estado:</strong> <?php echo htmlspecialchars($profissional['estado']); ?></p>
                                        <p class="card-text"><strong>COREN:</strong> <?php echo htmlspecialchars($profissional['coren']); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum profissional encontrado.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 
    <div class="modal fade" id="accessDeniedModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 0rem !important; border-top: 2rem solid #3D7C89"> 
                <div class="modal-header">
                    <h3 class="modal-title" id="modalLabel" style="font-weigth: bold; color: #3D7C89">Acesso Negado</h3>
                </div>
                <div class="modal-body">
                    <h4>Um ou mais campos obrigatórios estão vazios. Complete todos os dados para acessar a página de profissionais.</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="blue-button" id="closeModalBtn">Completar Perfil</button>
                </div>
            </div>
        </div>
    </div>-->

    <script>
        window.onload = function() {
            const profissionais = <?php echo json_encode($profissionais); ?>;
            let incompleteProfiles = false;

            // Verifica se algum profissional tem campos vazios
            profissionais.forEach(profissional => {
                if (!profissional.nome || !profissional.sexo || !profissional.email || !profissional.estado || !profissional.coren) {
                    incompleteProfiles = true;
                }
            });

            // Se algum perfil estiver incompleto, exibe a modal
            if (incompleteProfiles) {
                const modal = new bootstrap.Modal(document.getElementById('accessDeniedModal'));
                modal.show();
            }

            // Redireciona para perfil.php quando a modal for fechada
            document.getElementById('closeModalBtn').addEventListener('click', function() {
                window.location.href = 'editarPerfilProfissional.php';
            });

            // Adiciona o mesmo redirecionamento ao fechar a modal pelo backdrop
            document.getElementById('accessDeniedModal').addEventListener('hidden.bs.modal', function () {
                window.location.href = 'editarPerfilProfissional.php';
            });
        };
    </script>

    <script src="profissionais.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
