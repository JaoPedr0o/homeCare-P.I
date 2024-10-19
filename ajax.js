document.getElementById('message-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    fetch('sendMessage.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Adiciona a nova mensagem à tela
        const messageContainer = document.querySelector('.messages');
        messageContainer.innerHTML += data; // O PHP deve retornar o HTML da nova mensagem
        this.reset(); // Limpa o campo de entrada
    })
    .catch(error => console.error('Erro:', error));
});
