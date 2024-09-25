<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VitalPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="loginIMG/logo.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"              integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"> 
    </script>
    <script src="https://kit.fontawesome.com/2a79d52758.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="login.css"/>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#cpf').mask("000.000.000-00")
        $('#coren').mask("00000")
      })
    </script>
  </head>
  <body>
    <img class="imgPrincipal" src="loginIMG/login.png" alt="" />
    <div class="container">
      <div class="content first-content h-75">
        <div class="first-column">
          <h2 class="title-primary">Bem-Vindo!</h2>
          <p class="description description-primary">
            Para acesssar nossos serviços
          </p>
          <p class="description description-primary">faça um cadastro.</p>
          <button id="signin" class="btn btn-blue-side">Fazer Login</button>
        </div>
        <!--First-Column-->
        <div class="second-column" id="containerCad">
          <h2 class="title title-second text-decoration-underline">
            Criar minha conta
          </h2>
          <p class="fw-light fs-6">Selecione a categoria de seu cadastro:</p>
          <form action="cadastrar.php" class="form mt-3 d-flex justify-content-center" id="formCad" method="post">
              <div class="d-flex justify-content-center w-100">
                <select class="w-50 form-select bg-info text-white d-flex justify-content-center"
                  name="tipo"
                  id="tipo">
                  <option value="1" class="text-white d-flex justify-content-center">Paciente</option>
                  <option value="2"class="text-white d-flex justify-content-center">Profissional</option>
                </select>
              </div>

              <label class="label-input p-1" for="nome">
                <i class="fa-solid fa-pencil icon-modify"></i>
                <input type="text" placeholder="Nome Completo" name="nome" id="nome" required/>
              </label>

              <label class="label-input p-1" for="cpf">
                <i class="fa-solid fa-shield icon-modify"></i>
                <input type="text" placeholder="CPF" name="cpf" id="cpf" required/>
              </label>

              <label class="label-input p-1" for="data_nascimento">
                <i class="fa-solid fa-bars icon-modify"></i>
                <input type="date" name="data_nascimento" id="data_nascimento" required/>
              </label>

              <label class="label-input p-1" for="email">
                <i class="fa-solid fa-envelope icon-modify"></i>
                <input type="text" placeholder="Email" name="email" id="email" required />
              </label>

              <label style="display: none;" class="label-input p-1" for="coren" id="corenLabel">
                <i class="fa-solid fa-user-nurse icon-modify"></i>
                <input placeholder="Nº de Incrição Coren" type="text" name="coren" id="coren" />
              </label>

              <label class="label-input p-1" for="senha">
                <i class="fa-solid fa-lock icon-modify"></i>
                <input type="password" placeholder="Senha" name="senha" id="senha" required />
              </label>

              <fieldset class="d-flex align-items-center m-3">
                <input class="form-radio" type="radio" name="sexo" id="sexo_masculino" value="Masculino" required/>Masculino
                <input class="form-radio" type="radio" name="sexo" id="sexo_feminino" value="Feminino" required/>Feminino
              </fieldset>
              <button class="btn btn-primary">Registrar</button>
            </form>
          </div>
        </div>

      <div class="content second-content h-75">
        <div class="first-column">
          <h2 class="title title-primary">Olá, amigo(a)!</h2>
          <p class="description description-primary">
            Insira seus dados pessoais
          </p>
          <p class="description description-primary">
            e começe a navegar pelo nosso site.
          </p>
          <button id="signup" class="btn btn-blue-side">Cadastre-se</button>
        </div>
        <!--First-Column-->
        <div class="second-column">
          <div class="d-flex justify-content-center">
            <img src="loginIMG/logo.png" class="h-25 w-25" alt="" />
          </div>
          <h2 class="title title-second text-decoration-underline my-5">
            Entrar na conta
          </h2>

          <form class="form" action="validarLogin.php" method="post">
            <label class="label-input p-1" for="">
              <i class="fa-solid fa-envelope icon-modify"></i>
              <input type="text" placeholder="Email" name="email"/>
            </label>
            <label class="label-input p-1" for="">
              <i class="fa-solid fa-lock icon-modify"></i>
              <input type="password" placeholder="Senha" name="senha"/>
            </label>
            <a class="password" href="#">Esqueceu sua senha?</a>
            <button id="loginButton" class="btn btn-second">Logar</button>
          </form>
          
        </div>
        <!--secound-column-->
      </div>
      <!--Second-Content-->
    </div>
    <script src="app.js"></script>
  </body>
</html>

<!--!SÓ SE PRECISAR-->
<!-- <div class="social-media">
    <p class="description description-second">Ou utilize seu email para logar</p>
                    <ul class="list-social-media px-0">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fa-brands fa-facebook"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">

                                <i class="fa-brands fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media"><i class="fa-brands fa-linkedin"></i>
                            </li>
                        </a>
                    </ul>
                </div>-->
