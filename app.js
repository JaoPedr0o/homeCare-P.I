var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector('#signup');
var btnLogar = document.querySelector('#loginButton');

var body = document.querySelector("body");

btnLogar.addEventListener('click', function() {
    window.location.href = 'telaInicial.html';  // Redireciona para a tela de login
});

btnSignin.addEventListener('click', function() {
    body.className = "sign-in-js";
});

btnSignup.addEventListener('click', function() {
    body.className = "sign-up-js";
});


