<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require 'protect.php';
    require 'getProfileImage.php';

    // Conectar ao banco de dados
    include './config.php';

    // Verifica se o parâmetro 'id' foi passado na URL
    if (isset($_GET['id'])) {
        $professional_id = $_GET['id'];
        
        // Busca os dados do profissional no banco de dados
        $query = "SELECT * FROM profissionais WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$professional_id]);
        
        // Obtenha o resultado
        $professional = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the associative array
        
        if ($professional) { // Verifica se o profissional foi encontrado
            $profileImage = getProfileImage($professional['profile_image']);
        } else {
            echo "Profissional não encontrado.";
            exit;
        }
    } else {
        echo "ID de profissional não fornecido.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo htmlspecialchars($professional['nome']); ?></title>
    
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
                <?php if (isset($professional['profile_image'])): ?>
                    <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($professional['profile_image']); ?>" alt="Foto de Perfil" id="perfil-img" style="max-width: 200px;">
                <?php else: ?>
                    <img id="perfil-img" src="assets/defaultAvatar.png" alt="Imagem de Perfil" style="max-width: 200px;">
                <?php endif; ?>
            </div>
                <div class="header-details">
                    
                    <section class="about-content">
                        <h1><?php echo htmlspecialchars($professional['nome']); ?></h1>
                        <h3><?php echo htmlspecialchars($professional['profissao']); ?></h3>
                        <p><?php echo htmlspecialchars($professional['descricao']); ?></p>
                        <div>
                            <form action="startChat.php" method="POST">
                                <input type="hidden" name="professional_id" value="<?php echo $professional['id']; ?>"> 
                                <input type="hidden" name="patient_id" value="2"> <!-- ID do paciente logado -->
                                <button class="btn_edit" type="submit">Iniciar Chat</button>
                            </form>
                        </div>
                    </section>

                    <aside class="info">
                        <div class="item">
                            <h3>Estado</h3>
                            <p><?php echo htmlspecialchars($professional['estado']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Cidade</h3>
                            <p><?php echo htmlspecialchars($professional['cidade']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Bairro</h3>
                            <p><?php echo htmlspecialchars($professional['bairro']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Escolaridade</h3>
                            <p><?php echo htmlspecialchars($professional['escolaridade']); ?></p>
                        </div>
                        <div class="item">
                            <h3>Gênero</h3>
                            <p><?php echo htmlspecialchars($professional['sexo']); ?></p>
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
                            <div class="bar" style="width: <?php echo htmlspecialchars($professional['comunicacao_exp']); ?>0%;"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Cuidados de Enfermagem</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($professional['enfermagem_exp']); ?>0%;"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Uso de Equipamentos Médicos</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($professional['equipamentos_exp']); ?>0%;"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Educação ao Paciente</h3>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo htmlspecialchars($professional['educacao_exp']); ?>0%;"></div>
                        </div>
                    </div>
                </div>

                <div class="resume">
                    <h2>Resumo Profissional</h2>
                    <p><?php echo htmlspecialchars($professional['resumo']); ?></p>             </div>
            </section> 
            
        </div>
    </main>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
</body>

</html>
