<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="sidebar-content">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="telaInicial.html">
                                <i class="fa-solid fa-house"></i>
                                <span class="sidebar-text">Início</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.html">
                                <i class="fa-solid fa-user"></i>
                                <span class="sidebar-text">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profissionais.html">
                                <i class="fa-solid fa-notes-medical"></i>
                                <span class="sidebar-text">Profissionais</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="materiais.html">
                                <i class="fa-solid fa-shop"></i>
                                <span class="sidebar-text">Materiais</span>
                            </a>
                        </li>
                        <li class="nav-item" style="position: fixed; bottom: 0;">
                            <a  class="nav-link" href="login.php">
                                <i class="fa-solid fa-door-closed"></i>
                                <span class="sidebar-text">Sair</span>
                            </a>   
                        </li> 
                    </ul>
                    
                </div>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Conteúdo principal -->
                <h1>Conteúdo Principal</h1>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
