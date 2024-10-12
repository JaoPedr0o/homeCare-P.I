<?php
require 'protect.php';
require 'getProfileImage.php';
$profileImage = getProfileImage();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.global.css">
    <link rel="stylesheet" type="text/css" href="editarPerfilProfissional.css">
    <style>
        .input-data[type="date"] {
            width: 100%; /* Preencher a largura da div */
            padding: 15px; /* Espaçamento interno */
            font-size: 16px; /* Tamanho da fonte */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Incluir padding e border no total */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            require 'sidebar.php';
            ?>
        </div>
    </div>
    <div class="main-content">

        <div class="container">
            <!-- Título da Página -->
            <h1 class="page-title">
                <i class="fa-solid fa-pen"></i>
                Meus Dados
            </h1>
            <div class="editPerfilImg">
                <form id="img-form" action="uploadImage.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="upload-img" id="uploadImg-label">
                            <img id="perfil-img" src="<?php echo htmlspecialchars($profileImage ?? 'assets/defaultAvatar.png'); ?>" alt="Imagem de Perfil" style="max-width: 200px;">
                        </label>
                        <input id="upload-img" type="file" name="profileImage" accept="image/*" required>
                        <!-- Campo oculto ou sessão para indicar o tipo de usuário -->
                        <input type="hidden" name="userType" value="profissional"> <!-- ou 'paciente' -->
                    </div>
                    <div>
                        <h2 id="submitImgTitle"><strong>ATUALIZAR IMAGEM</strong></h2>
                        <button class="blueButton" id="submit-btn" style="display: none;" type="submit" name="submit">ATUALIZAR</button>
                    </div>
                </form>
            </div>

            <form action="guardarinfo.php" id="data-form" method="POST">
                <div class="form-description">
                    <!-- Descrição Pessoal -->
                    <div class="user-description">
                        <label for="descricao" class="label">Descrição Pessoal</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="5"></textarea>
                    </div>

                    <!-- Resumo Profissional -->
                    <div class="user-description">
                        <label for="resumo" class="label">Resumo Necessidades Pessoais</label>
                        <textarea class="form-control" id="resumo" name="resumo" rows="5"></textarea>
                    </div>
                </div>

                <div class="pro-data">
                    <!-- Estado -->
                    <div class="select">
                        <label for="estado" class="label">Estado</label>
                        <select class="form-select" id="estados-select" name="estado" onchange="buscarCidades(this.value)">
                            <option value="nda">Selecione o Estado:</option>
                        </select>
                    </div>

                    <!-- Cidade -->
                    <div class="select">
                        <label for="cidade" class="label">Cidade</label>
                        <select class="form-select" id="cidades-select" name="cidade">
                            <option value="nda">Selecione a Cidade:</option>
                        </select>
                    </div>

                    <!-- Bairro -->
                    <div class="select">
                        <label for="bairro" class="label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro">
                    </div>
                </div>

                <div class="pro-data">
                    <!-- Profissional desejado -->
                    <div class="select">
                        <label for="profissao" class="label">Tipo de profissional desejado</label>
                        <select class="form-select" id="profissao" name="profissao">
                            <option value="nda">Selecione o tipo de profissional:</option>
                            <option value="enfermeiro">Enfermeiro(a)</option>
                            <option value="cuidador">Cuidador(a)</option>
                        </select>
                    </div>

                    <!-- Familia -->
                    <div class="select">
                        <label for="escolaridade" class="label">Com quantas pessoas mora?</label>
                        <select class="form-select" id="familia" name="familia" required>
                            <option value="nda">Selecione com quantas pessoas mora:</option>
                            <option value="Ensino Fundamental">Moro sozinho</option>
                            <option value="Ensino Médio">1 pessoa</option>
                            <option value="Ensino Superior">2 pessoas</option>
                            <option value="Ensino Fundamental Incompleto">3 pessoas</option>
                            <option value="Ensino Médio Incompleto">4 ou mais pessoas</option>
                        </select>
                    </div>
                </div>

                <!-- Habilidades Gerais -->
                <div class="row row-form2 div-radio">
                    <!-- horário desejado -->
                    <div class="select">
                        <label for="horario" class="label">Horário desejado</label>
                        <select class="form-select" id="horario" name="horario">
                            <option value="nda">Selecione o horário:</option>
                            <option value="manha">Manhã</option>
                            <option value="tarde">Tarde</option>
                            <option value="noite">Noite</option>
                            <option value="integral">Integral</option>
                        </select>
                    </div>
                    <div class="select">
                        <label for="data" class="label">Selecione sua data de nascimento:</label>
                        <input class="input-data" type="date" id="data" name="data">
                    </div>
                </div>
                <div></div>
                <!-- Botão Salvar -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="blueButton">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="perfil.js"></script>
</body>

</html>