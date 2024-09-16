<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.global.css">
    <link rel="stylesheet" href="edicaoPerfil.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            require 'sidebar.php';
            ?>
        </div>
        <div class="logo-perfil">
            <img class="logo-img" src="./loginIMG/logo.png" alt="">
        </div>
        <div class="d-flex justify-content-center">
            <h1>
                Informações Adicionais
                <hr>
            </h1>
        </div>
        <form class="" action="info.php" method="$_POST">
            <div class="grid container text-center">
                <div class="row row-form">
                    <div class="col">
                        <label for="textarea">
                            <p>Descrição Pessoal</p>
                            <textarea cols="70" rows="10" name="descricao" id="textarea"></textarea>
                        </label>
                    </div>
                    <div class="col">
                        <label for="textarea">
                            <p>Resumo Profissional</p>
                            <textarea cols="70" rows="10" name="resumo" id="textarea"></textarea>
                        </label>
                    </div>
                </div>
                <div class="row row-form2">
                    <div class="col">
                        <label for="profissao">
                            <p>Área de Atuação</p>
                        </label>
                        <select class="form-select label-input p-2 w-0" id="pror-select" aria-label="Default select  example" name="profissao">
                            <option value="nda">Selecione sua Área:</option>
                            <option value="enfermeiro">Enfermeiro(a)</option>
                            <option value="cuidador">Cuidador(a)</option>
                        </select>

                    </div>
                    <div class="col">
                        <label for="estado">
                            <p>Estado</p>
                        </label>
                        <select class="form-select label-input p-2 w-0" id="estados-select" aria-label="Default select  example" name="estado" onchange="buscarCidades(this.value)">
                            <option value="nda">Selecione o Estado:</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="cidade">
                            <p>Cidade</p>
                        </label>
                        <select class="form-select label-input p-2 w-0" id="cidades-select" aria-label="Default select  example" name="cidade">
                            <option value="nda">Selecione a Cidade:</option>
                        </select>

                    </div>
                </div>
                <div class="row row-form2">
                    <div class="col">
                        <label for="bairro">
                            <p>Bairro</p>
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="bairro">
                        </div>

                    </div>
                    <div class="col">
                        <label for="escolaridade">
                            <p>Escolaridade</p>
                        </label>
                        <select class="form-select label-input p-2 w-0" id="escolaridade-select" aria-label="Default select  example" name="escolaridade" required>
                            <option value="nda">Selecione sua Escolaridade:</option>
                            <option value="Ensino Fundamental">Ensino Fundamental</option>
                            <option value="Ensino Medio">Ensino Medio</option>
                            <option value="Ensino Superior">Ensino Superior</option>
                            <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                            <option value="Ensino Medio Incompleto">Ensino Medio Incompleto</option>
                            <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                        </select>
                    </div>
                </div>
                <div class="row row-form2 div-radio">
                <p class="title">Habilidades Gerais</p>
                    <div class="col">
                        <label class="label" for="comunicacao">Habilidade de Comunicação</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="comunicacao_exp" id="valor_alto" value="alto" required />Alto(a)
                            <input class="form-radio" type="radio" name="comunicacao_exp" id="valor_medio" value="medio" required />Médio(a)
                            <input class="form-radio" type="radio" name="comunicacao_exp" id="valor_baixo" value="baixo" required />Baixo(a)
                        </fieldset>
                    </div>
                    <div class="col">
                        <label class="label" for="comunicacao">Cuidados de Enfermagem</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="enfermagem_exp" id="valor_alto" value="alto" required />Alto(a)
                            <input class="form-radio" type="radio" name="enfermagem_exp" id="valor_medio" value="medio" required />Médio(a)
                            <input class="form-radio" type="radio" name="enfermagem_exp" id="valor_baixo" value="baixo" required />Baixo(a)
                        </fieldset>
                    </div>
                </div>
                <div class="row row-form2 div-radio">
                    <div class="col">
                        <label class="label" for="aquipamentos">Uso de Equipamentos Médicos</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="equipamentos_exp" id="valor_alto" value="alto" required />Alto(a)
                            <input class="form-radio" type="radio" name="equipamentos_exp" id="valor_medio" value="medio" required />Médio(a)
                            <input class="form-radio" type="radio" name="equipamentos_exp" id="valor_baixo" value="baixo" required />Baixo(a)
                        </fieldset>
                    </div>
                    <div class="col">
                        <label class="label" for="educacao">Educação ao Paciente</label>
                        <fieldset class="field">
                            <input class="form-radio" type="radio" name="educacao_exp" id="valor_alto" value="alto" required />Alto(a)
                            <input class="form-radio" type="radio" name="educacao_exp" id="valor_medio" value="medio" required />Médio(a)
                            <input class="form-radio" type="radio" name="educacao_exp" id="valor_baixo" value="baixo" required />Baixo(a)
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="d-flex btn_edit">Salvar</button>
            </div>
        </form>
        <script src="perfil.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>