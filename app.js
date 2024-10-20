var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector('#signup');
var btnLogar = document.querySelector('#loginButton');

var body = document.querySelector("body");

btnSignin.addEventListener('click', function() {
    body.className = "sign-in-js";
    
});

btnSignup.addEventListener('click', function() {
    body.className = "sign-up-js";
});

//função para alterar o cadastro de paciente para profissional
let selectCat = document.getElementById("tipo")
selectCat.addEventListener('change', () => {
    valor = selectCat.value
    if (valor == 2) {
       let coren = document.getElementById('corenLabel')
       coren.style.display = "flex"
       let corenInput = document.getElementById('coren')
       corenInput.style.display = "flex"
    }
    else{
       let coren = document.getElementById('corenLabel')
       coren.style.display = "none"
    }
})

//Para limpar o formulário

