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