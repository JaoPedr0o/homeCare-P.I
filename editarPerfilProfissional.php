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
    <title>Vital+ | Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="loginIMG/logo-transparente.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.global.css">
    <link rel="stylesheet" type="text/css" href="editarPerfilProfissional.css">
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
                <i class="fa-solid fa-user-pen"></i>
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

            <form action="guardarinfoProfissional.php" id="data-form" method="POST">
                <div class="form-description">
                    <!-- Descrição Pessoal -->
                    <div class="user-description">
                        <label for="descricao" class="label">Descrição Pessoal</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="5"></textarea>
                    </div>

                    <!-- Resumo Profissional -->
                    <div class="user-description">
                        <label for="resumo" class="label">Resumo Profissional</label>
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
                    <!-- Área de Atuação -->
                    <div class="select">
                        <label for="profissao" class="label">Área de Atuação</label>
                        <select class="form-select" id="profissao" name="profissao">
                            <option value="nda">Selecione sua Área:</option>
                            <option value="Enfermeiro">Enfermeiro(a)</option>
                            <option value="Cuidador">Cuidador(a)</option>
                        </select>
                    </div>

                    <!-- Escolaridade -->
                    <div class="select">
                        <label for="escolaridade" class="label">Escolaridade</label>
                        <select class="form-select" id="escolaridade" name="escolaridade" required>
                            <option value="nda">Selecione sua Escolaridade:</option>
                            <option value="Ensino Fundamental">Ensino Fundamental</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Ensino Superior">Ensino Superior</option>
                            <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                            <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                            <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                        </select>
                    </div>
                </div>

                <!-- Habilidades Gerais -->
                <div class="row row-form2 div-radio">
                    <div class="col">
                        <label class="label" for="comunicacao">Habilidade de Comunicação</label>
                        <div class="range-slider">
                            <input type="range" min="0" max="10" value="0" class="slider" id="comunicacao_exp" name="comunicacao_exp">
                        </div>
                    </div>
                    <div class="col">
                        <label class="label" for="comunicacao">Cuidados de Enfermagem</label>
                        <div class="range-slider">
                            <input type="range" min="0" max="10" value="0" class="slider" id="enfermagem_exp" name="enfermagem_exp">
                        </div>
                    </div>
                </div>

                <div class="row row-form2 div-radio">
                    <div class="col">
                        <label class="label" for="equipamentos">Uso de Equipamentos Médicos</label>
                        <div class="range-slider">
                            <input type="range" min="0" max="10" value="0" class="slider" id="equipamentos_exp" name="equipamentos_exp">
                        </div>
                    </div>
                    <div class="col">
                        <label class="label" for="educacao">Educação ao Paciente</label>
                        <div class="range-slider">
                            <input type="range" min="0" max="10" value="0" class="slider" id="educacao_exp" name="educacao_exp">
                        </div>
                    </div>
                </div>
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