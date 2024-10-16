<?php 
    require 'protect.php';
    require 'getProfileImage.php';
    $profileImage = getProfileImage();

// Função para pegar os dados do perfil
function getProfileData() {
    global $pdo;

    // Inicia a sessão se ainda não foi iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Verifica se o ID do usuário e o tipo de usuário estão definidos na sessão
    if (!isset($_SESSION['id']) || !isset($_SESSION['tipo_usuario'])) {
        return null; // Retorna null se não estiver autenticado
    }

    $userId = $_SESSION['id'];           // ID do usuário logado
    $userType = $_SESSION['tipo_usuario']; // Tipo do usuário (paciente ou profissional)

    // Verifica se o usuário logado é um profissional
    if ($userType !== 'profissionais') {
        // Exibe erro ou redireciona se o usuário não for um profissional
        echo "Erro: Apenas profissionais podem acessar esta página.";
        exit; // Para a execução do script
    }

    // Consulta para obter todos os dados do profissional
    $sql = "SELECT * FROM profissionais WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna todos os dados do profissional
}

// Obtém os dados do perfil do profissional
$userData = getProfileData();

// Verifica se os dados do profissional foram encontrados
if (!$userData) {
    echo "Profissional não encontrado.";
    exit;
}

// Obtém a imagem de perfil no formato Base64
$profileImage = isset($userData['profile_image']) ? 'data:image/jpeg;base64,' . $userData['profile_image'] : null;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital+ | Perfil</title>
    
    <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" 
          rel="stylesheet">
    
    <link rel="stylesheet" href="perfilProfissional.css">
    <link rel="stylesheet" href="style.global.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require 'sidebar.php'; ?>
        </div>
    </div>

    <main>
        <div class="container">
            <header class="header">
                <div class="header-imgs">
                    <img id="banner-img" src="./assets/user-banner.png" alt="Foto de fundo">
                    <?php if ($profileImage): ?>
                        <img id="perfil-img" src="<?php echo htmlspecialchars($profileImage); ?>" alt="Imagem de Perfil" style="max-width: 200px;">
                    <?php else: ?>
                        <img id="perfil-img" src="assets/defaultAvatar.png" alt="Imagem de Perfil" style="max-width: 200px;">
                    <?php endif; ?>
                </div>

                <div class="header-details">
                    
                    <section class="about-content">
                        <h1><?php echo htmlspecialchars($userData['nome']); ?></h1>
                        <h3><?php echo htmlspecialchars($userData['profissao']); ?></h3>
                        <p><?php echo htmlspecialchars($userData['descricao']); ?></p>
                        <div>
                            <a href="editarPerfilProfissional.php" style="text-decoration: none;"><button class="btn_edit">Editar Meus Dados</button></a>
                        </div>
                    </section>

                    <aside class="info">
                        <div class="item">
                            <h3>Estado</h3>
                            <p><?php echo htmlspecialchars($userData['estado']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Cidade</h3>
                            <p><?php echo htmlspecialchars($userData['cidade']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Bairro</h3>
                            <p><?php echo htmlspecialchars($userData['bairro']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Escolaridade</h3>
                            <p><?php echo htmlspecialchars($userData['escolaridade']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Gênero</h3>
                            <p><?php echo htmlspecialchars($userData['sexo']); ?></p>
                        </div>
                    </aside>
                </div>
            </header>

            <section class="skills-and-resume">
                <div class="skills">
                    <h2>Habilidades</h2>
                    <div class="skill">
                        <h3>Boa Comunicação</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($userData['comunicacao_exp']); ?>0%;"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Cuidados de Enfermagem</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($userData['enfermagem_exp']); ?>0%;"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Uso de Equipamentos Médicos</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($userData['equipamentos_exp']); ?>0%;"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Educação ao Paciente</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($userData['educacao_exp']); ?>0%;"></div>
                        </div>
                    </div>
                </div>

                <div class="resume">
                    <h2>Resumo Profissional</h2>
                    <p><?php echo htmlspecialchars($userData['resumo']); ?></p>                
                </div>
            </section> 
            
        </div>
    </main>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
</body>

</html>
