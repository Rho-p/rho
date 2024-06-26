// script.js

function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    var mainContent = document.getElementById('main-content');
    if (sidebar.classList.contains('open')) {
        sidebar.classList.remove('open');
        mainContent.classList.remove('shift');
    } else {
        sidebar.classList.add('open');
        mainContent.classList.add('shift');
    }
}

function navigateToProjectVTOL() {
    window.location.href = 'project_VTOL.html';
}
