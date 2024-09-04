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


// Função para buscar os estados da API do IBGE
async function buscarEstados() {
    const url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
    try {
        const response = await fetch(url);
        const estados = await response.json();

        const selectElement = document.getElementById("estados-select");

        // Ordenar estados por nome
        estados.sort((a, b) => a.nome.localeCompare(b.nome));

        // Adiciona cada estado como uma opção no select
        estados.forEach(estado => {
            const option = document.createElement("option");
            option.value = estado.sigla;
            option.name = estado.sigla;
            option.textContent = estado.sigla;
            selectElement.appendChild(option);
        });
    } catch (error) {
        console.error("Erro ao buscar estados:", error);
    }
}
// Chama a função para buscar os estados quando a página carrega
window.onload = buscarEstados;



//função para alterar o cadastro de paciente para profissional
let selectCat = document.getElementById("tipo")
selectCat.addEventListener('change', () => {
    valor = selectCat.value
    if (valor == 2) {
       let coren = document.getElementById('corenLabel')
       coren.style.display = "block"
    }
    else{
       let coren = document.getElementById('corenLabel')
       coren.style.display = "none"
    }
})

//Para limpar o formulário
window.addEventListener('load', () => {
    const formulario = document.getElementById('formCad');
    formulario.reset(); // Limpa o formulário
});