function normalizeText(text) {
    return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().trim();
}

function fuzzyMatch(input, value) {
    const normalizedInput = normalizeText(input);
    const normalizedValue = normalizeText(value);
    
    return normalizedValue.includes(normalizedInput);
}

function filterProfessionals() {
    const searchInput = normalizeText(document.getElementById('searchInput').value);
    const filter = document.getElementById('searchFilter').value;
    const cards = document.querySelectorAll('.card');

    // Mapeamento de estados com nomes, siglas e variações
    const stateMap = {
        'acre': 'ac', 'alagoas': 'al', 'amapa': 'ap', 'amazonas': 'am', 'bahia': 'ba',
        'ceara': 'ce', 'distrito federal': 'df', 'espirito santo': 'es', 'goias': 'go',
        'maranhao': 'ma', 'mato grosso': 'mt', 'mato grosso do sul': 'ms', 'minas gerais': 'mg',
        'para': 'pa', 'paraiba': 'pb', 'parana': 'pr', 'pernambuco': 'pe', 'piaui': 'pi',
        'rio de janeiro': 'rj', 'rio grande do norte': 'rn', 'rio grande do sul': 'rs',
        'rondonia': 'ro', 'roraima': 'rr', 'santa catarina': 'sc', 'sao paulo': 'sp',
        'sergipe': 'se', 'tocantins': 'to'
    };

    const stateSynonyms = {
        'sao': 'sp', 'minas': 'mg', 'bah': 'ba', 'maran': 'ma', 'rio': ['rj', 'rs', 'rn'],
        'sp': 'sao paulo', 'mg': 'minas gerais', 'rj': 'rio de janeiro', 'rs': 'rio grande do sul'
        // Adicione mais variações conforme necessário
    };

    cards.forEach(card => {
        let fieldValue = '';

        if (filter === 'nome') {
            const titleElement = card.querySelector('.card-title');
            if (titleElement) {
                fieldValue = titleElement.textContent;
            }
        } else if (filter === 'estado') {
            const stateElement = card.querySelector('.estado');
            if (stateElement) {
                fieldValue = stateElement.textContent.replace('Estado:', '').trim();

                // Checa sinônimos
                Object.keys(stateSynonyms).forEach(synonym => {
                    if (searchInput.includes(synonym)) {
                        const possibleMatches = stateSynonyms[synonym];
                        fieldValue = Array.isArray(possibleMatches)
                            ? possibleMatches.includes(stateMap[fieldValue.toLowerCase()]) ? stateMap[fieldValue.toLowerCase()] : fieldValue
                            : stateMap[fieldValue.toLowerCase()] === possibleMatches ? possibleMatches : fieldValue;
                    }
                });

                // Normaliza o valor do estado (nome ou sigla)
                fieldValue = stateMap[normalizeText(fieldValue)] || fieldValue;
            }
        } else if (filter === 'sexo') {
            const genderElement = card.querySelector('.sexo');
            if (genderElement) {
                fieldValue = genderElement.textContent.replace('Sexo:', '').trim();
            }
        }

        // Usa a função fuzzyMatch para fazer uma comparação flexível
        if (fieldValue && fuzzyMatch(searchInput, fieldValue)) {
            card.style.display = 'block'; // Mostra o card se corresponder
        } else {
            card.style.display = 'none'; // Esconde o card se não corresponder
        }
    });
}
