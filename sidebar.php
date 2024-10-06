<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sideBar.css">
    <link rel="stylesheet" href="style.global.css">
</head>

<body>
    <div class="col-md-3 col-lg-2 sidebar">
        <div class="sidebar-content">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <img class="logo" src="./loginIMG/logo-transparente.png" alt="">
                    <span class="sidebar-text-logo">VITAL+</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="telaInicial.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="sidebar-text">INÍCIO</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-user"></i>
                        <span class="sidebar-text">PERFIL</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">
                        <i class="fa-solid fa-message"></i>
                        <span class="sidebar-text">CHAT</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profissionais.php">
                        <i class="fa-solid fa-notes-medical"></i>
                        <span class="sidebar-text">PROFISSIONAIS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="materiais.php">
                        <i class="fa-solid fa-shop"></i>
                        <span class="sidebar-text">MATERIAIS</span>
                    </a>
                </li>
                <li class="nav-item" onclick="handleModalLeave()">
                    <a class="nav-link">
                        <i class="fa-solid fa-power-off settings"></i>
                        <span class="sidebar-text">SAIR</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="leave-modal">
        <div id="modal-content">
            <h1>Sair da Conta</h1>
            <p>Você tem certeza de que deseja sair? Ao sair, você não estará mais conectado à sua conta. Se você tiver alterações não salvas, elas serão perdidas.</p>
            <section>
                <div id="wrapper-button">
                    <button onclick="handleModalLeave()" id="cancel-button" class="blue-button">Cancelar</button>
                    <button onclick="handleLogout()" class="red-button" id="confirm-button">Sair</button>
                </div>
            </section>
        </div>
    </div>

    <script src="sidebar.js"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
