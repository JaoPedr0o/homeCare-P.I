<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="perfil.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php 
                require 'sidebar.php'
            ?>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="header">
                <div class="header-imgs">
                    <!-- Imagem de perfil -->
                    <img id="banner-img"src="./assets/user-banner.png" alt="Foto de fundo">
                    <img id="perfil-img" src="./assets/image.png" alt="Foto de Rasputia Nogueira">
                </div>

                <div class="header-details">
                    <!-- Conteúdo da about -->
                    <div class="about-content">
                        <h1>Rasputia Nogueira</h1>
                        <p>Cuidadora</p>
                        
                        <p>Rasputia Nogueira, nascida em 1988 em Belo Horizonte, é enfermeira formada pela Universidade Federal de Minas Gerais. Desde 2010, tem se dedicado ao atendimento de pacientes em diversas áreas de saúde, destacando-se por sua empatia e profissionalismo. Em 2015, recebeu o prêmio de "Enfermeira do Ano" pelo Hospital das Clínicas de Belo Horizonte. Além de seu trabalho clínico, Rasputia participa ativamente em projetos comunitários de educação em saúde.</p>
                        
                        <div class="actions">
                            <button class="btn">Enviar mensagem</button>
                            <button class="btn">+ Seguir</button>
                        </div>
                    </div>

                    <!-- Seção de informações ao lado direito -->
                    <div class="info">
                        <div class="item">
                            <h3>Estado</h3>
                            <p>Minas Gerais, MG</p>
                        </div>
                        <div class="item">
                            <h3>Cidade</h3>
                            <p>Patos de Minas</p>
                        </div>
                        <div class="item">
                            <h3>Bairro</h3>
                            <p>Jardim Esperança</p>
                        </div>
                        <div class="item">
                            <h3>Escolaridade</h3>
                            <p>Superior em enfermagem</p>
                        </div>
                        <div class="item">
                            <h3>Gênero</h3>
                            <p>Feminino</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Skills e Resumo Profissional lado a lado -->
            <div class="skills-and-resume">
                <div class="skills">
                    <h2>Habilidades</h2>
                    <div class="skill">
                        <h3>Boa Comunicação</h3>
                        <div class="progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Cuidados de Enfermagem</h3>
                        <div class="progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Uso de Equipamentos Médicos</h3>
                        <div class="progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                    <div class="skill">
                        <h3>Educação ao Paciente</h3>
                        <div class="progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
                
                <div class="resume">
                    <h2>Resumo Profissional</h2>
                    <p>Estágio de dois anos no Hospital Nossa Senhora de Fátima, onde desenvolvi habilidades em administração de medicamentos, monitoramento de sinais específicos e assistência em procedimentos médicos. Experiência em diferentes áreas como emergência e UTI, além de competências em comunicação com pacientes.</p>
                </div>
            </div>
        </div>
    </main>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>