document.addEventListener('DOMContentLoaded', function () {
    let menu = document.querySelector('#menu-bars');
    let navbar = document.querySelector('.navbar');

    menu.addEventListener('click', function () {
        navbar.classList.toggle('active');
        
    });
});

function redirectToordernow() {
    window.location.href = 'ordernow.html';
}