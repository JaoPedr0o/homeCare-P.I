<?php
session_start();
require 'config.php';

$user_type = $_SESSION['tipo_usuario'];
?>

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
    <link rel="shortcut icon" href="loginIMG/logo-transparente.png" type="image/x-icon">
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
                <?php if ($user_type === 'profissionais'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfilProfissional.php">
                            <i class="fa-solid fa-user"></i>
                            <span class="sidebar-text">PERFIL</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaPacientes.php">
                            <i class="fa-solid fa-user-injured"></i>
                            <span class="sidebar-text">PACIENTES</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">
                            <i class="fa-solid fa-message"></i>
                            <span class="sidebar-text">CHAT</span>
                        </a>
                    </li>
                <?php elseif ($user_type === 'pacientes'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfilPaciente.php">
                            <i class="fa-solid fa-user"></i>
                            <span class="sidebar-text">PERFIL</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaProfissionais.php">
                            <i class="fa-solid fa-user-nurse"></i>
                            <span class="sidebar-text">PROFISSIONAIS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">
                            <i class="fa-solid fa-message"></i>
                            <span class="sidebar-text">CHAT</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item" data-bs-toggle="modal" data-bs-target="#settingsModal">
                    <a class="nav-link">
                        <i class="fa-solid fa-gear settings"></i>
                        <span class="sidebar-text">CONFIGURAÇÕES</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Modal de Configurações -->
    <div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel"><i class="fa-solid fa-gear settings"></i> CONFIGURAÇÕES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item modal-text-red" onclick="deleteAccount()">Excluir Conta</li>
                        <li class="list-group-item modal-text-blue" onclick="support()">Suporte</li>
                        <li class="list-group-item modal-text-blue" onclick="toggleTheme()">Modificar Tema</li>
                        <li class="list-group-item modal-text-blue" onclick="logout()">Sair</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="sidebar.js"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
