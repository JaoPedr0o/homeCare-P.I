function filterProfessionals() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase().trim(); 
    const filter = document.getElementById('searchFilter').value;
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        let fieldValue = '';

        // Verifica o filtro selecionado e captura o campo correspondente
        if (filter === 'nome') {
            const titleElement = card.querySelector('.card-title');
            if (titleElement) {
                fieldValue = titleElement.textContent.toLowerCase();
            }
        } else if (filter === 'estado') {
            const stateElement = card.querySelector('.estado'); 
            if (stateElement) {
                // Captura apenas o texto do estado, removendo a parte "Estado:"
                fieldValue = stateElement.textContent.toLowerCase().replace('estado:', '').trim();
            }
        } else if (filter === 'sexo') {
            const genderElement = card.querySelector('.sexo'); 
            if (genderElement) {
                // Captura apenas o texto do sexo, removendo a parte "Sexo:"
                fieldValue = genderElement.textContent.toLowerCase().replace('sexo:', '').trim();
            }
        }

        // Verifica se o campo selecionado começa com o valor da barra de pesquisa
        if (fieldValue && fieldValue.startsWith(searchInput)) {
            card.style.display = 'block'; // Mostra o card se corresponder
        } else {
            card.style.display = 'none'; // Esconde o card se não corresponder
        }
    });
}
