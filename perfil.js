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

//função para bsucar cidades por Estado
async function buscarCidades(siglaEstado) {
    const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${siglaEstado}/municipios`;
    try {
        const response = await fetch(url);
        const cidades = await response.json();
        const selectElement = document.getElementById("cidades-select");
        
        // Limpar as opções anteriores
        selectElement.innerHTML = "";

        // Ordenar cidades por nome
        cidades.sort((a, b) => a.nome.localeCompare(b.nome));

        // Adiciona cada cidade como uma opção no select
        cidades.forEach(cidade => {
            const option = document.createElement("option");
            option.value = cidade.id;
            option.name = cidade.nome;
            option.textContent = cidade.nome;
            selectElement.appendChild(option);
        });
    } catch (error) {
        console.error("Erro ao buscar cidades:", error);
    }
}


// Função que detecta quando o usuário seleciona uma imagem
document.getElementById('upload-img').addEventListener('change', function() {
    var file = this.files[0];
    var reader = new FileReader();

    if (file) {
        // Atualiza a imagem de pré-visualização
        reader.onload = function(e) {
            document.getElementById('perfil-img').src = e.target.result;
        };
        reader.readAsDataURL(file);

        // Exibe uma mensagem de confirmação de seleção
        alert("Imagem selecionada com sucesso!");
    }
});

