<?php 
    require 'protect.php'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" 
          rel="stylesheet">
    
    <link rel="stylesheet" href="perfilPaciente2.css">
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
                    <!--<img id="banner-img" src="./assets/user-banner.png" alt="Foto de fundo">-->
                    <img id="perfil-img" src="./assets/pacienteImg.png" alt="Foto de Rasputia Nogueira">
                </div>

                <div class="header-details">
                    
                    <section class="about-content">
                        <h1>Antônio da Silva</h1>
                        <h3>Paciente</h3>
                        <p>Seu Antônio, 80 anos, é um ex-carpinteiro aposentado que adora jardinagem e contar histórias. Apaixonado por música e novelas, ele aprecia momentos com os netos. Com a idade, precisa de cuidados diários, como ajuda para se vestir e lembrar de tomar medicamentos. Seu maior sonho é continuar compartilhando suas memórias e aprender a usar um tablet para se conectar ainda mais com a família.</p>
                        <div class="d-flex justify-content-center">
                            <a href="editarPerfilProfissional.php" style="text-decoration: none;"><button class="d-flex btn_edit">Editar Meus Dados</button></a>
                        </div>
                    </section>

                    <aside class="info">
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
                    </aside>
                </div>
                <section class="skills-and-resume">
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
            </section> 
            </header>   
        </div>
    </main>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
</body>

</html>
