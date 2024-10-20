const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const modal = document.getElementById("leave-modal")
const logoutBtn = document.getElementById("confirm-button")
const body = document.body

function handleModalLeave() {
    if (modal.style.visibility === 'visible') {
        modal.style.visibility = 'hidden'
        console.log("fechou")
    } else {
        modal.style.visibility = 'visible'
        body.style.overflow = 'hidden'
        console.log("abriu")
    }
}

function handleLogout() {
    window.location.href = "login.php"
}

function deleteAccount() {
    if (confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.')) {
        // Lógica de exclusão da conta (exemplo)
        window.location.href = 'excluirConta.php';
    }
}

function logout() {
    // Lógica de logout
    window.location.href = 'login.php';
}

function support() {
    alert('Entre em contato com o suporte através do email: suporte@vitalplus.com');
}

function toggleTheme() {
    // Exemplo simples de troca de tema
    document.body.classList.toggle('dark-theme');
    alert('Tema modificado com sucesso!');
}