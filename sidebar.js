
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');

function applyInitialLayout() {
    const screenWidth = window.innerWidth;

    if (screenWidth >= 1024) {
        mainContent.style.marginLeft = '8rem';  // Posição inicial da sidebar recolhida
    } else {
        mainContent.style.marginLeft = '0';     // Posição inicial para telas pequenas
        mainContent.style.marginTop = '0';
    }
}

function handleSidebarHover() {
    const screenWidth = window.innerWidth;

    if (screenWidth >= 1024) {
        sidebar.addEventListener('mouseenter', () => {
            mainContent.style.marginLeft = '20rem';  // Expand sidebar on hover for large screens
        });

        sidebar.addEventListener('mouseleave', () => {
            mainContent.style.marginLeft = '8rem';   // Collapse sidebar on mouse leave
        });
    } else {
        sidebar.addEventListener('mouseenter', () => {
            mainContent.style.marginLeft = '0';
            mainContent.style.marginTop = '1rem';    // Sidebar moves vertically on hover for small screens
        });

        sidebar.addEventListener('mouseleave', () => {
            mainContent.style.marginLeft = '0';
            mainContent.style.marginTop = '0';
        });
    }
}

// Apply the layout adjustments on page load
applyInitialLayout();

// Apply the hover interaction
handleSidebarHover();

// Update the layout dynamically on window resize
window.addEventListener('resize', () => {
    applyInitialLayout();
    handleSidebarHover();  // Reattach the hover listeners on resize
});


