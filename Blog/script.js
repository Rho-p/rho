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

function navigateToProject1() {
    window.location.href = 'project1.html';
}