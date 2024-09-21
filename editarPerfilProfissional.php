<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.global.css">
    <link rel="stylesheet" type="text/css" href="editarPerfilProfissional.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require 'sidebar.php'; ?>
        </div>
    </div>
    <div class="main-content">
        

        <div class="container">
            <!-- Título da Página -->
            <h1 class="page-title">
                <i class="fa-solid fa-pen"></i>
                Meus Dados
            </h1>
            <form action="info.php" id="data-form" method="POST">
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
                        <select class="form-select" id="estado" name="estado" onchange="buscarCidades(this.value)">
                            <option value="nda">Selecione o Estado:</option>
                        </select>
                    </div>

                    <!-- Cidade -->
                    <div class="select">
                        <label for="cidade" class="label">Cidade</label>
                        <select class="form-select" id="cidade" name="cidade">
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
                            <option value="enfermeiro">Enfermeiro(a)</option>
                            <option value="cuidador">Cuidador(a)</option>
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
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="comunicacao_exp" id="valor_alto" value="alto" required />ALTO
                            <input class="form-radio" type="radio" name="comunicacao_exp" id="valor_medio" value="medio" required />MÉDIO
                            <input class="form-radio" type="radio" name="comunicacao_exp" id="valor_baixo" value="baixo" required />BAIXO
                        </fieldset>
                    </div>
                    <div class="col">
                        <label class="label" for="comunicacao">Cuidados de Enfermagem</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="enfermagem_exp" id="valor_alto" value="alto" required />ALTO
                            <input class="form-radio" type="radio" name="enfermagem_exp" id="valor_medio" value="medio" required />MÉDIO
                            <input class="form-radio" type="radio" name="enfermagem_exp" id="valor_baixo" value="baixo" required />BAIXO
                        </fieldset>
                    </div>
                </div>

                <div class="row row-form2 div-radio">
                    <div class="col">
                        <label class="label" for="equipamentos">Uso de Equipamentos Médicos</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="equipamentos_exp" id="valor_alto" value="alto" required />ALTO
                            <input class="form-radio" type="radio" name="equipamentos_exp" id="valor_medio" value="medio" required />MÉDIO
                            <input class="form-radio" type="radio" name="equipamentos_exp" id="valor_baixo" value="baixo" required />BAIXO
                        </fieldset>
                    </div>
                    <div class="col">
                        <label class="label" for="educacao">Educação ao Paciente</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="educacao_exp" id="valor_alto" value="alto" required />ALTO
                            <input class="form-radio" type="radio" name="educacao_exp" id="valor_medio" value="medio" required />MÉDIO
                            <input class="form-radio" type="radio" name="educacao_exp" id="valor_baixo" value="baixo" required />BAIXO
                        </fieldset>
                    </div>
                </div>
            </form>

            <!-- Botão Salvar -->
            <div class="d-flex justify-content-center">
                <button type="submit" form="data-form" class="blueButton">Salvar</button>
            </div>

        </div>
    </div>
    <script src="perfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
