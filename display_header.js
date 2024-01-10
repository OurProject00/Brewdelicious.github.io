document.addEventListener('DOMContentLoaded', function () {
    // Fetch and inject the header content
    fetch('header.html')
        .then(response => response.text())
        .then(html => {
            document.body.insertAdjacentHTML('afterbegin', html);
            // Now that the HTML is inserted, execute the JavaScript in the fetched content
            executeHeaderScripts();
        });
});

function executeHeaderScripts() {
    let menu = document.querySelector('#menu-bars');
    let navbar = document.querySelector('.navbar');

    menu.addEventListener('click', function () {
        navbar.classList.toggle('active');
    });
}

function redirectToordernow() {
    window.location.href = 'ordernow.html';
}
