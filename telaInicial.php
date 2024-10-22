<?php 
    require 'protect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital+ | Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Asap Condensed', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background: linear-gradient(45deg, #3D7C89, #2C3E50, #e0e0e0);
            background-size: 300% 300%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        #bemvindos {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            color: white; /* Altera a cor do texto para branco para melhor contraste */
        }

        .info-section {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 40px;
            height: auto;
        }

        .info-text {
            flex: 1;
            padding-right: 20px;
        }

        .info-text h2 {
            font-weight: 1000;
            margin-bottom: 20px;
            font-size: 10vh;
        }

        .info-text p {
            font-weight: 400;
            color: #fff;
            font-size: 2vh;
        }

        .info-image {
            flex: 1;
        }

        .info-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
        }

        .mission-section {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 40px;
        }

        .section {
            background: linear-gradient(45deg, #3D7C89, #2C3E50, #e0e0e0); /* Fundo gradiente */
            background-size: 300% 300%;
            animation: gradient 15s ease infinite; /* Animação gradiente */
            padding: 40px;
            text-align: center;
            min-height: 400px; /* Aumenta o espaço da seção de funcionalidades */
            color: white; /* Cor do texto na seção de funcionalidades */
            
        }

        .section h2 {
            margin-bottom: 20px;
            font-weight: 1000;
            margin-bottom: 20px;
            font-size: 10vh;
        }

        .functionality {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            margin: 20px 0;
            padding: 20px; /* Aumenta o espaço entre funcionalidades */
            border-radius: 10px;
        }

        .functionality i {
            font-size: 3vh;
            margin-right: 15px;
            color: #fff;
        }

        .functionality div {
            flex: 1;
            text-align: left;
        }

        .functionality h5 {
            font-size: 3vh;
            margin-bottom: 10px;
            font-weight: 1000;
        }

        .functionality p {
            font-size: 2vh;
            margin: 0 0 10px 0; /* Margem inferior para espaçamento entre descrição e botão */
        }

        .functionality a {
            margin-top: 10px; /* Espaço entre descrição e botão */
            display: inline-block;
            font-size: 2vh;
        }

        .btn {
            background-color: var(--primary-blue);
            border: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" id="bemvindos">
            <h1 style="font-size: 20vh !important; font-weight: 1000;">BEM VINDOS A </h1>
            <h1 style="font-size: 20vh !important; font-weight: 1000; color:#3D7C89"> VITAL+</h1>
        </div>

        <div class="row info-section">
            <div class="info-text">
                <h2>O que é a VITAL+</h2>
                <p>VITAL+ é uma plataforma inovadora projetada para conectar pacientes a profissionais da saúde de forma simples e eficiente. Aqui, você pode agendar consultas, acessar informações relevantes sobre os profissionais e muito mais, tudo em um só lugar.</p>
                <h2 style="padding-top: 30vh;">Qual a nossa missão?</h2>
                <p>Nossa missão é facilitar o acesso à saúde e melhorar a experiência do usuário no atendimento médico.</p>
            </div>
            <div class="info-image">
                <img src="loginIMG/Desenho show.png" alt="Equipe de Saúde">
            </div>
        </div>

        <div class="section">
    <h2>Funcionalidades</h2>
    <div class="row">
        <div class="col text-center">
            <div class="functionality">
                <i class="fas fa-user-edit" style="color: var(--primary-blue);"></i>
                <div>
                    <h5>Editar Perfil</h5>
                    <p>Atualize suas informações e mantenha seu perfil sempre completo.</p>
                    <a href="editarPerfilProfissional.php" class="btn btn-primary">Ir para o perfil</a>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="functionality">
                <i class="fas fa-users" style="color: var(--primary-blue);"></i>
                <div>
                    <h5>Tela de Pacientes</h5>
                    <p>Visualize seus pacientes.</p>
                    <a href="pacientes.php" class="btn btn-primary">Acessar Pacientes</a>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="functionality">
                <i class="fas fa-user-circle" style="color: var(--primary-blue);"></i>
                <div>
                    <h5>Acessar Perfil</h5>
                    <p>Veja e edite seu perfil de forma rápida e fácil.</p>
                    <a href="perfilProfissional.php" class="btn btn-primary">Ver Meu Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
